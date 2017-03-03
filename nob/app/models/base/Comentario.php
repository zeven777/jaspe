<?php

use Nob\Admin\Model\NobBase;

class Base_Comentario extends NobBase
{
    protected $table = 'comentario';

    protected $fillable = [
        'nombre',
        'comentario',
        'rank',
        'status'
    ];

    protected $rules = [
        'producto' => 'required',
        'nombre' => 'required',
        'comentario' => 'required',
        'rank' => 'required'
    ];

    protected $rtable = 'producto';

    public function producto()
    {
        return $this->belongsTo('Producto');
    }
}