<?php

class Nosotros_MainController extends Main_MainController
{
    public $action = "nosotros";

    public $section = "nosotros";

    public $view = "web.nosotros.layout";

    public function index()
    {
        $this->data['firstAbout'] = Empresa::getFirstAbout();

        $this->data['allAbouts'] = Empresa::getAllAbouts();

        $this->data['banner'] = Secundario::getBanner('nosotros');
    }
}
