<?php

class Contacto_MainController extends Main_MainController
{
    public $action = "contacto";

    public $section = "contacto";

    public $view = "web.contacto.layout";

    public function index()
    {
        $this->data['staff'] = Personal::getStaff();

        $this->data['contact'] = Contacto::getContact();
    }
}
