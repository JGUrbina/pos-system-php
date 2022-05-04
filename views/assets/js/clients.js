/**======================================
 *             Client client
 * ======================================**/ 
$('.btn-edit-client').click('.btn-edit-client', function () {
    let client_id = $(this).attr('id-client');
    console.log('----> ', client_id);
    let data = new FormData();
    data.append('client_id', client_id);
  
    
   

    $.ajax({
        url: 'ajax/clients.ajax.php',
        method: 'POST',
        data,
        cache: false,
        contentType: false,
        processData: false,
        typeData: 'json',
        success: function (response) {
            
            
            let json_response = JSON.parse(response);
            console.log('---> ', response, json_response);
            $('#id-client').val(json_response['id']);
            $('#edit-name').val(json_response['name']);
            $('#edit-email').val(json_response['email']);
            $('#edit-document').val(json_response['document']);
            $('#edit-telephone').val(json_response['telephone']);
            $('#edit-direction').val(json_response['direction']);
            json_response['birthday'] != '0000-00-00' && $('#edit-birthday').val(json_response['birthday']);
            $('#id_client').val(json_response['id']);
            
        }
    });


  
});

/**======================================
 *         Delete Client
 * ======================================**/
$(document).on('click', '.btn-delete-client', function () {

    
   
    let id_client = $(this).attr("id-client");
    
    let data = new FormData();
    data.append('delete_id', id_client);

    

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
                url: 'ajax/clients.ajax.php',
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
                            title: 'Cliente eliminado correctamente!',
                            showConfirmButton: true,
                            timer: 700
                        }).then(function () {
                            window.location = 'clients';
                        })
                    } else {
                        Swal.fire({
                            //position: 'top-end',
                            icon: 'error',
                            title: 'Error al intentar eliminar el cliente',
                            showConfirmButton: true,
                            timer: 1500
                        });
                    }
                    
                }
            });
        }
        
    });
    

      
});
