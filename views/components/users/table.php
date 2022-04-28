<table class="table table-bordered table-striped dt-responsive tablas">
    <thead>
        <tr class="text-center">
            <th style="width: 10px;">#</th>
            <th>name</th>
            <th>username</th>
            <th>perfil img</th>
            <th>rol</th>
            <th>state</th>
            <th>last login</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            
            $item = null;
            $value = null;
            $users = UsersController::usersShowCtr($item, $value);
            

            foreach ($users as $user) {
                echo '
                        <tr>
                            <td>'.$user['id'].'</td>
                            <td>'.$user['name'].'</td>
                            <td>'.$user['username'].'</td>';
                            
                                if($user['perfil_img'] != '') {
                                   

                                    echo '<td>
                                        <img src="'.$user['perfil_img'].'" class="img-thumbnail" width="40px" />
                                        </td>';
                                    
                                    
                                } else {
                                    echo '<td>
                                    <img src="views/assets/img/users/default/anonymous.png" class="img-thumbnail" width="40px" />
                                  </td>';
                                }
                            
                            

                            echo '<td>'.$user['rol'].'</td>';
                            if($user['state']) {
                                echo '<td>
                                        <button class="btn btn-success btn-xs btn-active" user-id='.$user['id'].' user-state="0">active</button>
                                    </td>';
                            } else {
                                echo '<td>
                                        <button class="btn btn-danger btn-xs btn-active" user-id='.$user['id'].' user-state="1">disabled</button>
                                      </td>';
                            }
                            echo '<td>'.$user['last_login'].'</td>
                            <td>
                                <div class="btn btn-group">
                                    <button class="btn btn-warning btn-xs btn-edit-user" data-toggle="modal" data-target="#modalEditUser" id-user="'.$user['id'].'"><i
                                            class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs delete-user" id-user="'.$user['id'].'" img-user="'.$user['perfil_img'].'"><i class="fa fa-times" ></i></button>
                                    </di>
                            </td>
                            </tr>
                            ';
        }
        ?>
    </tbody>
</table>