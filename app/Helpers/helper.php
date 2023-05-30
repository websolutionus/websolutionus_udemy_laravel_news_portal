<?php

use App\Models\Language;
use PhpParser\Node\Expr\Cast\String_;

/** format news tags */

function formatTags(array $tags): String
{
   return implode(',', $tags);
}

/** get selected language from session */
function getLangauge(): string
{
    if(session()->has('language')){
        return session('language');
    }else {
        try {
            $language = Language::where('default', 1)->first();
            setLanguage($language->lang);

            return $language->lang;
        } catch (\Throwable $th) {
            setLanguage('en');

            return $language->lang;
        }
    }
}

/** set language code in session */
function setLanguage(string $code): void
{
    session(['language' => $code]);
}

/** Truncate text */

function truncate(string $text, int $limit = 50): String
{
    return \Str::limit($text, $limit, '...');
}
