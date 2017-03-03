<?php

class Productos_MainController extends Main_MainController
{
    public $action = "productos";

    public $section = "productos";

    public $view = "web.productos.layout";

    public $paginate = 12;

    public function index($category = null)
    {
        $this->data['products'] = Producto::getProducts($this->paginate, $category);
    }
}
