<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class PageController extends BaseController
{


    public function index($page)
    {
        return $page;
    }


}
