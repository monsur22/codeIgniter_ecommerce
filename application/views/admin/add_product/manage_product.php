
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">


<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Category Name</th>
            
            <th> Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($showpro as $product){ ?>
            <tr> 
            <th scope="row"><?php echo $product->p_id ?></th>
            <td><?php echo $product->p_name?></td>
            <td><?php echo $product->p_cat?></td> 
            <td><img src="<?php echo base_url().$product->p_img ?>" height="50" width="50"></td> 
            <td>
       

                <a href="" class="btn btn-success" title="Edit">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); "title="Delete">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td> 
        </tr>
        <?php }?>
        

    </tbody>
</table>

