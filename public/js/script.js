$(document).ready(function(){
    $('#example').DataTable({
      "order":[[0, "desc"]],
      'aaSorting':[],
      dom: 'Bfrtip',
      buttons: [
          'pageLength',
  
      ]
    });
})

$(document).ready(function(){
  $('#example2').DataTable();
})

	/**	 USUARIO  **/

    $("#add-new-btn").on("click", function(){
        //calling method to add new row
        addNewRow();
      }
                          );
      /* This event will fire on 'Delete Row' button click */
      $("#delete-btn").on("click", function(){
        //calling method to delete the last row
        deleteRow();
      }
                         );
      /* This method will add a new row */
      // function addNewRow(){
      //   var rowHtml='<tr><td><input type="text" class="form-control" /></td>'
      //   +'<td><select class="form-select">'
      //   +'<option>Seleccione...</option></select></td>'
      //   +'<td><input type="number" class="form-control" /></td>'
      //   +'<td><input type="text" class="form-control" /></td>'
      //   +'<td><input type="button" class="btn btn-danger" '
      //   +' value="Eliminar" onclick="deleteRow(this)" /></td></tr>';
      //   $("#employee-table").append(rowHtml);
      // }
      // /* This method will delete a row */
      // function deleteRow(ele){
      //   var table = $('#employee-table')[0];
      //   var rowCount = table.rows.length;
      //   if(rowCount <= 1){
      //     alert("There is no row available to delete!");
      //     return;
      //   }
      //   if(ele){
      //     //delete specific row
      //     $(ele).parent().parent().remove();
      //   }
      //   else{
      //     //delete last row
      //     table.deleteRow(rowCount-1);
      //   }
      // }

    // Código JavaScript utilizando AJAX para agregar opciones al select
    // Debes incluir jQuery para que funcione el siguiente código
    $(document).ready(function() {
      $.ajax({
          url: '/get-options', // Ruta para obtener los datos desde el servidor
          method: 'GET',
          success: function(data) {
              if (data.length > 0) {
                  // Recorre los datos obtenidos y agrega las opciones al select
                  for (let i = 0; i < data.length; i++) {
                      $('#dynamicSelect').append(`<option value="${data[i].tipoin}">${data[i].tipoin}</option>`);
                  }
              } else {
                  $('#dynamicSelect').append('<option value="">No se encontraron opciones</option>');
              }
          },
          error: function() {
              $('#dynamicSelect').append('<option value="">Error al obtener datos desde el servidor</option>');
          }
      });
  });



//   $('#frm-nuevo-pedido').submit(function(e){
//     e.preventDefault();
    
//     var insumo = []
//     var insumocompleto = []
//     var cantidad = []
//     var medida = []


//     $.each($('#tbl-nuevo-pedido tbody tr'),function(){
        
//         cantidad.push($(this).find('.Ip_Cantidad').val())
//         insumocompleto.push($(this).find('.tipoinsumo option:selected').text())
//         medida.push($(this).find('.Ip_Medida').val())
//     })

//     // var datos = '_token='+_token+'&Edita_ID_Pedido='+$('#Edita_ID_Pedido').val()
//     // +'&ID_Tipo_Producto='+$('#ID_Tipo_Producto').val()
//     // +'&Pe_Centro_Costo='+$('#Pe_Centro_Costo').val()
//     // +'&Pe_Observaciones='+$('#Pe_Observaciones').val()

//     // +'&I_Insumo_SoftlandP='+encodeURIComponent(JSON.stringify(insumocompleto))
//     // +'&I_Talla_Color='+JSON.stringify(medida)
//     // +'&Ip_Cantidad='+JSON.stringify(cantidad)
    

//     //alert()

//      crear_set(
//         // datos,
//         //  //new FormData($("#frm-nuevo-factura")[0]),
//          $('#btn-submit-add-pedido'),
//          '/Pedidos/Store',
//          'POST'
//      );		
// });


// function add_nuevo_pedido(e){
	
//     e.preventDefault();
//     var datos = new FormData(this);
//     boton = $('#btn-submit-add-pedido');
//     boton.attr('disabled',true);
//     btn_text = boton.html();
//     boton.html('<i class="fas fa-spinner fa-spin"></i>');
//     $.ajax({
//         type: 'POST',
//         url: '/Pedidos/Store',
//         data: datos,
//         contentType: false,
//         cache: false,
//         processData:false,
//     });
// }


	$('#icon-add-rows-nuevo-pedido').click(function(){
		add_rows_table($('#employee-table tbody tr:first'),$('#employee-table tbody'));
	  });
    $('body').on('click','.icon-sub-row-nuevo-pedido', function(){
      if($(this).parents('tbody')[0].rows.length > 1){
        $(this).parents('tr').remove();
      }
    });
  
    function add_rows_table(tabla_tbody_tr, tabla_tbody){
      var tr = tabla_tbody_tr.clone();
      tr.find('.exlude').each(function(){
          $(this).removeClass('exlude');
      });
      tr.find('input').each(function(){
          $(this).val('0');
      });
      tr.find('select').each(function(){
          //console.log($(this))
          $(this).removeClass('chzn-done').removeAttr("id").css("display", "block").next().remove();
          $(this).chosen({
              inherit_select_classes: true,
              no_results_text: "No hay resultados para:",
              width: "inherit"//para modal
          })
      });
  
      tabla_tbody.append(tr);
  
  }

//   function crear_set(datos,ruta,tipo='PUT'){
// 	//console.log(datos)
// 	//alert()
//     // boton.attr('disabled',true);
//     // btn_text = boton.html();
//     // boton.html('Espere...');
//     $.ajax({
//         type: tipo,
//         url: ruta,
//         data: {
//             "_token": $("meta[name='csrf-token']").attr("content")
//         },
//     });
// }

// document.getElementById("myForm").addEventListener("submit", function(event) {
//     event.preventDefault();
//     var formData = new FormData(this);
//     sendData(formData);
//   });

//   function sendData(formData) {
//     axios.post('/Pedidos/Store', formData)
//       .then(function(response) {
//         console.log(response.data);
//         // Handle the response data as needed
//       })
//       .catch(function(error) {
//         console.error(error);
//         // Handle errors if any
//       });
//   }

$(document).ready(function () {
  // Capturar el evento de cambio en el select
  $('#selectOption').change(function () {
      var selectedValue = $(this).val();
            // Hacer una llamada AJAX para obtener la información desde la base de datos
            $.ajax({
                url: '/datoselect',
                type: 'GET',
                data: { selectedValue: selectedValue },
                success: function (response) {
                    // Actualizar el valor del input con la información obtenida
                    $('#Ip_Medida').val(response);
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });


    $(document).ready(function () {
        $('.eliminar').click(function (e) {
            e.preventDefault();
            
            var nombre = $(this).data('nombre');
            
            if (confirm('¿Estás seguro de que deseas anular el pedido ' + nombre + '?')) {
                window.location.href = $(this).attr('href');
            }
        });
    });
    $(document).ready(function () {
        $('.anular').click(function (e) {
            e.preventDefault();
            
            var nombre = $(this).data('nombre');
            
            if (confirm('¿Estás seguro de que deseas dar de baja el insumo: ' + nombre + '?')) {
                window.location.href = $(this).attr('href');
            }
        });
    });
    $(document).ready(function () {
        $('.activar').click(function (e) {
            e.preventDefault();
            
            var nombre = $(this).data('nombre');
            
            if (confirm('¿Estás seguro de que deseas activar el insumo: ' + nombre + '?')) {
                window.location.href = $(this).attr('href');
            }
        });
    });
    document.getElementById("imprimirBoton").addEventListener("click", function() {
        window.print();
    });