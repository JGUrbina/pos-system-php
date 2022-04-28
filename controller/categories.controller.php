<?php




class CategoriesController {


    /**======================================
    *             User Register
    * ======================================**/

    static public function categoryRegisterCtr() {
        include 'utils/constants.php';
        include 'utils/extents_functions.php';
        if(isset($_POST['category']))
           {
            
            $category = $_POST['category'];
            

            if(!preg_match($RegExLatin, $_POST['category'])) { echo $not_special_symbol;return; }
            
            $category_data = Array(
                                'name' => $category
                              );
            $table = 'categories';

            $response = categoriesModel::MdlRegisterCategory($table, $category_data);
            
            if($response === 'OK') { echo $category_register_success; return;}
        } 
    }

    /**======================================
    *             User Register
    * ======================================**/
 static public function categoryUpdateCtr() {
        include 'utils/constants.php';
         
        if(isset($_POST['edit_category'])) {
        
            $category = $_POST['edit_category'];
            $id = $_POST['id_category'];
               
            if(!preg_match($RegExLatin, $_POST['edit_category'])) { echo $not_special_symbol;return; }
                
            $table = 'categories';
            $user_data = Array(
                                'name' => $category,
                                'id' => $id
                            );

            $response = CategoriesModel::MdlUpdateCategory($table, $user_data);

            
            if($response === 'OK') { echo $category_update_success; return; }
        } 

 }


    /**======================================
    *            Users Show
    * ======================================**/

    static public function categoriesShowCtr($item, $value) {

        $table = 'categories';
        return $response = CategoriesModel::MdlShowCategories($table, $item, $value);
        
        return $response;
    }

    /**======================================
    *            User delete
    * ======================================**/

    static public function categoryDeleteCtr($item) {
        
        $table = 'categories';
        
         
       
        $response = CategoriesModel::MdlDeleteCategory($table, $item);

        //var_dump('Controller res --> ', $response);

        if($response == 'OK') {
            
            return $response;
        } else {
            return 'false';
        }
        
    }

}