<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ExplorerController extends Controller
{

    public function dirlist()
    {
        return array_values(array_diff(scandir('./'), array('.','..')));
    }

}
