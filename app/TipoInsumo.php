<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoInsumo extends Model
{
    protected $table = 'tipo_insumo';
    protected $primaryKey = 'cod_insumo';

    protected $fillable = [
        'nombre_insumo',
        'indicaciones_insumo',
        'id_clasificacion',
        'created_at',
        'updated_at',
    ];

    public function clasin(){
        return $this->belongsTo('App\Clasificacion','id_clasificacion');
    }

    public function insumostipo(){
        return $this->hasMany('App\Insumos','cod_insumo');
    }
}
