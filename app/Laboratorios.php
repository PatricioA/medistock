<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorios extends Model
{
    protected $table = 'laboratorios';
    protected $primaryKey = 'id_laboratorio';

    protected $fillable = [
        'laboratorio',
        'id_estado',
        'created_at',
        'updated_at',

    ];

    public function InsumosLab(){
        return $this->hasMany('App\Insumos','id_laboratorio');
    }

    public function estado(){
        return $this->belongsTo('App\Estado','id_estado');
    }
}