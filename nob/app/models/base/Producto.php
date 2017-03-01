<?php

use Nob\Admin\Model\NobBase;

class Base_Producto extends NobBase
{
    use \Nob\Admin\Model\Translatable\Translatable;    

    protected $table = 'producto';

    public $translatedAttributes = [
        'slug',
        'nombre',
        'descripcion',
        'caracteristicas',
        'tip'
    ];

    protected $fillable = [
        'status',
        'highlighted'
    ];

    protected $rules = [
        'categoria' => 'required',
        'nombre' => 'required',
        'descripcion' => 'required',
        'caracteristicas' => 'required',
        'tip' => 'required'
    ];

    protected $rtable = 'categoria';

    protected $stable = 'comentario';

    public function categoria()
    {
        return $this->belongsTo('Categoria');
    }

    public function comentario()
    {
        return $this->hasMany('Comentario','producto_id');
    }
}