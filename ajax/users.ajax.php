<?php 
require_once '../controller/users.controller.php';
require_once '../model/users.model.php';

class UsersAjax {
    public $user_id;

    function editUserAjax() {
        $item = 'id';
        $value = $this->user_id;
        
        $users = UsersController::usersShowCtr($item, $value);
        
        echo json_encode($users);
    }

    public $update_id;
    public $user_state;

    function editStateUserAjax() {
        $table = 'users';
        $item1 = 'state';
        $value1 = $this->user_state;

        $item2 = 'id';
        $value2 = $this->update_id;
        
        $response = UsersModel::MdlUpdatedUser($table, $item1, $value1, $item2, $value2);
         echo 'cosos  '. $this->update_id. ' '. $this->user_state;
    }

    
    /**======================================
    *             Validate Username
    * ======================================**/
    public $username;
    function validateUsernameAjax() {
         $item = 'username';
        $value = $this->username;
        
        $response = UsersController::usersShowCtr($item, $value);
       
        echo json_encode($response);
    }

    /**======================================
    *             Delete User
    * ======================================**/
    public $delete_id;
    public $delete_img;
    function deleteUsernameAjax() {
         
        $id = $this->delete_id;
        $img = $this->delete_img;
        $response = UsersController::userDeleteCtr($id, $img);
        
        return $response;
        
    }

}

/**======================================
 *             Data Tables
 * ======================================**/


 if(isset($_POST['user_id'])) {
     $edit = new UsersAjax();
     $edit -> user_id = $_POST['user_id'];
     $edit -> editUserAjax();
 }

 if(isset($_POST['update_id'])) {
     
     $edit = new UsersAjax(); 
     $edit -> update_id = $_POST['update_id'];
     $edit -> user_state = $_POST['user_state'];
     
     $edit -> editStateUserAjax();
 }

 if(isset($_POST['valid_username'])) {
     $validate = new UsersAjax();
     $validate -> username = $_POST['valid_username'];
     $validate -> validateUsernameAjax();
 }

 if(isset($_POST['delete_id'])) {
     
     $validate = new UsersAjax();
     $validate -> delete_id = $_POST['delete_id'];
     $validate -> delete_img = $_POST['img_user'];
     $response = $validate -> deleteUsernameAjax();

     echo $response;
     
 }