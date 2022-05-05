 /**======================================
    *             Show Products
    * ======================================**/
    
$('#table-product-sale').DataTable({
    "ajax": 'ajax/sales.ajax.php',
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}
});

/**======================================
 *           Sale Add product
 * ======================================**/
$("#table-product-sale tbody").on("click", "button.add-product", function(){

    
    
    let id_product = $(this).attr("id-product");
	$(this).removeClass('btn-primary add-product');
	$(this).addClass('btn-default');
    let data = new FormData();
    data.append('id_product', id_product);
   
    
	console.log(id_product);

	$.ajax({
        url: 'ajax/products.ajax.php',
        method: 'POST',
        data,
        cache: false,
        contentType: false,
        processData: false,
        typeData: 'json',
       	success: function(response){
			let json_response = JSON.parse(response);
				  let name = json_response['name'];
				  let stock = json_response['stock'];
				  let purchase_price = json_response['purchase_price'];
				  
				  $('.new-product').append(
					
					  				'<div class="row" style="padding: 5px 15px;">'+
                                        '<div class="col-xs-6" style="padding-right:0;">'+

                                            '<div class="input-group">'+
                                                '<span class="input-group-addon" style="padding-bottom: 0; padding-top: 0;">'+
                                                    '<button type="button" class="btn btn-danger btn-xs">'+
										  				'<i class="fa fa-times">'+
														'</i>'+
                                                    '</button>'+
                                                '</span>'+

                                                '<input type="text" class="form-control" name="addProduct" placeholder="Add Product" id="addProduct" value="'+name+'" required readonly/>'+
                                            '</div>'+

                                        '</div>'+

                                        '<div class="col-xs-3" style="padding-right:0;">'+
                                            '<div class="input-group">'+
                                                '<label for="price" class="input-group-addon">'+
									  				'<i class="fa fa-sort-amount-asc">'+
													'</i>'+
                                                '</label>'+

                                                '<input type="number" class="form-control" name="quantity" placeholder="0" value="1" id="quantity" stock="'+stock+'" required min="1" />'+
                                            '</div>'+

                                        '</div>'+

                                        '<div class="col-xs-3">'+
                                            '<div class="input-group">'+
                                                '<input type="number" class="form-control" name="price" placeholder="0" id="price" value="'+purchase_price+'" required min="1" readonly />'+
                                                '<label for="price" class="input-group-addon">'+
									  				'<i class="fa fa-dollar">'+
													'</i>'+
                                                '</label>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'
				)
          
           
        
		}

	})

    
});
