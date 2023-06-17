<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        $directory = $request->directory;
        $languageCode = $request->language_code;

        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

        $localizationStrings = [];

        // Iterate over each file in the directory
        foreach($files as $file){
            if($file->isDir()){
                continue;
            }

            $contents = file_get_contents($file->getPathname());

            preg_match_all('/__\([\'"](.+?)[\'"]\)/', $contents, $matches);

            dd($matches);

        }



    }


}
