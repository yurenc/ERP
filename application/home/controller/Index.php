<?php
namespace app\home\controller;

use app\home\controller\Common;


class Index extends Common
{
    public function index()
    {
        $this->assign([
            'nav'           =>  config('menu.index'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('index');
    }

}
