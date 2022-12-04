<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $session = $this->session->get("contraste");
        return view('home', ["contraste"=>$session]);
    }
}
