<?php
include("include/config.php");
// if(isset($_GET['delsr_no'])){
//     $sr_no=mysqli_real_escape_string($conn,$_GET['delsr_no']);
//     $sql=mysqli_query($conn,"delete from product_gallery where id='$sr_no'");
//     if($sql=1){
//       header("location:customer.php");
//     }
//   }
if(isset($_POST['submit']))
{
  
  $name = $_POST['name'];
  $category = $_POST['category'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $pan = $_POST['pan'];
  $aadhar = $_POST['aadhar'];
    $image=$_FILES['image']['name'];
    $image1=$_FILES['image1']['name'];
    $p_image=$_FILES['p_image']['name'];
   
          $image=md5($image);
    $dnk=$_FILES['image']['tmp_name'];
    $loc="dist/img/credit/".$image;
    move_uploaded_file($dnk,$loc);
        
    
          $image1=md5($image1);
    $dnk1=$_FILES['image1']['tmp_name'];
    $loc2="dist/img/credit/".$image1;
    move_uploaded_file($dnk1,$loc2);
        
 
          $p_image=md5($p_image);
    $dnk2=$_FILES['p_image']['tmp_name'];
    $loc2="dist/img/credit/".$p_image;
    move_uploaded_file($dnk2,$loc2);
        
            
    $sql="INSERT INTO `customer_registration`(`name`, `category`, `email`, `number`, `pan`, `image`, `aadhar`, `image1`, `p_image`) VALUES ('$name','$category','$email','$number','$pan','$image','$aadhar','$image1','$p_image')";
    if (mysqli_query($conn, $sql)){
      echo "<script> alert ('New record has been added successfully !');</script>";
   }
    else {
      echo "<script> alert ('connection failed !');</script>";
   }
}


?>

 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin CA | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


    <style>
        .card-header-right {
            right: 10px;
            top: 10px;
            float: right;
            padding: 0;
            position: absolute;
        }

        .btn-addnew-project {
            border: 1px solid #e2e1e1;
            border-radius: 15px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            height: calc(100% - 15px);
            justify-content: center;
        }

        .card {
            border-radius: 15px !important;
        }

        .badge,
        .btn {
            border-radius: 10px !important;
        }
      
        .select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 4px;
    padding-bottom: 27px !important;
}
.select2-container--default.select2-container--focus .select2-selection--multiple, .select2-container--default.select2-container--focus .select2-selection--single {
    border-color: #d3d9df;
}
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php  
        include("include/header.php");
        ?>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php 
        include("include/sidebar.php");
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Manage Customer</h1>
                            <ol class="breadcrumb float-sm-left">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Customer</li>
                            </ol>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >    <i class="fa fa-plus"></i></button></li>
                               
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                              <div class="card card-widget widget-user">
        <div class="widget-user-header bg-info"style="background:#B2BEB5;height:168px" style="height:168px;">
            <div class="widget-header border-0 pb-0">
                <div class="d-flex align-items-center float-left">
                    <div class="d-grid">
                        <div class="badge bg-primary p-2 px-3 rounded">
                        </div>
                    </div>
                </div>
                <div class="widget-header-right float-right">
                    <div class="dropdown">
                        <button class="btn" type="button" id="dropdownMenu2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
    
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            
                        
                            <a href="view_clients" class="dropdown-item"
                           ><i class="fa fa-eye"></i> View</a>
    
                            <button class="dropdown-item usereditid" type="button"  data-id=""><i class="far fa-edit"></i> Edit</button>
    
                            <button class="dropdown-item delbtn" type="button" onclick="deleteBtn()" data-id=""><i class="fa fa-trash-alt"></i> Delete</button>
    
    
                            <button class="dropdown-item rpassword" type="button" data-toggle="modal"
                            data-id="" ><i class="fa fa-key"></i> Reset
                                Password</button>
                                    <a href="clients?client=" class="dropdown-item" type="button" data-id=""><i class="fas fa-toggle-off"></i> Deactivated</a>
                             
                                <a href="clients?declient=" class="dropdown-item" type="button" data-id=""><i class="fas fa-toggle-on"></i> Activated</a>  
                        </div>
                    </div>
                </div>
            </div>
        <div style="display:inline-block;width: 100%;">
       <a href="view_clients" style="color:white"> <h3 class="widget-user-username"></h3></a>
       <a href="view_clients" style="color:white"> <h5 class="widget-user-desc"></h5></a>
        </div>
        
        </div>
        <div class="widget-user-image" style="top:112px">
            <a href="view_clients" target="_blank">
               
                    <img alt="user-image" class="img-circle elevation-2"
                        src="dist\img\avatar5.png" style="height:100px;width:100px;">
                </a>
        </div>
        <div class="card-footer">
        <div class="row">
        <div class="col-sm-4 border-right">
        <div class="description-block">
        <h5 class="description-header">3,200</h5>
        <span class="description-text">Total ITR</span>
        </div>
        
        </div>
        
        <div class="col-sm-4 border-right">
        <div class="description-block">
        <h5 class="description-header">13,000</h5>
        <span class="description-text">Business ITR</span>
        </div>
        
        </div>
        
        <div class="col-sm-4">
        <div class="description-block">
        <h5 class="description-header">35</h5>
        <span class="description-text">GST</span>
        </div>
        
        </div>
        
        </div>
        
        </div>
        </div>
                </div>
                        <div class="col-md-4 col-sm-6 text-center">
                            <a href="#" class="btn-addnew-project" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="" data-ajax-popup="true" data-size="lg" data-title="Create User" data-url=""
                                data-toggle="modal" data-target="#exampleModal" data-bs-original-title="Create User">
                                <button class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <h6 class="mt-4 mb-2">New Customer</h6>
                                <p class="text-muted text-center">Click here to add New Customer</p>
                            </a>
                        </div>
                    </div>
                    <!-- Main row -->

                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php
        include("include/footer.php");
        ?>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="resetUserPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" >
                <div class="modal-body body2">
                   
                 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submi" id="submi" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="dnkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Client Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" enctype="multipart/form-data">`
                <div class="modal-body body1" >
                    
                  
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                          
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputName">Customer Name</label>
                                    <input type="text" name="name" class="form-control" id="inputName"
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
                        <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Create</button>
                </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
   <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- AdminLTE for demo purposes -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>



    <script>
        function deleteBtn() {

            swal({
                title: "Are You Sure...?",
                text: "This action can not be undone. Do you want to continue?",
                icon: "warning",
                buttons: ["No", "Yes"],
            });

            mobile_err = true;

            mobile_check();

            if (mobile_err = true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
    
    <script>
          $(document).ready(function(){
          $('.usereditid').click(function(){
            let dnk = $(this).data('id');

            $.ajax({
            url: 'action_clients.php',
            type: 'post',
            data: {dnk: dnk},
            success: function(response1){ 
              $('.body1').html(response1);
              $('#dnkModal').modal('show'); 
            }
          });
          });

          $('.rpassword').click(function(){
            let resetpass = $(this).data('id');

            $.ajax({
            url: 'action_clients.php',
            type: 'post',
            data: {resetpass: resetpass},
            success: function(response1){ 
              $('.body2').html(response1);
              $('#resetUserPass').modal('show'); 
            }
          });
          });

          });
          </script>

<script>
            $(document).ready(function(){
                $('.delbtn').click(function(e){
                    e.preventDefault();
                    let del_id = $(this).data('id');
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                            });
                            window.location.href = "action_clients.php?del_id"+del_id;
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });
                    })
                });
                </script>
                <script type="text/javascript">
    $(function () {
        $("#submi").click(function () {
            var password = $("#resetPass").val();
            var confirmPassword = $("#confirmResetPass").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>

</body>

</html>