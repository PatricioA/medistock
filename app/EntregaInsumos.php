<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntregaInsumos extends Model
{
    protected $table = 'entrega_insumos';
    protected $primaryKey = 'id_entrega';

    protected $fillable = [
        'nentrega',
        'id_insumo',
        'cantidad',
        'observación_entrega',
        'c_costo',
        'created_at',
        'updated_at',
        'id_user',
    ];

    public function insumo(){
        return $this->belongsTo('App\Insumos','id_insumo');
    }
    public function usuariocrea(){
        return $this->belongsTo('App\User','id_user');
    }
}
