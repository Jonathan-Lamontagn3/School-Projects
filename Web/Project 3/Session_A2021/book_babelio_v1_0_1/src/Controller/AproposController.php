<?php

namespace App\Controller;

class AproposController extends AppController {

    public function index() {
        $this->Authorization->skipAuthorization();
    }
}
