<?php
include("config.php");

if(isset($_GET['client'])){
    $id=$_GET['client'];
    $sql=mysqli_query($conn,"update client set Status='Deactivated' where Client_Code='$id'");
}
if(isset($_GET['declient'])){
    $id=$_GET['declient'];
    $sql=mysqli_query($conn,"update client set Status='Activated' where Client_Code='$id'");
};
if(isset ($_POST['update'])){
    $name=$_POST['updateName'];
    $email=$_POST['updateEmail'];
    $category=$_POST['category'];
    $image=$_POST['image'];
    $id=$_POST['id'];

    $sql=mysqli_query($conn,"UPDATE `client` SET `Authorized_Name`='$name',`Email`='$email',`Category`='$category',`image`='$image' where Client_Code='$id'"); 
}

if(isset($_POST["submi"])){
    $id=$_POST['id'];
	$password=$_POST["resetPass"];
    $Confirm_password=$_POST["confirmResetPass"];
	$sql = mysqli_query($conn,"SELECT * FROM client WHERE Client_Code='$id'");
		$row=mysqli_fetch_assoc($sql); 
	$hashpassword=password_hash($password,PASSWORD_BCRYPT);
			$query=mysqli_query($conn,"UPDATE `client` SET `password`='$hashpassword' WHERE Client_Code='$id'");
      if($query){
        echo "<script>alert('Password Changed Successfully')</script>";
      }
		
	
	}

?>

 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin CRM | Dashboard</title>

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
        <?php include"include/header.php";?>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include"include/sidebar.php";?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Manage Clients</h1>
                            <ol class="breadcrumb float-sm-left">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Clients</li>
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
                    <?php
                    $sql=mysqli_query($conn,"SELECT * FROM client inner join category on client.Category=category.id;");
                    $count=1;
                  while ($row=mysqli_fetch_array($sql)){ 
          ?>
                        <div class="col-md-4 col-sm-6">
                              <div class="card card-widget widget-user">
        <div class="widget-user-header bg-info" <?php if($row['Status']=='Deactivated'){ ?>style="background:#B2BEB5;height:168px"<?php } ?> style="height:168px;">
            <div class="widget-header border-0 pb-0">
                <div class="d-flex align-items-center float-left">
                    <div class="d-grid">
                        <div class="badge bg-primary p-2 px-3 rounded">
                            <?php echo $row['category']; ?>
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
                            
                        
                            <a href="view_clients/<?php echo $row['Client_Code'] ?>" class="dropdown-item"
                           ><i class="fa fa-eye"></i> View</a>
    
                            <button class="dropdown-item usereditid" type="button"  data-id="<?php echo $row['Client_Code'] ?>"><i class="far fa-edit"></i> Edit</button>
    
                            <button class="dropdown-item delbtn" type="button" onclick="deleteBtn()" data-id="=<?php echo $row['Client_Code']; ?>"><i class="fa fa-trash-alt"></i> Delete</button>
    
    
                            <button class="dropdown-item rpassword" type="button" data-toggle="modal"
                            data-id="<?php echo $row['Client_Code']; ?>" ><i class="fa fa-key"></i> Reset
                                Password</button>
                                <?php
                                if($row['Status']=='Activated'){ ?>
                                    <a href="clients?client=<?php echo $row['Client_Code'] ?>" class="dropdown-item" type="button" data-id=""><i class="fas fa-toggle-off"></i> Deactivated</a>
                               <?php } else{
                                ?>
                                <a href="clients?declient=<?php echo $row['Client_Code'] ?>" class="dropdown-item" type="button" data-id=""><i class="fas fa-toggle-on"></i> Activated</a>  
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <div style="display:inline-block;width: 100%;">
       <a href="view_clients/<?php echo $row['Client_Code'] ?>" style="color:white"> <h3 class="widget-user-username"><?php echo $row['Firm_Name']; ?></h3></a>
       <a href="view_clients/<?php echo $row['Client_Code'] ?>" style="color:white"> <h5 class="widget-user-desc"><?php echo $row['Authorized_Name']; ?></h5></a>
        </div>
        
        </div>
        <div class="widget-user-image" style="top:112px">
            <a href="view_clients/<?php echo $row['Client_Code'] ?>" target="_blank">
                <?php
                if($row['image']==""){
echo '<img src="dist/img/avatar1.jpeg" alt="User Image" class="img-circle elevation-2" style="width:100px;height:100px;">';
                }else{

                    ?>
               
                    <img alt="user-image" class="img-circle elevation-2"
                        src="dist/img/<?php echo $row['image'] ?>" style="height:100px;width:100px;">
<?php } ?>
                </a>
        </div>
        <div class="card-footer">
        <div class="row">
        <div class="col-sm-4 border-right">
        <div class="description-block">
        <h5 class="description-header">3,200</h5>
        <span class="description-text">Total Packages</span>
        </div>
        
        </div>
        
        <div class="col-sm-4 border-right">
        <div class="description-block">
        <h5 class="description-header">13,000</h5>
        <span class="description-text">Total Leads</span>
        </div>
        
        </div>
        
        <div class="col-sm-4">
        <div class="description-block">
        <h5 class="description-header">35</h5>
        <span class="description-text">PRODUCTS</span>
        </div>
        
        </div>
        
        </div>
        
        </div>
        </div>
                </div>
                        <?php } ?>
                        <div class="col-md-4 col-sm-6 text-center">
                            <a href="#" class="btn-addnew-project" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="" data-ajax-popup="true" data-size="lg" data-title="Create User" data-url=""
                                data-toggle="modal" data-target="#exampleModal" data-bs-original-title="Create User">
                                <button class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <h6 class="mt-4 mb-2">New Clients</h6>
                                <p class="text-muted text-center">Click here to add New Clients</p>
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
        <?php include"include/footer.php";?>


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
                <form method="post">
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
                    <h5 class="modal-title" id="exampleModalLabel">Create Clients</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="action_clients.php" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-6">
                                <div class="form-group">
                                    <label for="inputName">Firm Name</label>
                                    <input type="text" name="fname" class="form-control" id="inputfname"
                                        placeholder="Enter Firm Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" name="name" class="form-control" id="inputName"
                                        placeholder="Enter Name">
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
                                    <label>Category</label>
                                    <?php 
                   $query=mysqli_query($conn,"select * from category");
                   ?>
                                    <select class="form-control"  name="category" id="inputcategory">
                                        <option selected disabled>Select category</option>
                                        <?php
                    while($sql=mysqli_fetch_array($query))
                    {
                      ?>

                         <option value="<?php echo $sql['id']; ?>"> <?php echo $sql['category']; ?></option>
                         <?php } ?>
                                    </select>
                                </div>

                                
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="inputPass">Image</label>
                                    <input type="file" name="image" class="form-control" id="inputimg"
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