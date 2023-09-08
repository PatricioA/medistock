<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumos extends Model
{
    protected $table = 'insumos';
    protected $primaryKey = 'id_insumos';

    protected $fillable = [
        'cod_insumo',
        'id_laboratorio',
        'id_clasificacion',
        'id_presentacion',
        'id_formato',
        'concentracion_insumo',
        'medida_insumoC',
        'cantidad_envase',
        'medida_insumoM',
        'stock',
        'stock_min',
        'valor_insumo',
        'fecha_recepcion',
        'fecha_caducidad',
        'id_estado',
        'created_at',
        'updated_at',
        'id_user',

    ];

    public function tipoin(){
        return $this->belongsTo('App\TipoInsumo','cod_insumo');
    }

    public function laboratorio(){
        return $this->belongsTo('App\Laboratorios','id_laboratorio');
    }

    public function formato(){
        return $this->belongsTo('App\Formatos','id_formato');
    }

    public function unidad(){
        return $this->belongsTo('App\Unidades','id_unidad');
    }

    public function presentacion(){
        return $this->belongsTo('App\Presentacion','id_presentacion');
    }

    public function estados(){
        return $this->belongsTo('App\Estado','id_estado');
    }

    // public function clasificacion(){
    //     return $this->belongsTo('App\Clasificacion','id_clasificacion');
    // }

    public function usuariocrea(){
        return $this->belongsTo('App\User','id_user');
    }

    public function entregainsumos(){
        return $this->hasMany('App\EntregaInsumos','id_insumos')->where('id_estado', 1);
    }

    public function insumopedido(){
        return $this->hasMany('App\PedidoDetalle','id_insumo');
    }
}
