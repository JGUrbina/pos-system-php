<?php




class UsersController {
    
    
    /**======================================
    *             User Login
    * ======================================**/

    static public function userLoginCtr() {
        
        
        include 'utils/constants.php';

        if(isset($_POST['username'])) {
            
            /**
             *  scape data
             */
            if(preg_match($RegEx, $_POST['username']) && 
               preg_match($RegEx, $_POST['password']) ) {

                
                $table = 'users';
                $item = 'username';
                $value = $_POST['username'];

                $response = UsersModel::MdlShowUsers($table, $item, $value);
                
               if(isset($response['username'])) {

                $password_encripted = crypt($_POST['password'], '$6$rounds=5000$usesomesillystringforsalt$');
                
                   
                    if($response['username'] === $_POST['username'] && 
                       $response['password'] === $password_encripted) {
                       
                        if(!$response['state']) { echo $disabled_account; return;}
                     
                        $_SESSION['log-in'] = 'OK';
                        $_SESSION['name'] = $response['name'];
                        $_SESSION['id'] = $response['id'];
                        $_SESSION['username'] = $response['username'];
                        $_SESSION['rol'] = $response['rol'];
                        $_SESSION['perfil_img'] = $response['perfil_img'];


                        /**======================================
                        *            Register Last Login
                        * ======================================**/
                        date_default_timezone_set('America/Sao_Paulo');

                        $date = date("Y-m-d H:i:s");
                        

                        $actual_date = $date;
                        $item1 = "last_login";
                        $value1 = $actual_date;

                        $item2 = 'id';
                        $value2 = $response['id'];

                        $response = UsersModel::MdlUpdatedUser($table, $item1, $value1, $item2, $value2);

                        if($response == 'OK') {
                            echo '<script>
                                    window.location = "dashboard";
                              </script>';
                        }

                        
                    } else {
                        echo $error_login;
                    }
               } else {
                        echo $error_login;
                }
                
               
            }
        }
        
    }


    /**======================================
    *             User Register
    * ======================================**/

    static public function userRegisterCtr() {
        include 'utils/constants.php';
        include 'utils/extents_functions.php';

       
        if(isset($_POST['name']) &&
           isset($_POST['username']) && 
           isset($_POST['password']))
           {
            
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $rol = $_POST['rol'];

            //if(!preg_match($RegExLatin, $_POST['name'])) { echo $not_special_symbol;return; }
            //if(!preg_match($RegEx, $_POST['username']))  { echo $not_special_symbol_username; return; }
            //if(!preg_match($RegExPassword, $_POST['password']))  echo $password_error return;
           

           /**
            * Save img
            */
            $img = $_FILES['perfil_img'];
            $img_directory = '';
           if($img['tmp_name']) {

               $new_width = 500;
               $new_height = 500;

               $directory = 'views/assets/img/users/'.$_POST['username'];

               $img_directory = imgSave($img, '', $new_width, $new_height, $directory);
           }


           /**
            * Save User
            */

            $password_encripted = crypt($password, '$6$rounds=5000$usesomesillystringforsalt$');
            $user_data = Array(
                                'name' => $name, 
                                'username' => $username,
                                'password' => $password_encripted,
                                'rol' => $rol,
                                'perfil_img' => $img_directory
                              );
            $table = 'users';

            $response = UsersModel::MdlRegisterUser($table, $user_data);
           
            if($response === 'OK') { echo $user_register_success; return;}
        } 
    }

    /**======================================
    *             User Register
    * ======================================**/
 static public function userUpdateCtr() {
        include 'utils/constants.php';
         
        if(isset($_POST['edit_name'])) {
            

            
                $name = $_POST['edit_name'];
                $username = $_POST['edit_username'];
                $password = $_POST['edit_password'];
                $rol = $_POST['edit_rol'];

                //if(!preg_match($RegExLatin, $_POST['edit_name'])) { echo $not_special_symbol;return; }
                //if(!preg_match($RegEx, $_POST['username']))  { echo $not_special_symbol_username; return; }
                //if(!preg_match($RegExPassword, $_POST['password']))  echo $password_error return;

                /**======================================
                *             img validated
                * ======================================**/
                

                $img_directory = $_POST['actual_perfil_img'];
                $img = $_FILES['edit_perfil_img'];

                if($img['tmp_name'] && !empty($img['tmp_name'])) {

                    $new_width = 500;
                    $new_height = 500;

                    $directory = 'views/assets/img/users/'.$_POST['edit_username'];

                    $img_directory = imgSave($img, $img_directory, $new_width, $new_height, $directory);
                }

                /**======================================
                *             password validated
                * ======================================**/

                if($password != '') {
                    $password_encripted = crypt($password, '$6$rounds=5000$usesomesillystringforsalt$');
                } else {
                    $password_encripted = $password;
                }


                $table = 'users';
                $user_data = Array(
                                    'name' => $name, 
                                    'username' => $username,
                                    'password' => $password_encripted,
                                    'rol' => $rol,
                                    'perfil_img' => $img_directory
                                );

           $response = UsersModel::MdlUpdateUser($table, $user_data);
            
            
            if($response === 'OK') { echo $user_update_success; return;}
        } 

 }


    /**======================================
    *            Users Show
    * ======================================**/

    static public function usersShowCtr($item, $value) {

        $table = 'users';
        return $response = UsersModel::MdlShowUsers($table, $item, $value);
        
        return $response;
    }

    /**======================================
    *            User delete
    * ======================================**/

    static public function userDeleteCtr($item, $value_img) {
        
        $table = 'users';
        //imgDelete($value_img, true);

        
       
         if($value_img != '') {
            unlink(dirname(__DIR__, 1).'/'.$value_img);
            rmdir(dirname(__DIR__, 1). '/'.dirname($value_img, 1) );
        }
       
        $response = UsersModel::MdlDeleteUser($table, $item);

        if($response == 'OK') {
            
            return $response;
        } else {
            return 'false';
        }
        
    }

}