<?php

class Home_MainController extends Main_MainController
{
    public $action = "home";

    public $section = "home";

    public $view = "web.home.layout";

    public $paginate = 4;

    public function index()
    {
        $this->data['products'] = Producto::getProducts($this->paginate);

        $this->data['hproducts'] = Producto::getHighlightedProducts($this->paginate);
    }
}