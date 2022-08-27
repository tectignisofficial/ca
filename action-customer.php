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
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <input type="text" name="updatefname" value="<?php echo $row['Firm_Name']; ?>" class="form-control" id="inputfname"
                                        placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <input type="text" name="updateName" value="<?php echo $row['Authorized_Name']; ?>" class="form-control" id="inputName"
                                        placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" name="updateEmail"  value="<?php echo $row['Email']; ?>" class="form-control" id="inputEmail"
                                        placeholder="Enter Email" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputPass">Mobile Number</label>
                                    <input type="text" minlength="10" maxlength="10" class="form-control" value="<?php echo $row['Mobile_Number']; ?>" name="number" id="number" placeholder="Mobile Number" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                <label>Category</label>
                                    <select class="form-control" value="<?php echo $row['category']; ?>" name="category" id="inputcategory">
                                        <option selected value="<?php echo $row['id']; ?>"><?php echo $row['category']; ?></option>
    
                                        <?php 
                   $query=mysqli_query($conn,"select * from category");
                    while($sql=mysqli_fetch_array($query))
                    {
                      ?>

                         <option value="<?php echo $sql['id']; ?>"> <?php echo $sql['category']; ?></option>
                         <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6" style="display: flex;">
                            <a href="clinet_details.php" target="_blank">
               <?php
                  if($row['image']==""){
                 echo '<img src="../admin/dist/img/avatar1.jpeg" alt="User Image" class="img-fluid rounded-circle  card-avatar" style="width:100px;height:100px;">';
                 }else{

                ?>
                <img alt="user-image" class="img-fluid rounded-circle card-avatar" src="../admin/dist/img/<?php echo $row['image'] ?>" style="height:100px;width:100px;">
                <?php } ?>
                </a>
                             <div class="form-group">
                                    <label for="inputPass">Image</label>
                                    <input type="file" name="image" class="form-control" id="inputimg"
                                        placeholder="image">
                                </div>
                            </div>
                        
                        </div>
                        <?php  } ?>