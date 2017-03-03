<?php

use Nob\Admin\Model\NobBase;

class Base_Categoria extends NobBase
{
    use \Nob\Admin\Model\Translatable\Translatable;    

    protected $table = 'categoria';

    public $translatedAttributes = [
        'slug',
        'nombre'
    ];

    protected $fillable = [
        'icon',
        'highlighted',
        'status'
    ];

    protected $rules = [
        'nombre' => 'required',
        'icon' => 'required|unique:categoria,icon'
    ];

    protected $stable = 'producto';

    public function producto()
    {
        return $this->hasMany('Producto','categoria_id');
    }
}