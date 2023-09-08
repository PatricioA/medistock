<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';

    protected $fillable = [
        'id_estado',
        'observacion_pedido',
        'id_user',
        'created_at',
        'updated_at',
    ];

    public function estado(){
        return $this->belongsTo('App\Estado','id_estado');
    }

    public function usuariocrea(){
        return $this->belongsTo('App\User','id_user');
    }

    public function pedidodetalle(){
        return $this->hasMany('App\PedidoDetalle','id_pedido');
    }
}
