/**======================================
 *             Edit_category
 * ======================================**/ 
$(document).on('click', '.btn-edit-category', function () {
    let category_id = $(this).attr('id-category');

    let data = new FormData();
    data.append('category_id', category_id);
  
    
   

    $.ajax({
        url: 'ajax/categories.ajax.php',
        method: 'POST',
        data,
        cache: false,
        contentType: false,
        processData: false,
        typeData: 'json',
        success: function (response) {
            
            
            let json_response = JSON.parse(response);
            $('#edit_category').val(json_response['name']);
            $('#id_category').val(json_response['id']);
            
        }
    });


  
});


/**======================================
 *         Delete Category
 * ======================================**/
$(document).on('click', '.delete-category', function () {

    
   
    let id_category = $(this).attr("id-category");
    
    let data = new FormData();
    data.append('delete_id', id_category);

    

    Swal.fire({
        title: 'Está seguro de borrar esta categoría',
        icon: 'warning',
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText:
            'Si, eliminar categoría',
        //confirmButtonAriaLabel: 'Thumbs up, great!',
        cancelButtonText:
            'Cancelar',
        //cancelButtonAriaLabel: 'Thumbs down'
    }).then(function ({ isConfirmed }) {
        
        if (isConfirmed) {
            $.ajax({
                url: 'ajax/categories.ajax.php',
                method: 'POST',
                data,
                cache: false,
                contentType: false,
                processData: false,
                typeData: 'json',
                success: function (response) {
                    console.log('JS Response --> ', response)
                    if (response == 'OK') {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Categoría eliminada correctamente!',
                            showConfirmButton: true,
                            timer: 700
                        }).then(function () {
                            window.location = 'categories';
                        })
                    } else {
                        Swal.fire({
                            //position: 'top-end',
                            icon: 'error',
                            title: 'Error al intentar eliminar la categoría',
                            showConfirmButton: true,
                            timer: 1500
                        });
                    }
                    
                }
            });
        }
        
    });
    

      
});
