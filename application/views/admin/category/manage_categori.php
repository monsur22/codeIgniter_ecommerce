
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">


<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            
            <th> Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($showcat as $category){ ?>
            <tr> 
            <th scope="row"><?php echo $category->category_id ?></th>
            <td><?php echo $category->category_name?></td>
            <td><?php echo $category->category_status?></td> 
            <td>
           <?php if($category->category_status==1){ ?>
                <a href="<?php echo base_url("change-category-status/$category->category_id/2")?>" class="btn btn-success" title="Unpublish">
                    <span class="fa fa-thumbs-up"></span>
                </a>
                <?php } elseif($category->category_status==2){?>
                    <a href="<?php echo base_url("change-category-status/$category->category_id/1")?>" class="btn btn-danger"title="Publish">
                    <span class="fa fa-thumbs-down"></span>
                </a>
                <?php }?>

                <a href="<?php echo base_url("edit-category/$category->category_id")?>" class="btn btn-success" title="Edit">
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

