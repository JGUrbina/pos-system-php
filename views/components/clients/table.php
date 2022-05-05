<table class="table table-bordered table-striped dt-responsive">
    <thead>
        <tr class="text-center">
            <th style="width: 10px;">#</th>
            <th>name</th>
            <th>document id</th>
            <th>email</th>
            <th>telephone</th>
            <th>direction</th>
            <th>birthday</th>
            <th>total purchases</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $item = null;
            $value = null;
            $clients = ClientsController::clientsShowCtr($item, $value);
            
            var_dump($clients[count($clients) - 1]['email']);
            foreach ($clients as $client) {
                echo '
                        <tr>
                            <td>'.$client['id'].'</td>
                            <td>'.$client['name'].'</td>
                            <td>'.$client['document'].'</td>
                            <td>'.$client['email'].'</td>
                            <td>'.$client['telephone'].'</td>
                            <td>'.$client['direction'].'</td>
                            <td>'.$client['birthday'].'</td>
                            <td>'.$client['sales'].'</td>
                            
                            <td>
                                <div class="btn btn-group">
                                    <button class="btn btn-warning btn-xs btn-edit-client" data-toggle="modal" data-target="#modalEditClient" id-client="'.$client['id'].'"><i
                                            class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs btn-delete-client" id-client="'.$client['id'].'"><i class="fa fa-times"></i></button>
                                </di>
                            </td>
                        </tr>
                    ';
        }
         ?>
    </tbody>
</table>