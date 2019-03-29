
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center text-success"></h3>
        <hr/>
        <div class="well">
            <form class="form-horizontal" method="post" action="<?php echo base_url()?>update-categori">
            <fieldset>
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="category_name" value="<?php echo $category_edit_data->category_name?>">
                    <input type="hidden" class="form-control" name="category_id" value="<?php echo $category_edit_data->category_id?>">
                     <span class="text-danger"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Category Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="category_desc" rows="8" ><?php echo $category_edit_data->category_desc?></textarea>
                        
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit"  class="btn btn-success btn-block">Update Category Info</button>
                </div>
            </div>
            </fieldset>
            </form>
        </div>
    </div>
</div>
