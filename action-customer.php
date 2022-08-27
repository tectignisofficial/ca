<?php
//customer edit fetch
  if(isset($_POST['dnk'])){
    $id=$_POST['dnk'];
         $sql=mysqli_query($conn,"select category.*,client.* from category inner join client on category.id=client.category where Client_Code='".$id."'");
              
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
                                <select class="form-control"  name="category" id="inputcategory">
                                    <option selected disabled>Select category</option>
                                    <option>Individual</option>
                                    <option>Business</option>
                                </select>
                            </div>

                            
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <label for="inputEmail">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail"
                                    placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputPass">Mobile Number</label>
                                <input type="text" minlength="10" maxlength="10" class="form-control" name="number" id="number" placeholder="Mobile Number" required>
                            </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group">
                            <label for="inputEmail">Pan Card Number</label>
                                <input type="text" name="pan" class="form-control" id="pan"
                                    placeholder="Enter Pan card Number">
                            </div>                                
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputPass">Pan Card Image</label>
                                <input type="file" name="image" class="form-control" accept="image/jpg,image/png,image/svg,image/webp,image/jpeg" id="inputimg"
                                    placeholder="image">
                            </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group">
                            <label for="inputEmail">Adhar Card Number</label>
                                <input type="text" name="aadhar" class="form-control" id="pan"
                                    placeholder="Enter Adhar card Number">
                            </div>                                
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputPass">Adhar Card Image</label>
                                <input type="file" name="image1" accept="image/jpg,image/png,image/svg,image/webp,image/jpeg" class="form-control" id="inputimg"
                                    placeholder="image">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputPass">Profile Image</label>
                                <input type="file" name="p_image" accept="image/jpg,image/png,image/svg,image/webp,image/jpeg" class="form-control" id="inputimg"
                                    placeholder="image">
                            </div>
                        </div>

                    </div>
     
     <?php  } ?>