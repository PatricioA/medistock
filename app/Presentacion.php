<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    protected $table = 'presentacion';
    protected $primaryKey = 'id_presentacion';

    protected $fillable = [
        'presentacion',
        'concentracion_insumo',
        'created_at',
        'updated_at',

    ];

    public function InsumosEnv(){
        return $this->hasMany('App\Insumos','id_presentacion');
    }
}
