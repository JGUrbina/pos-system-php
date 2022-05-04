<?php 
require_once '../controller/clients.controller.php';
require_once '../model/clients.model.php';

class ClientsAjax {
    public $client_id;

    function editClientAjax() {
        $item = 'id';
        $value = $this->client_id;
        
        $clients = ClientsController::clientsShowCtr($item, $value);
        
        echo json_encode($clients);
    }

    function allClientAjax() {
        $item = null;
        $value = null;
        
        $clients = ClientsController::clientsShowCtr($item, $value);
        
        echo json_encode($clients);
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

    function deleteClientAjax() {
         
        $id = $this->delete_id;
       
        $response = ClientsController::clientDeleteCtr($id);
        
        return $response;
        
    }

}

if(isset($_POST['client_id'])) {
     $edit = new ClientsAjax();
     $edit -> client_id = $_POST['client_id'];
     $edit -> editClientAjax();
 }

if(isset($_POST['delete_id'])) {
     
     $validate = new ClientsAjax();
     $validate -> delete_id = $_POST['delete_id'];
     $response = $validate -> deleteClientAjax();

     echo $response;
     
 }