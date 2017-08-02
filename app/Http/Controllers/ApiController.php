<?php
namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ApiController extends BaseController
{
    private $CtrlName   = null;
    private $name       = null;
    private $action     = null;
    private $data       = null;

    public function slug($name,$action)
    {
        $this->CtrlName = "App\Http\Controllers\Api\\".ucwords($name).'Controller';
        $this->name     = $name;
        $this->action   = $action;
        $this->data     = app($this->CtrlName)->{$this->action}();

        return $this->formatter($this->data);
    }

    public function formatter($data)
    {
        return response()->json([
            'data' => $data,
            'code' => '',
            'message' => '',
        ]);
    }

}
