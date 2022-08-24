<!-- <?php
include('config.php');
if(isset($_GET['delsr_no'])){
    $sr_no=mysqli_real_escape_string($conn,$_GET['delsr_no']);
    $sql=mysqli_query($conn,"delete from product_gallery where id='$sr_no'");
    if($sql=1){
      header("location:form1.php");
    }
  }
if(isset($_POST['submit']))
{
  
  $name = $_POST['name'];
    $subject =mysqli_real_escape_string($conn,$_POST['subject']);
    $image=$_FILES['image']['name'];

    $extension=substr( $image,strlen( $image)-4,strlen( $image));
    $all_extension = array(".jpg","jpeg",".png","gif");
    if(!in_array($extension,$all_extension)){
      $msg="Invalid format. Only jpg / jpeg/ png /gif format allowed";
    } 
        else{
          $image=md5($image).$extension;
    $dnk=$_FILES['image']['tmp_name'];
    $loc="dist/img/credit/".$image;
    move_uploaded_file($dnk,$loc);
        
            }
    $sql="INSERT INTO `product_gallery`(`name`, `image`, `subject`) VALUES ('$name','$image','$subject')";
    if (mysqli_query($conn, $sql)){
      echo "<script> alert ('New record has been added successfully !');</script>";
   }
    else {
      echo "<script> alert ('connection failed !');</script>";
   }
}

?> -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.no</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>subject</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php     
                    $sql=mysqli_query($conn,"select * from product_gallery");
                    $count=1;
                    while($arr=mysqli_fetch_array($sql)){
                    ?>
                  <tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo $arr['name'];?></td>
                    <td><img src="dist/img/credit/<?php echo $arr['image'];?>" style="height:150px; width:150px;">
                    </td>
                    <td><?php echo $arr['subject'];?></td>
                    <td> 
                      <a href="#"><button type="button"
                        class="btn btn-primary btn-md" style="color: aliceblue"> <i
                        class="fas fa-pen"></i></button></a>

                  <a href="form1.php?delsr_no=<?php echo $arr['id']; ?>"><button type="button"
                      class="btn btn-danger btn-md" style="color: aliceblue"> <i
                        class="fas fa-trash"></i></button></a></td>
                   
                  </tr>
                 
                  <?php $count++; }  ?>
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>