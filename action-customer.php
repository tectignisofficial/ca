<?php
include("include/config.php");
?>

<?php
//customer edit fetch
  if(isset($_POST['dnk'])){
    $id=$_POST['dnk'];
         $sql=mysqli_query($conn,"select * from customer_registration where cus_no='".$_POST['dnk']."'");
              
           $row=mysqli_fetch_array($sql)
           ?>   
                 <div class="row">                       
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputName">Customer Name</label>
                                <input type="text" name="name" class="form-control" id="inputName" value="<?php echo $row['name']; ?>"
                                    placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Category</label>               
                                <select class="form-control" value="<?php echo $row['category']; ?>" name="category" id="inputcategory">
                                    <option selected disabled>Select category</option>
                                    <option>Individual</option>
                                    <option>Business</option>
                                </select>
                            </div>

                            
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <label for="inputEmail">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail" value="<?php echo $row['email']; ?>"
                                    placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputPass">Mobile Number</label>
                                <input type="text" minlength="10" maxlength="10" class="form-control" name="number" id="number"  value="<?php echo $row['number']; ?>" placeholder="Mobile Number" required>
                            </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group">
                            <label for="inputEmail">Pan Card Number</label>
                                <input type="text" name="pan" class="form-control" id="pan" value="<?php echo $row['pan']; ?>"  placeholder="Enter Pan card Number">
                            </div>                                
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputPass">Pan Card Image</label>
                                <input type="file" name="image" class="form-control" accept="image/jpg,image/png,image/svg,image/webp,image/jpeg" id="inputimg" value="<?php echo $row['p_image']; ?>"
                                    placeholder="image">
                            </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group">
                            <label for="inputEmail">Adhar Card Number</label>
                                <input type="text" name="aadhar" class="form-control" id="pan" value="<?php echo $row['aadhar']; ?>"
                                    placeholder="Enter Adhar card Number">
                            </div>                                
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputPass">Adhar Card Image</label>
                                <input type="file" name="image1" accept="image/jpg,image/png,image/svg,image/webp,image/jpeg" class="form-control" id="inputimg" value="<?php echo $row['image1']; ?>"
                                    placeholder="image">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputPass">Profile Image</label>
                                <input type="file" name="p_image" accept="image/jpg,image/png,image/svg,image/webp,image/jpeg" class="form-control" id="inputimg" value="<?php echo $row['image']; ?>"
                                    placeholder="image">
                            </div>
                        </div>

                    </div>
     
     <?php  } ?>

     <?php
//customer delete
    if(isset($_GET['del_id'])){
        $delid = $_GET['del_id'];
        $sql = mysqli_query($conn,"DELETE FROM customer_registration WHERE cus_no = '$delid'");
        if($sql){
          header ("location:customer.php"); 
         
        }
        else{ echo "<script>alert('Failed to Delete')</script>"; }
      }
?>