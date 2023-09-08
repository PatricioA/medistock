<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    protected $table = 'clasificacion';
    protected $primaryKey = 'id_clasificacion';

    protected $fillable = [
        'clasificacion',
        'created_at',
        'updated_at',
        // Otros campos permitidos
    ];

    public function insumoscla(){
        return $this->hasMany('App\Insumos','id_clasificacion');
    }
}
