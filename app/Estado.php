<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';
    protected $primaryKey = 'id_estado';

    protected $fillable = [
        'estado',
        'e_color',

    ];

    public function insumos(){
        return $this->hasMany('App\Insumos','id_estado');
    }

    public function pedido(){
        return $this->hasMany('App\Pedidos','id_estado');
    }

    public function laboratorio(){
        return $this->hasMany('App\Laboratorio','id_estado');
    }
}
