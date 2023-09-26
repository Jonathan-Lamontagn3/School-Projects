<?php

namespace App\Controller;

class AproposController extends AppController {

    public function initialize(): void {
        parent::initialize();
        $this->viewBuilder()->setLayout('cakephp_default');
    }

    public function index() {
        $this->Authorization->skipAuthorization();
    }

}
