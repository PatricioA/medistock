<table>
    <thead>
    <tr>
        <th>ID MEDICAMENTO</th>
        <th>CÓDIGO</th>
        <th>LABORATORIO</th>
        <th>PRESENTACIÓN</th>
        <th>FORMATO</th>
        <th>CONCENTRACIÓN</th>
        <th>CANTIDAD POR ENVASE</th>
        <th>STOCK</th>
        <th>STOCK MINIMO</th>
        <th>VALOR FRACCIONADO</th>
        <th>FECHA INGRESO</th>
        <th>FECHA CADUCIDAD</th>
        <th>ESTADO</th>
        <th>FECHA CREACIÓN</th>
        <th>FECHA ACTUALZIACIÓN</th>
        <th>INGRESADO POR</th>
    </tr>
    </thead>
    <tbody>
    @foreach($insumos as $insumo)
        <tr>
            <td>{{ $insumo->id_insumos }}</td>
            <td>{{ $insumo->cod_insumo }}</td>
            <td>{{ $insumo->laboratorio->laboratorio }}</td>
            <td>{{ $insumo->presentacion->presentacion }}</td>
            <td>{{ $insumo->formato->formato }}</td>
            <td>{{ $insumo->concentracion_insumo }} {{ $insumo->unidad->unidad }}</td>
            <td>{{ $insumo->cantidad_envase }} {{ $insumo->medida_insumoM }}</td>
            <td>{{ $insumo->stock }}</td>
            <td>{{ $insumo->stock_min }}</td>
            <td>{{ $insumo->valor_insumo }}</td>
            <td>{{ $insumo->fecha_recepcion }}</td>
            <td>{{ $insumo->fecha_caducidad}}</td>
            <td>{{ $insumo->estados->estado }}</td>
            <td>{{ $insumo->created_at }}</td>
            <td>{{ $insumo->updated_at }}</td>
            <td>{{ $insumo->usuariocrea->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>