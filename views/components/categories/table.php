<table class="table table-bordered table-striped dt-responsive tablas">
    <thead>
        <tr class="text-center">
            <th style="width: 10px;">#</th>
            <th>category</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $item = null;
            $value = null;
            $categories = CategoriesController::categoriesShowCtr($item, $value);
            

            foreach ($categories as $category) {
                echo '
                        <tr>
                            <td>'.$category['id'].'</td>
                            <td>'.$category['name'].'</td>
                            
                            <td>
                                <div class="btn btn-group" style="float: right;">
                                    <button class="btn btn-warning btn-xs btn-edit-category" data-toggle="modal" data-target="#modalEditCategory" id-category="'.$category['id'].'"><i
                                            class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs delete-category" id-category="'.$category['id'].'"><i class="fa fa-times" ></i></button>
                                </di>
                            </td>
                        </tr>
                    ';
        }
         ?>
    </tbody>
</table>