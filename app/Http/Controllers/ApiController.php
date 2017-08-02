<?php
namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ApiController extends BaseController
{

    public function slug($name)
    {
        $ControllerName = "App\Http\Controllers\Api\\".ucwords($name).'Controller';
        if(class_exists($ControllerName))
            return app($ControllerName)->response();
        else
            return null;
    }

}
