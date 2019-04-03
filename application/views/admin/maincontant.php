<div>
<?php 
if(isset($successmassage)){
    echo $successmassage;
}
?>
</div>

<?php 

$this->load->helper(array('form', 'url'));


$this->load->library('form_validation');
echo validation_errors(); ?>
<form method="post" action="admin-form-action">
<fieldset>
<div class="form-group">
  <label for="">Admin Name</label>
  <input type="text"
    class="form-control" name="user_name" id=""" aria-describedby="helpId" placeholder="" required>
  
</div> 
<div class="form-group">

  <label for="">Email</label>
  <input type="text"
    class="form-control" type="email" name="user_email" id="" aria-describedby="helpId" placeholder="" required>
  
</div> 
<div class="form-group">
  <label for="">Password</label>
  <input type="text"
    class="form-control" name="user_password" id="" aria-describedby="helpId" placeholder="" required>
 
</div> 
<div class="form-group">
  <button type="submit" name="" id="" class="btn btn-primary" href="#" role="button">Submit</button>
</div>    
</fieldset>
</form>