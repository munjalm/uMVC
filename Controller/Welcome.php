<?php

include getcwd() . '/Core/Controller.php';

class Controller_Welcome extends Controller {

    public function index() {
       
        $this->load_view('index', False);
    }

}

?>