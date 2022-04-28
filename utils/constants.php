<?php
 /**======================================
  *             White List PAges
  * ======================================**/
 $white_list_pages =  array('dashboard' => true, 
                            'users' => true, 
                            'categories' => true, 
                            'products' => true,
                            'clients' => true,
                            'sales' => true,
                            'create-sale' => true,
                            'sales-report' => true,
                            'logout' => true
                            );

 /**======================================
  *      RegEx to validad login form
  * ======================================**/

$RegEx = '/^[a-zA-Z0-9]+$/';

$RegExLatin = '/^[a-záàâãéèêíïóôõöúçñ ]+$/i';
$RegExPass = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]$/';
$RegExNumber = '/^[0-9.]+$/';


 /**======================================
  *      Form Post User Register 
  * ======================================**/






  

/**======================================
 *      Alerts User
 * ======================================**/

 $error_login = '
                    <div class="alert alert-danger" style="margin: 15px 0 0 0;">
                        Error al iniciar sesión, vuelve a intentarlo. 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ';

 $disabled_account = '
                    <div class="alert alert-danger" style="margin: 15px 0 0 0;">
                        Su cuenta ha sido desactivada
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ';


$not_special_symbol = "
                <script>
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No se permiten números ni simblolos especiales en el nombre',
                            
                        }).then(result => {
                            if(result.value) {
                                window.location = 'users';
                            }
                        })
                </script>
                ";

$not_special_symbol_username = "
                <script>
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No se permiten caracteres especiales en el nombre de usuario',
                            showConfirmButton: true,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        }).then(result => {
                            if(result.value) {
                                window.location = 'users';
                            }
                        })
                </script>
                ";

$password_error = "
                <script>
                    Swal.fire({
                            icon: 'error',
                            title: 'La contraseña de contener la siguientes caracteristicas',
                            text: 'Tener un mínimo de 8 caracteres, Contener al menos 1 número, Contener al menos un carácter en mayúscula, Contener al menos un carácter en minúscula',
                            
                        }).then(result => {
                            if(result.value) {
                                window.location = 'users';
                            }
                        })
                </script>
                ";

$user_register_success = "
                <script>
                    Swal.fire({
                            icon: 'success',
                            title: 'OK',
                            text: 'EL usuario fue creado exitosamente!',
                        }).then(result => {
                            if(result.value) {
                                window.location = 'users';
                            }
                        })
                </script>
                ";


$user_update_success = "
                <script>
                    Swal.fire({
                            icon: 'success',
                            title: 'OK',
                            text: 'EL usuario fue actualizado exitosamente!'
                        }).then(result => {
                            if(result.value) {
                                window.location = 'users';
                            }
                        })
                </script>
                ";

/**======================================
 *      Alerts Category
 * ======================================**/

$category_register_success = "
                <script>
                    Swal.fire({
                            icon: 'success',
                            title: 'OK',
                            text: 'La categoría fue creada exitosamente!',
                        }).then(result => {
                            if(result.value) {
                                window.location = 'categories';
                            }
                        })
                </script>
                ";
$category_update_success = "
                <script>
                    Swal.fire({
                            icon: 'success',
                            title: 'OK',
                            text: 'La categoría fue actualizada exitosamente!',
                            
                        }).then(result => {
                            if(result.value) {
                                window.location = 'categories';
                            }
                        })
                </script>
                ";


/**======================================
 *      Alerts products
 * ======================================**/
$product_register_success = "
                <script>
                    Swal.fire({
                            icon: 'success',
                            title: 'OK',
                            text: 'El producto fue creado exitosamente!',
                        }).then(result => {
                            if(result.value) {
                                window.location = 'products';
                            }
                        })
                </script>
                ";
$product_edit_success = "
                <script>
                    Swal.fire({
                            icon: 'success',
                            title: 'OK',
                            text: 'El producto fue editado exitosamente!',
                        }).then(result => {
                            if(result.value) {
                                window.location = 'products';
                            }
                        })
                </script>
                ";

 $anyNumbers = "
                <script>
                    Swal.fire({
                            icon: 'error',
                            title: 'error',
                            text: 'Este campo solo admite números!',
                            
                        }).then(result => {
                            if(result.value) {
                                window.location = 'products';
                            }
                        })
                </script>
                ";