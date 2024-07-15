<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class LocalizationController extends Controller
{
    function adminIndex() : View {
        $languages = Language::all();
        return view('admin.localization.admin-index', compact('languages'));
    }

    function frontnedIndex() : View {
        $languages = Language::all();
        return view('admin.localization.frontend-index', compact('languages'));
    }


    function extractLocalizationStrings(Request $request)
    {
        $directorys = explode(',', $request->directory);

        $languageCode = $request->language_code;
        $fileName = $request->file_name;

        $localizationStrings = [];


        foreach($directorys as $directory){

            $directory = trim($directory);

            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

            // Iterate over each file in the directory
            foreach($files as $file){
                if($file->isDir()){
                    continue;
                }

                $contents = file_get_contents($file->getPathname());

                preg_match_all('/__\([\'"](.+?)[\'"]\)/', $contents, $matches);

                if(!empty($matches[1])){
                    foreach($matches[1] as $match){
                        $match = preg_replace('/^(frontend|admin)\./', '', $match);

                        $localizationStrings[$match] = $match;
                    }
                }

            }
        }


        $phpArray = "<?php\n\nreturn " . var_export($localizationStrings, true) . ";\n";

        // create language sub folder if it is not exit
        if(!File::isDirectory(lang_path($languageCode))){
            File::makeDirectory(lang_path($languageCode), 0755, true);
        }

        // dd(lang_path($languageCode.'/'.$fileName.'.php'));
        file_put_contents(lang_path($languageCode.'/'.$fileName.'.php'), $phpArray);

        toast(__('admin.Generated Successfully!'), 'success');

        return redirect()->back();
    }


    function updateLangString(Request $request) : RedirectResponse {
        $languageStrings = trans($request->file_name, [], $request->lang_code);

        $languageStrings[$request->key] = $request->value;

        $phpArray = "<?php\n\nreturn " . var_export($languageStrings, true) . ";\n";

        file_put_contents(lang_path($request->lang_code.'/'.$request->file_name.'.php'), $phpArray);

        toast(__('admin.Updated Successfully!'), 'success');

        return redirect()->back();

    }


    function translateString(Request $request)
    {
        try {

        $langCode = $request->language_code;

        $languageStrings = trans($request->file_name, [], $request->language_code);

        $keyStirngs = array_keys($languageStrings);

        $text = implode(' | ', $keyStirngs);


        $response = Http::withHeaders([
            'X-RapidAPI-Host' => getSetting('site_microsoft_api_host'),
            'X-RapidAPI-Key' => getSetting('site_microsoft_api_key'),
            'content-type' => 'application/json',
        ])
        ->post("https://microsoft-translator-text.p.rapidapi.com/translate?api-version=3.0&to%5B0%5D=$langCode&textType=plain&profanityAction=NoAction",[
            [
                "Text" => $text
            ]
        ]);


        $translatedText = json_decode($response->body())[0]->translations[0]->text;

        $translatedValues = explode(' | ', $translatedText);

        $updatedArray = array_combine($keyStirngs, $translatedValues);

        $phpArray = "<?php\n\nreturn " . var_export($updatedArray, true) . ";\n";

        file_put_contents(lang_path($langCode.'/'.$request->file_name.'.php'), $phpArray);

        return response(['status' => 'success', __('admin.Translation is completed')]);

        } catch (\Throwable $th) {
            return response(['status' => 'error', $th->getMessage()]);
        }

    }


}
