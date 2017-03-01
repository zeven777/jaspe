<?php

use Nob\Admin\Model\NobBase;

class Base_Producto extends NobBase
{
    protected $table = 'producto';

    protected $fillable = [
        'slug',
        'nombre',
        'status',
        'highlighted'
    ];

    protected $rules = [
        'categoria' => 'required',
        'nombre' => 'required'
    ];

    protected $rtable = 'categoria';

    public function categoria()
    {
        return $this->belongsTo('Categoria');
    }
}