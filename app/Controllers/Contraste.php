<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Contraste extends BaseController
{
    public function index()
    {
        if (!$this->session->get("contraste")) {
            $this->session->set("contraste", true);
        }else{
            $this->session->remove("contraste");
        }
        return redirect()->to("/");
    }
}
