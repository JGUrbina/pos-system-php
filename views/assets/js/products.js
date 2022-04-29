 

    //  $.ajax({
    //     url: 'ajax/datatable-products.ajax.php',
    //     success: function (response) {
            
    //         console.log(response)
            
            
    //     }
    //  });

    /**======================================
    *             Show Products
    * ======================================**/
    
$('#table-product').DataTable({
    "ajax": 'ajax/datatable-products.ajax.php',
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
    *             Detecting Category
    * ======================================**/

$('#categoryProduct').change(function () {
    const id = $(this).val();

    const data = new FormData();
    data.append('id_category', id)
   

    $.ajax({
                url: 'ajax/products.ajax.php',
                method: 'POST',
                data,
                cache: false,
                contentType: false,
                processData: false,
                typeData: 'json',
                success: function (response) {
                    let data_json = JSON.parse(response);
                    let new_code = 0;
                    if (data_json['code']) {
                        new_code =  Number(data_json['code']) + 1;
                    } else {
                         new_code = id + '01';
                    }

                    $('#code').val(new_code);
                }
            });
})

/**======================================
*      Modificando precio de venta
* ======================================**/
   
$('#purchase_price').change(function () {
    console.log($('#porcentajeCheck').prop('checked'))
    if ($('#porcentajeCheck').prop('checked')) {

        //Porsentaje y el precio de compra
        let porsentaje = Number($('#porcentaje').val());
        let purchase_price = Number($('#purchase_price').val());

        //let sale_price = 
        if (Number(porsentaje) > 0) {
            let sale_price = ((porsentaje * purchase_price) / 100) + purchase_price;

            $('#sale_price').val(sale_price);
            $('#sale_price').prop('readonly', true);
        }
       
    } else {
        $('#porcentaje').val(0);
        
    }
        
});



$('#porcentaje').change(function () {

    if ($('#porcentajeCheck').prop('checked')) {

        let porsentaje = Number($('#porcentaje').val());
        let purchase_price = Number($('#purchase_price').val());
        //let sale_price = 
        if (Number(porsentaje) > 0) {

            let sale_price = ((porsentaje * purchase_price) / 100) + purchase_price;

            $('#sale_price').prop('readonly', true);
             $('#sale_price').val(sale_price)
            
        }
    } else {
        $('#porcentaje').val(0);
       
    }
});


 /**======================================
    *             Ocultar Porcentaje
    * ======================================**/

$('#porcentajeCheck').on('ifUnchecked', function () {
    //sale price y el valor de purchase price
   
   
    $('#sale_price').prop('readonly', false);

    $('#inputPorcentaje').hide();
    $('#porcentaje').val(0);
     $('#edit-checked').val(0);
    
});


$('#porcentajeCheck').on('ifChecked', function () {

    $('#sale_price').prop('readonly', true);
    $('#inputPorcentaje').show();
     $('#checked').val(1);


    
 })


/**======================================
 *            Chage Img product
 * ======================================**/ 
$('.product_img').change(function () {
    let img = this.files[0];
    console.log(this)
    if (img) {
        if (!types[img['type']]) return Swal.fire({
            icon: 'error',
            title: 'Tipo de archivo no valido',
            text: 'La imgen debe ser JPEG ó PNG',
                            
        });

        if (img['size'] > 3000000) return Swal.fire({
            icon: 'error',
            title: 'Imagen muy pesada',
            text: 'Solo se admiten imagenes con máximo de 3 MB',
                            
        });

        let imageData = new FileReader();

        imageData.readAsDataURL(img);

        $(imageData).on('load', (event) => {
            let imgUrl = event.target.result;

            $('.preview').attr('src', imgUrl);
        });
    }
});


/*=============================================
EDITAR PRODUCTO
=============================================*/

$("#table-product tbody").on("click", "button.btn-edit-product", function(){

	let id_producto = $(this).attr("id-product");
	
	let data = new FormData();
    data.append("id_product", id_producto);

    

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
           let data_category = new FormData();
          data_category.append("category_id",json_response["id_category"]);


          
           
           

          $.ajax({

             url:"ajax/categories.ajax.php",
             method: "POST",
             data: data_category,
             cache: false,
             contentType: false,
             processData: false,
             dataType:"json",
             success:function(response){
                  
                // let json_response = JSON.parse(response);
                 
                $("#p").val(response["id"]);
                $("#p").html(response["name"]);

             }

          })
           
            let allCategories = new FormData();
           allCategories.append("all", 'true');
           
           $.ajax({
             url:"ajax/categories.ajax.php",
             method: "POST",
             data: allCategories,
             cache: false,
             contentType: false,
             processData: false,
             dataType:"json",
             success:function(response){

                // let json_response = JSON.parse(response);
                 let select = $('#edit-category');

                 for (let category of response) {

                     if (category.id != json_response["id_category"]) {

                         select.append($("<option>", {
                            value: category.id,
                            text: category.name
                         }));
                         
                     }
                }

             }

         })
           
           
        $("#edit-name-product").val(json_response["name"]);
        
        $("#edit-sku").val(json_response["sku"]);

        $("#edit-code").val(json_response["code"]);

        $("#edit-description").val(json_response["description"]);

        $("#edit-stock").val(json_response["stock"]);

        $("#edit-purchase_price").val(json_response["purchase_price"]);

        $("#edit-sale_price").val(json_response["sale_price"]);
        
        $("#edit-sales").val(json_response["sales"]);
           
           $("#edit-id").val(json_response["id"]);   
           console.log(json_response["id"]);
           let checked = json_response["have_porsentaje"] > 0 ? $('#edit-porcentajeCheck').iCheck('check') : $('#edit-porcentajeCheck').iCheck('uncheck');
        //let checked = json_response["have_porsentaje"] > 0 ?  $('#edit-porcentajeCheck').iCheck('uncheck') : $('#edit-porcentajeCheck').iCheck('check');

          
           
        $("#edit-porcentajeCheck").prop('cheked', checked);

       $("#edit-porcentaje").val(json_response["porcentaje"]);

          if(json_response["image"] != ""){

          	$("#actual_product_img").val(json_response["image"]);

          	$(".edit-preview").attr("src",  json_response["image"]);

          }

       }

   })

})

 /**======================================
    *           Ctegories Edit
    * ======================================**/

$('#edit-category').change(function () {
    const id = $(this).val();

    const data = new FormData();
    data.append('id_category', id)
   

    $.ajax({
                url: 'ajax/products.ajax.php',
                method: 'POST',
                data,
                cache: false,
                contentType: false,
                processData: false,
                typeData: 'json',
                success: function (response) {
                    let data_json = JSON.parse(response);
                    let new_code = 0;
                    if (data_json['code']) {
                        new_code =  Number(data_json['code']) + 1;
                    } else {
                         new_code = id + '01';
                    }

                    $('#edit-code').val(new_code);
                }
            });
})

 /**======================================
    *           Ocultar Porcentaje edit
    * ======================================**/

$('#edit-porcentajeCheck').on('ifUnchecked', function () {
    //sale price y el valor de purchase price
   
   
    $('#edit-sale_price').prop('readonly', false);
    $('#edit-inputPorcentaje').hide();
    $('#edit-porcentaje').val(0);
    $('#edit-checked').val(0);
    
});


$('#edit-porcentajeCheck').on('ifChecked', function () {

    $('#edit-sale_price').prop('readonly', true);
    $('#edit-inputPorcentaje').show();
    $('#edit-checked').val(1);


    
 })

$('#edit-purchase_price').change(function () {
        console.log('cososo', $('#edit-porcentajeCheck').prop('checked'))
    
    if ($('#edit-porcentajeCheck').prop('checked')) {

        //Porsentaje y el precio de compra
        let porsentaje = Number($('#edit-porcentaje').val());
        let purchase_price = Number($('#edit-purchase_price').val());

        //let sale_price = 
        if (Number(porsentaje) > 0) {
            let sale_price = ((porsentaje * purchase_price) / 100) + purchase_price;

            $('#edit-sale_price').val(sale_price);
            $('#edit-sale_price').prop('readonly', true);
        }
       
    } 
        
});

$('#edit-porcentaje').change(function () {

    if ($('#edit-porcentajeCheck').prop('checked')) {

        //Porsentaje y el precio de compra
        let porsentaje = Number($('#edit-porcentaje').val());
        let purchase_price = Number($('#edit-purchase_price').val());
        //let sale_price = 
        if (Number(porsentaje) > 0) {

            let sale_price = ((porsentaje * purchase_price) / 100) + purchase_price;

            $('#edit-sale_price').prop('readonly', true);
             $('#edit-sale_price').val(sale_price)
            
        }
    } else {
        $('#porcentaje').val(0);
       
    }
});

/**======================================
 *            Chage Img product
 * ======================================**/ 
$('.edit-product_img').change(function () {
    let img = this.files[0];
    console.log(this)
    if (img) {
        if (!types[img['type']]) return Swal.fire({
            icon: 'error',
            title: 'Tipo de archivo no valido',
            text: 'La imgen debe ser JPEG ó PNG',
                            
        });

        if (img['size'] > 3000000) return Swal.fire({
            icon: 'error',
            title: 'Imagen muy pesada',
            text: 'Solo se admiten imagenes con máximo de 3 MB',
                            
        });

        let imageData = new FileReader();

        imageData.readAsDataURL(img);

        $(imageData).on('load', (event) => {
            let imgUrl = event.target.result;

            $('.edit-preview').attr('src', imgUrl);
        });
    }
});