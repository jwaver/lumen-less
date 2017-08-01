<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{

    public $tabMenu = [
        [
            'id'            => 'explorer',
            'icon'          => '<i class="fa fa-folder-open"></i>',
            'title'         => 'Explorer',
            'description'   => 'See contents.'
        ],
        [
            'id'            => 'search',
            'icon'          => '<i class="fa fa-search"></i>',
            'title'         => 'Search',
            'description'   => 'Search everything.'
        ],
        [
            'id'            => 'upload',
            'icon'          => '<i class="fa fa-upload"></i>',
            'title'         => 'Uploader',
            'description'   => 'Manage file uploads.'
        ],
        [
            'id'            => 'editor',
            'icon'          => '<i class="fa fa-code"></i>',
            'title'         => 'Editor',
            'description'   => 'Manage file uploads.'
        ],
        [
            'id'            => 'notes',
            'icon'          => '<i class="fa fa-sticky-note-o"></i>',
            'title'         => 'Notes',
            'description'   => 'Take down your notes.'
        ],
        [
            'id'            => 'info',
            'icon'          => '<i class="fa fa-server"></i>',
            'title'         => 'Server Info',
        ],
    ];

    public function index()
    {
        return view('home')->with('ctrl',$this);
    }

    public function content($content)
    {
        $pageViews = 'contents.';
        if(view()->exists($pageViews.$content))
            return view($pageViews.$content);
        elseif(view()->exists($pageViews.$content.'.index'))
            return view($pageViews.$content.'.index');
        else
            return 'No content found!';
    }

    public function test(Request $request)
    {
        dd(
            '<pre>'.$request.'</pre>'
        );
    }


}
