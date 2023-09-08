<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidades extends Model
{
    protected $table = 'unidades';
    protected $primaryKey = 'id_unidad';

    protected $fillable = [
        'unidad',
        'detalle_unidad',
    ];

    public function InsumosUni(){
        return $this->hasMany('App\Insumos','id_unidad');
    }
}