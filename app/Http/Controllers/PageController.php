<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class PageController extends BaseController
{

    public function index($page)
    {
        return view('pages.'.$page);
    }

    public function test()
    {
      if(rand(1,5)==1)
      return "Hello world";
      return rand(1,5);
    }

}
