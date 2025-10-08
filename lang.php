<?php
function includeLanguageFile($langCode) {
    switch ($langCode) {
        case 'nl':
            include('lang/nl.php');
            break;
        case 'be':
            include('lang/fr.php');
            break;
        case 'zh':
            include('lang/zh.php');
            break;
        case 'jp':
            include('lang/jp.php');
            break;
        case 'kr':
            include('lang/kr.php');
            break;
        case 'bg':
            include('lang/bg.php');
            break;
        case 'pt':
            include('lang/pt.php');
            break;
        case 'pl':
            include('lang/pl.php');
            break;
        case 'en':
            include('lang/en.php');
            break;
        case 'fr':
            include('lang/fr.php');
            break;
        case 'de':
            include('lang/de.php');
            break;
        case 'it':
            include('lang/it.php');
            break;
        case 'no':
            include('lang/no.php');
            break;
        case 'da':
            include('lang/da.php');
            break;
        case 'es':
            include('lang/es.php');
            break;
        case 'mk':
            include('lang/mk.php');
            break;
        case 'hu':
            include('lang/hu.php');
            break;
        case 'ru':
            include('lang/ru.php');
            break;
        default:
            include('lang/en.php');
            break;
    }
}

// Example of manually setting the language code
$detect = 'en'; // Change this variable to the desired language code

// Include language file based on the manually set language code
includeLanguageFile($detect);
?>