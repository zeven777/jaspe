<?php

use Nob\Admin\Model\NobBase;

class Base_Comentario extends NobBase
{
    protected $table = 'comentario';

    protected $fillable = [
        'slug',
        'nombre',
        'descripcion',
        'caracteristicas',
        'tip',
        'status'
    ];

    protected $rules = [
        'producto' => 'required',
        'nombre' => 'required',
        'descripcion' => 'required',
        'caracteristicas' => 'required',
        'tip' => 'required'
    ];

    protected $rtable = 'producto';

    public function producto()
    {
        return $this->belongsTo('Producto');
    }
}