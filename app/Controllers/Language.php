<?php

namespace App\Controllers;

class Language extends BaseController
{
    public function index($lang)
    {
        if ($lang=='es') {
            $this->session->set('lang', 'es');
        } else {
            $this->session->set('lang', 'pt-br');
        }

        return redirect()->to('/');
    }
}
