<?php

class Productos_DetailController extends Main_MainController
{
    public $action = "productos_detail";

    public $section = "productos";

    public $view = "web.productos.detail.layout";

    public $paginate = 4;

    public function index($slug)
    {
        $product = Producto::getProduct($slug);

        if( is_null($product) ) return Redirect::route('products.list');

        $this->data['product'] = $product;

        $this->data['products'] = Producto::getProducts($this->paginate, $product);
    }
}
