<?php
include("include/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin CA | Reports</title>

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
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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

    .card,
    .card-body {
      border-radius: 10px !important;
    }

    .badge {
      border-radius: 10px !important;
    }

    .comp-card i {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      text-align: center;
      padding: 17px 0;
      font-size: 18px;
    }

    .comp-card {
      height: 137px;
    }

    .customer1,
    .company {
      display: none;
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
              <h1 class="m-0">Reports</h1>
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php">ITR</a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <section class="content">
        <div class="row">
          <div class="container-fluid">
            <div class="packageresult">
              <form style="font-size:20px" method="post">
                <div class="card pt-3">
                  <div class="row text-center justify-content-center radiobttn" style="padding-right:30px">
                    <input type="radio" style="margin-right:8px" id="customer" name="fav_language" value="Customer">
                    <label for="customer">Customer</label>
                    <input type="radio" style="margin-right:8px; margin-left:5%" id="company" name="fav_language"
                      value="company">
                    <label for="company">Company</label>
                  </div>
                  <div class="row px-4">
                    <div class="col-8 my-3">
                      <div class="row">

                        <label class="col-4">Select Customer / Company </label>
                        <?php 
                        $query=mysqli_query($conn,"select * from customer_registration");
                        ?>
                        <div class="col-6">
                          <select class="form-control" onChange="package(this.value)" name="category"
                            id="inputcategory">
                            <option selected disabled>Select Customer Name</option>
                            <?php
                            while($sql=mysqli_fetch_array($query))
                            {
                              ?>
                            <option value="<?php echo $sql['cus_no']; ?>" class="customer1"> <?php echo $sql['name']; ?>
                            </option>
                            <?php } ?>
                            <option value="allcustomer" class="customer1">All</option>

                            <?php
                                $query1=mysqli_query($conn,"select * from company");
                            while($sql=mysqli_fetch_array($query1))
                            {
                              ?>
                            <option value="<?php echo $sql['company_name']; ?>" class="company">
                              <?php echo $sql['company_name']; ?>
                            </option>
                            <?php } ?>
                            <option value="allcompany" class="company">All</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-2 my-3">
                      <div class="row">
                        <div>
                          <label class="col">Years</label>
                        </div>
                        <div class="col-7">
                          <select id="financialYear" name="year" class="form-control"></select>
                        </div>
                      </div>
                    </div>
                    <div class="col-2 my-3">
                      <button class="btn btn-primary" style="float:right" type="submit" name="submit" id="submit"
                        value="submit">Submit</button>
                    </div>
                  </div>
                </div>
              </form>
              <!-- **Customer** -->
              <?php
              if(isset($_POST['submit'])){
                $fav_language=$_POST['fav_language'];
                $category=$_POST['category'];
                $years=$_POST['year'];
                if($fav_language=='Customer'){               
              ?>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">ITR Reports</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Sr No.</th>
                        <th>Customer Name</th>
                        <th>Mobile No.</th>
                        <th>ITR</th>
                        <th>Years</th>
                        <th>Total Income</th>
                        <th>TDS Refund</th>
                        <th>Tax Paid</th>
                        <th>Upload</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php   
                      if($category=='allcustomer'){
                        $sql=mysqli_query($conn,"select * from ITR inner join customer_registration on ITR.cus_no=customer_registration.cus_no");
                      } 
                      else{
                    $sql=mysqli_query($conn,"select * from ITR inner join customer_registration on ITR.cus_no=customer_registration.cus_no WHERE ITR.cus_no='$category'");}
                    $count=1;
                    while($arr=mysqli_fetch_array($sql)){
                    ?>
                      <tr>
                        <td><?php echo $count;?></td>
                        <td><?php echo $arr['name'];?></td>
                        <td><?php echo $arr['number'];?></td>=
                        <td>yes</td>
                        <td><?php echo $arr['years'];?></td>
                        <td><?php echo $arr['total_income'];?></td>
                        <td><?php echo $arr['tds_refund'];?></td>
                        <td><?php echo $arr['tax_paid'];?></td>
                        <td><button type="button" class="btn-sm-btn-info m-1 customerview" data-toggle="modal"
                            data-target="#exampleModal"><i class="fa fa-eye"></i></button></td>
                      </tr>
                      <?php $count++; }  ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php 
 }
 else if($fav_language=='company'){
   ?>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">ITR Reports</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Sr No.</th>
                        <th>company_name</th>
                        <th>phone_no</th>
                        <th>email</th>

                      </tr>
                    </thead>
                    <tbody>

                      <?php   
                      if($category=='allcompany'){
                        $sql=mysqli_query($conn,"select * from company");
                      }  
                      else{
                    $sql=mysqli_query($conn,"select * from company where company_name='$category'");
                      }
                    $count=1;
                    while($arr=mysqli_fetch_array($sql)){
                    ?>
                      <tr>
                        <td><?php echo $count;?></td>
                        <td><?php echo $arr['company_name'];?></td>
                        <td><?php echo $arr['phone_no'];?></td>
                        <td><?php echo $arr['email'];?></td>

                      </tr>
                      <?php $count++; }  ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php } } ?>
            </div>

          </div>


        </div>
      </section>

      <!-- Main content -->
      <!-- /.content -->
    </div>

    <?php
        include("include/footer.php");
        ?>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>

  <!-- Button trigger modal -->
  

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="height:700px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
              <iframe src="dist\img\credit\b502ff7c4e812fd53a0efa56f3ad238b.pdf" width="100%" height="100%"
                style="border:none;"></iframe>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });

    $(function () {
      $("#example2").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

    });
  </script>

  <script>
    // function package(val) {
    //   $.ajax({
    //     url: "action_itr.php",
    //     method: "POST",
    //     data: {
    //       packa: val
    //     },
    //     success: function (data) {
    //       $("#example1").html(data);
    //       alert(val)
    //     }

    //   });
    // }
  </script>
  <script>
    var yearsLength = 30;
    var currentYear = new Date().getFullYear();
    for (var i = 0; i < 30; i++) {
      var next = currentYear + 1;
      var year = currentYear + '-' + next.toString().slice(-2);
      $('#financialYear').append(new Option(year, year));
      currentYear--;
    }
  </script>

  <script>
    $(document).ready(function () {
      $('.customerview').click(function () {
        let view = $(this).data('id');

        $.ajax({
          url: 'itr_reports.php',
          type: 'post',
          data: {
            view: view
          },
          success: function (response1) {
            $('.body1').html(response1);
            $('#viewModal').modal('show');
          }
        });
      });
    });
  </script>

  <script>
    $(document).ready(function () {
      $("#customer").click(function () {
        $(".company").css("display", "none");
        $(".customer1").css("display", "block");
      });
      $("#company").click(function () {
        $(".customer1").css("display", "none");
        $(".company").css("display", "block");
      })
    });
  </script>
</body>

</html>