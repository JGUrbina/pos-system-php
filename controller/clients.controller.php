<?php




class ClientsController {


    /**======================================
    *             Client Register
    * ======================================**/

    static public function clientRegisterCtr() {
        include 'utils/constants.php';
        include 'utils/extents_functions.php';
        
        if(isset($_POST['name']))
           {
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];
            $document = $_POST['document'];
            $direction = $_POST['direction'];
            $birthday = $_POST['birthday'];

            

            if(!preg_match($RegExLatin, $_POST['name'])) { echo $not_special_symbol;return; }
            
            $client_data = Array(
                                'name' => $name,
                                'email' => $email,
                                'telephone' => $telephone,
                                'document' => $document,
                                'direction' => $direction,
                                'birthday' => $birthday
                                
                              );
            $table = 'clients';
            
            $response = clientsModel::MdlRegisterClient($table, $client_data);
            
            if($response === 'OK') { echo $client_register_success; return;}
        } 
    }

    /**======================================
    *             Client Update
    * ======================================**/
 static public function clientUpdateCtr() {
        include 'utils/constants.php';
         
        if(isset($_POST['edit-name'])) {
        
            var_dump('------------> ', $_POST['edit-name']);
            $id = $_POST['id-client'];
            $name = $_POST['edit-name'];
            $email = $_POST['edit-email'];
            $telephone = $_POST['edit-telephone'];
            $document = $_POST['edit-document'];
            $direction = $_POST['edit-direction'];
            $birthday = $_POST['edit-birthday'];
               
            //if(!preg_match($RegExLatin, $_POST['edit_client'])) { echo $not_special_symbol;return; }
                
            $table = 'clients';
            $client_data = Array(
                                'id' => $id,
                                'name' => $name,
                                'email' => $email,
                                'telephone' => $telephone,
                                'document' => $document,
                                'direction' => $direction,
                                'birthday' => $birthday,
                            );
            var_dump('---> name ', $client_data, $birthday);

            $response = ClientsModel::MdlUpdateClient($table, $client_data);

            
           if($response === 'OK') { echo $client_update_success; return; }
        } 

 }


    /**======================================
    *            Clients Show
    * ======================================**/

    static public function clientsShowCtr($item, $value) {

        $table = 'clients';
        return $response = ClientsModel::MdlShowClients($table, $item, $value);
        
        return $response;
    }

    /**======================================
    *            Client delete
    * ======================================**/

    static public function clientDeleteCtr($item) {
        
        $table = 'clients';
        
         
       
        $response = ClientsModel::MdlDeleteClient($table, $item);

        //var_dump('Controller res --> ', $response);

        if($response == 'OK') {
            
            return $response;
        } else {
            return 'false';
        }
        
    }

}