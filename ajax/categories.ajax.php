<?php 
require_once '../controller/categories.controller.php';
require_once '../model/categories.model.php';

class CategoriesAjax {
    public $category_id;

    function editCategoryAjax() {
        $item = 'id';
        $value = $this->category_id;
        
        $categories = CategoriesController::categoriesShowCtr($item, $value);
        
        echo json_encode($categories);
    }

    function allCategoryAjax() {
        $item = null;
        $value = null;
        
        $categories = CategoriesController::categoriesShowCtr($item, $value);
        
        echo json_encode($categories);
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

    function deleteCategoryAjax() {
         
        $id = $this->delete_id;
       
        $response = CategoriesController::categoryDeleteCtr($id);
        
        return $response;
        
    }

}

/**======================================
 *             Data Tables
 * ======================================**/


 if(isset($_POST['category_id'])) {
     $edit = new CategoriesAjax();
     $edit -> category_id = $_POST['category_id'];
     $edit -> editCategoryAjax();
 }

 if(isset($_POST['update_id'])) {
     
     $edit = new CategoriesAjax(); 
     $edit -> update_id = $_POST['update_id'];
     $edit -> user_state = $_POST['user_state'];
     
     $edit -> editStateUserAjax();
 }

 if(isset($_POST['valid_username'])) {
     $validate = new CategoriesAjax();
     $validate -> username = $_POST['valid_username'];
     $validate -> validateUsernameAjax();
 }

 if(isset($_POST['delete_id'])) {
     
     $validate = new CategoriesAjax();
     $validate -> delete_id = $_POST['delete_id'];
     $response = $validate -> deleteCategoryAjax();

     echo $response;
     
 }

 if(isset($_POST['all'])) {
     
     $all = new CategoriesAjax();
     
     $response = $all -> allCategoryAjax();

     echo $response;
     
 }