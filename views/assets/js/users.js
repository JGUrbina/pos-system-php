let types = { 'image/jpeg': true, 'image/png': true };
/**======================================
 *            Chage Img
 * ======================================**/ 
$('.perfil_img').change(function () {
    let img = this.files[0];
    
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


/**======================================
 *             Edit_User
 * ======================================**/ 
$(document).on('click', '.btn-edit-user', function () {
    let user_id = $(this).attr('id-user');

    let data = new FormData();
    data.append('user_id', user_id);
    
    let defaul_img = 'views/assets/img/users/default/anonymous.png';

    $.ajax({
        url: 'ajax/users.ajax.php',
        method: 'POST',
        data,
        cache: false,
        contentType: false,
        processData: false,
        typeData: 'json',
        success: function (response) {
            
            let json_response = JSON.parse(response);
            $('#edit_name').val(json_response['name']);
            $('#edit_username').val(json_response['username']);
            $('#actual_password').val(json_response['password']);
            $('#edit_rol').html(json_response['rol']);
            $('#edit_rol').val(json_response['rol']); 
            $('#actual_perfil_img').val(json_response['perfil_img']);
            
            if (json_response['perfil_img'] != '') {
                $('.preview-edit').attr('src', json_response['perfil_img']);
            } else {
                $('.preview-edit').attr('src', defaul_img);
            }
        }
    });


  
});


/**======================================
 *         Active and Disabled user
 * ======================================**/

$(document).on('click', '.btn-active', function () {
    let update_id = $(this).attr('user-id');
    let user_state = $(this).attr('user-state');

    let data = new FormData();
    data.append('update_id', update_id);
    data.append('user_state', user_state);

    
     $.ajax({
        url: 'ajax/users.ajax.php',
        method: 'POST',
        data,
        cache: false,
        contentType: false,
        processData: false,
        typeData: 'json',
        success: function (response) {
            if (window.matchMedia('(max-width: 728px)').matches) {
                Swal.fire({
                            //position: 'top-end',
                            icon: 'success',
                            title: 'Usuario activado correctamente!',
                            showConfirmButton: true,
                            timer: 700
                        }).then(function () {
                            window.location = 'users';
                        })
                
            }
            
            
            
           
        }
    });

    if (user_state == 0) {
                $(this).removeClass('btn-success');
                $(this).addClass('btn-danger');
                $(this).html('disabled');
                $(this).attr('user-state', 1);
                
    } else {
        
        $(this).removeClass('btn-danger');
            $(this).addClass('btn-success');
            $(this).html('active');
            $(this).attr('user-state', 0);
            }
            
});


/**======================================
 *         No repeat user
 * ======================================**/

$('#new-username').change(function () {

    $('.alert').remove();
    $('.submit').attr('disabled', false);
    let username = $(this).val();
    let data = new FormData();

    data.append('valid_username', username);
     $.ajax({
        url: 'ajax/users.ajax.php',
        method: 'POST',
        data,
        cache: false,
        contentType: false,
        processData: false,
        typeData: 'json',
        success: function (response) {
            
            
            if (response != 'false') {
                
                $('.submit').attr('disabled', true);
                $('#new-username').val('');
                $('#new-username').parent().after('<div class="alert alert-danger" style="margin: 15px 0 0 0;">El usuario ya existe por favor agregue otro. </div > ');
            } 
            
            
           
        }
    });
});


/**======================================
 *         Delete User
 * ======================================**/
$(document).on('click', '.delete-user', function () {

    
   
    let id_user = $(this).attr("id-user");
    let img_user = $(this).attr("img-user");
    let data = new FormData();
    data.append('delete_id', id_user);
    data.append('img_user', img_user);

    

    Swal.fire({
        title: 'Está seguro de borrar este usuario',
        icon: 'warning',
        
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText:
            'Si, eliminar usario',
        //confirmButtonAriaLabel: 'Thumbs up, great!',
        cancelButtonText:
            'Cancelar',
        //cancelButtonAriaLabel: 'Thumbs down'
    }).then(function ({isConfirmed}) {
        if (isConfirmed) {
            $.ajax({
                url: 'ajax/users.ajax.php',
                method: 'POST',
                data,
                cache: false,
                contentType: false,
                processData: false,
                typeData: 'json',
                success: function (response) {
                    
                    if (response == 'OK') {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Usuario eliminado correctamente!',
                            showConfirmButton: true,
                            timer: 700
                        }).then(function () {
                            window.location = 'users';
                        })
                    } else {
                        Swal.fire({
                            //position: 'top-end',
                            icon: 'error',
                            title: 'Error al intentar eliminar el usuario',
                            showConfirmButton: true,
                            timer: 1500
                        });
                    }
                    
                }
            });
        }
        
    });
    

      
});

