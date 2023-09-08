<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formatos extends Model
{
    protected $table = 'formatos';
    protected $primaryKey = 'id_formato';

    protected $fillable = [
        'formato',
        'created_at',
        'updated_at',
    ];

    public function Insumosform(){
        return $this->hasMany('App\Insumos','id_formato')->orderBy('formato','ASC');
    }
}
