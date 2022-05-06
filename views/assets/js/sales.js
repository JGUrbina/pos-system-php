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
 *            Add product
 * ======================================**/
$("#table-product-sale tbody").on("click", "button.add-product", function(){

    
    
    let id_product = $(this).attr("id-product");
	$(this).removeClass('btn-primary add-product');
	$(this).addClass('btn-default');
    let data = new FormData();
    data.append('id_product', id_product);
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
				  let sale_price = json_response['sale_price'];
				  let id_product = json_response['id'];

				 
				  
				  $('.new-product').append(
					
					  '<div class="row" style="padding: 5px 15px;">' +
					  '<div class="col-xs-6" style="padding-right:0;">' +

					  '<div class="input-group">' +
					  '<span class="input-group-addon" style="padding-bottom: 0; padding-top: 0;">' +
					  '<button type="button" class="btn btn-danger btn-xs btn-sales-delete-product" id-product="' + id_product + '">' +
					  '<i class="fa fa-times">' +
					  '</i>' +
					  '</button>' +
					  '</span>' +

					  '<input type="text" class="form-control" name="addProduct" placeholder="Add Product" id="addProduct" value="' + name + '" required readonly/>' +
					  '</div>' +

					  '</div>' +

					  '<div class="col-xs-3 child-stock" style="padding-right:0;">' +
					  '<div class="input-group">' +
					  '<label for="price" class="input-group-addon">' +
					  '<i class="fa fa-sort-amount-asc">' +
					  '</i>' +
					  '</label>' +

					  '<input type="number" class="form-control quantity" name="quantity" placeholder="0" value="1"  stock="' + stock + '" max="' + stock + '" required min="1" />' +
					  '</div>' +

					  '</div>' +

					  '<div class="col-xs-3 child-price">' +
					  '<div class="input-group">' +
					  '<input type="text" class="form-control price" name="price" placeholder="0" value="' + sale_price + '" price="' + sale_price + '" required readonly />' +
					  '<label for="price" class="input-group-addon">' +
					  '<i class="fa fa-dollar">' +
					  '</i>' +
					  '</label>' +
					  '</div>' +
					  '</div>' +
					  '</div>'
				  );
				//Sumar precios de los productos
				  sumarTotalPrecios();
				  
				  $('.price').number(true, 2);
        
		}

	})

    
});

/**======================================
  *         Navigate on table
  * ======================================**/
localStorage.removeItem("deleteProduct")
$('#table-product-sale').on('draw.dt', function () {
	console.log('table');
	let newProduct = [];
	if (localStorage.getItem("deleteProduct") != null ) {
		let listIdProducts = JSON.parse(localStorage.getItem("deleteProduct"));

		for (let listId in listIdProducts) {
			
			$(".recover-product[id-product='" + listIdProducts[listId]['id_product'] + "']").removeClass('btn-default');
			$(".recover-product[id-product='" + listIdProducts[listId]['id_product'] + "']").addClass('btn-primary add-product');
			
			if (listIdProducts[listId]['id_product'] == $(".recover-product[id-product='" + listIdProducts[listId]['id_product'] + "']").attr('id-product')) {
				delete listIdProducts[listId];
			} 

		}

		for (let listId in listIdProducts) { 
			if (!!istIdProducts[listId]) {
				newProduct = [...newProduct, istIdProducts[listId]];
			}
		}
		console.log(newProduct.length);
		newProduct.length == 0 ? localStorage.removeItem("deleteProduct") : localStorage.setItem("deleteProduct", JSON.stringify(newProduct));
	}

})


 /**======================================
  * Delete product of salestable-product-sale
  * ======================================**/

$(".form-sales").on("click", "button.btn-sales-delete-product", function () { 
	
	$(this).parent().parent().parent().parent().remove();
	let id_product = $(this).attr('id-product');

	 /**======================================
  	  *      Delete product id Localstorage
  	  * ======================================**/
	let deleteProduct = [];
	console.log('localStorage', localStorage.getItem("deleteProduct"))
	if (localStorage.getItem("deleteProduct") == null ) {
		if (!$(".recover-product[id-product='" + id_product + "']").hasClass('btn-default')) {
			deleteProduct.push({ id_product });
		}
		
	} else {
		if (!$(".recover-product[id-product='" + id_product + "']").hasClass('btn-default')) { 
			deleteProduct = [...JSON.parse(localStorage.getItem("deleteProduct")), { id_product }];
		}
		
	}

	if (!$(".recover-product[id-product='" + id_product + "']").hasClass('btn-default')) { 
		localStorage.setItem("deleteProduct", JSON.stringify(deleteProduct));
	}
	
	$(".recover-product[id-product='" + id_product + "']").removeClass('btn-default');
	$(".recover-product[id-product='" + id_product + "']").addClass('btn-primary add-product');
	//Sumar precios de los productos
	sumarTotalPrecios();
	
});


/**======================================
 *     Sale Add product desde Mobil
 * ======================================**/
let numProduct = 0;
$('.btn-addProduct').click(function () {
	console.log('clicked');
	let data = new FormData();
	data.append('getAllProducts', 'ok');
	numProduct++; 
	$.ajax({
		url: 'ajax/products.ajax.php',
		method: 'POST',
		data,
		cache: false,
		contentType: false,
		processData: false,
		typeData: 'json',
		success: function (response) {
			
			let json_response = JSON.parse(response);
			
			$('.new-product').append(
					
				'<div class="row" style="padding: 5px 15px;">' +
				'<div class="col-xs-6" style="padding-right:0;">' +

				'<div class="input-group">' +
				'<span class="input-group-addon" style="padding-bottom: 0; padding-top: 0;">' +
				'<button type="button" class="btn btn-danger btn-xs btn-sales-delete-product" id-product>' +
				'<i class="fa fa-times">' +
				'</i>' +
				'</button>' +
				'</span>' +

				'<select class="form-control newDescriptionProduct" id="product-'+numProduct+'" id-product name="newDescriptionProduct" required>' +
					'<option>Select Product</option>'+
				'<select/>' +
				'</div>' +

				'</div>' +

				'<div class="col-xs-3 child-stock" style="padding-right:0;">' +
				'<div class="input-group">' +
				'<label for="price" class="input-group-addon">' +
				'<i class="fa fa-sort-amount-asc">' +
				'</i>' +
				'</label>' +

				'<input type="number" class="form-control quantity" name="quantity" placeholder="0" value="1"  stock max required min="1" />' +
				'</div>' +

				'</div>' +

				'<div class="col-xs-3 child-price">' +
				'<div class="input-group">' +
				'<input type="text" class="form-control price" name="price" price placeholder="0" value required  readonly />' +
				'<label for="price" class="input-group-addon">' +
				'<i class="fa fa-dollar">' +
				'</i>' +
				'</label>' +
				'</div>' +
				'</div>' +
				'</div>'
			);

			$('.price').number(true, 2);
			
			  /**======================================
			   * 		  add product al select
			   * ======================================**/
			function foreachFunction(item, index) {
				let option = '';
				if (item.stock == 0) {
					option = '<option id-product="'+item.id+'" value="'+item.name+'" disabled>'+item.name+'</option>'
				} else {
					option = '<option id-product="'+item.id+'" value="'+item.name+'">'+item.name+'</option>'
				}
				$('#product-'+numProduct).append(option);
			}
			
			json_response.forEach(foreachFunction);
			
		 }
	});
	
})


/**======================================
 * 		  Select Product Mobil
 * ======================================**/

$(".form-sales").on("change", "select.newDescriptionProduct", function () { 
	
	let name_product = $(this).val();
	let data = new FormData();
	let quantity = $(this).parent().parent().parent().children('.child-stock').children().children('.quantity');
	let price = $(this).parent().parent().parent().children('.child-price').children().children('.price');
	console.log(quantity)
	data.append('name_product', name_product);
	$.ajax({
		url: 'ajax/products.ajax.php',
		method: 'POST',
		data,
		cache: false,
		contentType: false,
		processData: false,
		typeData: 'json',
		success: function (response) { 
			let json_response = JSON.parse(response);
			
			quantity.attr('stock', json_response['stock']);
			quantity.attr('max', json_response['stock']);
			price.attr('price', json_response['sale_price']);
			price.attr('value',json_response['sale_price']);
			//Sumar precios de los productos
		sumarTotalPrecios();
	
		}
	});
	
});


/**======================================
 * 		  Modificar la cantidad 
 * ======================================**/

$(".form-sales").on("change", "input.quantity", function () { 
	let price = $(this).parent().parent().parent().children('.child-price').children().children('.price');
	let quantity = +$(this).val();
	let stock = +$(this).attr('stock');
	let base_price = price.attr('price');
	let total = quantity * base_price;
	//price.attr('value', total);
	price.val(total);
	if (quantity > stock) {
		Swal.fire({
                            icon: 'warning',
                            title: 'Limite excedido',
                            text: `La cantidad agregada supera el stock sol hay ${stock} unidades`,
                        }).then(result => {
                            if(result.value) {
								price.attr('value', base_price);
								$(this).val(1);
								sumarTotalPrecios()
                            }
                        })
	}
	sumarTotalPrecios()
});

/**======================================
 * 		 Sumar Array Números
 * ======================================**/

function sumarArrayNumeros(total, number) {
	return total + number;
}

/**======================================
 * 		  Modificar la cantidad 
 * ======================================**/

function sumarTotalPrecios() {
	let pricesItem = $('.price');
	let arrSumPrice = [];
	let total = 0;
	for (let i = 0; i < pricesItem.length; i++) {
		arrSumPrice = [...arrSumPrice, +$(pricesItem[i]).val()];
	}
	if (pricesItem.length > 0) {
		total = arrSumPrice.reduce(sumarArrayNumeros)
		$('.select_payment_method').removeClass('hidden')
	} else {
		$('.select_payment_method').addClass('hidden')
	}
	
	

	$('#total').val( total);
	$('#total').number(true, 2)
	$('#total').attr('total', total);
	agregarImpuesto();
	exchangeCash();
}

/**======================================
 * 		  agregar impuesto 
 * ======================================**/

$('#porcentaje-venta').change(function () {
	agregarImpuesto();
	exchangeCash();
});

/**======================================
 * 		 function agregar impuesto 
 * ======================================**/
function agregarImpuesto() {
	let procentaje = +$('#porcentaje-venta').val();
	let total = +$('#total').attr('total');
	let priceImpuesto = ((total * procentaje) / 100) + total;
	$('#total').val( priceImpuesto);
	$('#net').val( total);
	$('#tax').val( procentaje);
}

/**======================================
 * 		 agregar metodo de pago 
 * ======================================**/

$('#payment_method').change(function () {
	
	let method = $(this).val();
	let boxSelect = $(this).parent().parent().parent();
	let box_payment_method = boxSelect.parent().children('.box-payment-method');
	if (method == 'cash') {
		boxSelect.removeClass('col-xs-6');
		boxSelect.addClass('col-xs-4');

		box_payment_method.html(
			
			 '<div class="col-xs-4">'+ 

			 	'<div class="input-group">'+ 

			 		'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+ 

			 		'<input type="text" class="form-control" name="cash" id="cash" placeholder="000000" required>'+

			 	'</div>'+

			 '</div>'+

			 '<div class="col-xs-4" id="box-exchange" style="padding-left:0px">'+

			 	'<div class="input-group">'+

			 		'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+

			 		'<input type="text" class="form-control" id="exchange" name="exchange" placeholder="000000" readonly required>'+

			 	'</div>'+

			 '</div>'
		);

		//agregar formato al precio
		$('#cash').number(true, 2);
		$('#exchange').number(true, 2);
		
		
	} else {
		boxSelect.removeClass('col-xs-4');
		boxSelect.addClass('col-xs-6');
		box_payment_method.html(
				'<div class="col-xs-6">'+
                    '<div class="form-group">'+
                        '<div class="input-group">'+
                            '<input type="text" class="form-control" min="0" name="code-card"placeholder="0" id="code-card" autocomplete="off" required />'+
                            '<label for="code-card" class="input-group-addon">'+
                                '<i class="fa fa-credit-card">'+
								'</i>'+
                            '</label>'+
                        '</div>'+
                    '</div>'+
                '</div>'
		);
	}
});

/**======================================
 * 	dar vuelto cuando paguen en efectivo
 * ======================================**/
function exchangeCash() {
	let cash = +$('#cash').val();
	let total = $('#total').val();

	if (cash > total) {
		
		$('#exchange').val(cash - total)
	} else {
		$('#exchange').val(0)
	}
}
$(".form-sales").on("change", "input#cash", function () {
	exchangeCash();
});