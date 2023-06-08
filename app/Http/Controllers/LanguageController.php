<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;




class LanguageController extends Controller
{
    public function change($locale){
        Config::set('app.locale', $locale);
        $configFile = config_path('app.php');
        $configData = '<?php return ' . var_export(config('app'), true) . ';';
        File::put($configFile, $configData);
return response()->json(["msg","success"]);
    }
}
