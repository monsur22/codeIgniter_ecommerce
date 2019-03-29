

<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center text-success"></h3>
        <hr/>
        <div class="well">
             <form class="form-horizontal" method="post" action="save-product">
            <fieldset>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="p_name">
                     <span class="text-danger"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Category Name</label>
                <div class="col-sm-10">
                    <select class="form-control" name="p_cat">
                        <option>Select Category</option>
                        <?php foreach ($getcat as $category) {?>

                            
                         <option value="<?php  echo $category->category_id?>"><?php echo $category->category_name; ?></option>
                        <?php  } ?>
                       
                       
                       
                      
                    </select>
                </div>
            </div>

              

           
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Product Image</label>
                <div class="col-sm-10">
                    <input type="file"   name="p_img" accept="image/*" onchange="loadFile(event)">

                     <span class="text-danger"></span>
                </div>
            </div>
<img id="output"/>
           
            
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="" class="btn btn-success btn-block">Save Category Info</button>
                </div>
            </div>
            </fieldset>
            </form>
        </div>
    </div>
</div>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
