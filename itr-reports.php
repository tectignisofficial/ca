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

      <!-- Main content -->

      <section class="content">
        <div class="container-fluid">
          <div class="packageresult">

            <div class="card">
                <div class="col-12 my-3">
                  <div class="row text-center justify-content-center">
                  
                    <label class="col-2">Select &nbsp; ITR &nbsp; User</label>
                    <?php 
                   $query=mysqli_query($conn,"select * from customer_registration");
                   ?>
                    <select class="form-control"  onChange="package(this.value)" name="category" id="inputcategory">
                      <option selected disabled>Select ITR User</option>
                      <?php
                    while($sql=mysqli_fetch_array($query))
                    {
                      ?>
                      <option value="<?php echo $sql['id']; ?>"> <?php echo $sql['name']; ?></option>
                         <?php } ?>
                    </select>
                    
                  </div>
                 
                  <div style="text-align:center; margin-top:inherit;">
                  <button class="btn btn-primary" style="float:middle;" type="submit" name="submit" id="submit" value="login">Submit</button>
                  </div>
                </div>
            </div>

              <!-- Main row -->
              <!-- <div class="row"> -->
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
                          <th>Years</th>
                          <th>Total Income</th>
                          <th>TDS Refund</th>
                          <th>Tax Paid</th>
                          <th>Upload</th>
                        </tr>
                      </thead>
                      <tbody >
                  
                  <?php     
                    $sql=mysqli_query($conn,"select * from ITR");
                    $count=1;
                    while($arr=mysqli_fetch_array($sql)){
                    ?>
                  <tr >
                    <td><?php echo $count;?></td>
                    <td><?php echo $arr['years'];?></td>
                    <td><?php echo $arr['total_income'];?></td>
                    <td><?php echo $arr['tds_refund'];?></td>
                    <td><?php echo $arr['tax_paid'];?></td>
                    <td><?php echo $arr['itr_upload'];?></td>                   
                  </tr>                 
                  <?php $count++; }  ?>
                  </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>

          </div>
          <!-- </div> -->
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
  <div class="modal fade closemaual" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        </div>
        <div class="modal-body">
          <form method="post" action="">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Package</label>
                  <input type="hidden" value="<?php echo $id; ?>" id="firm_name" name="firm_name">
                  <input type="text" value="" class="form-control" name="package" id="package">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Client Mobile Number</label>
                  <input type="tel" minlength="10" maxlength="10" onkeypress="return onlyNumberKey(event)"
                    class="form-control" name="number" id="number" placeholder="Mobile Number" required>
                  <span id="numberspan" class="mb-4"></span>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Client Name</label>
                  <input type="text" class="form-control" name="Cname" id="cname" placeholder="Client Name" required>
                  <span id="cnamespan" class="mb-4"></span>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Requirement</label>
                  <input type="text" class="form-control" name="requirement" id="Rname" placeholder="Requirement"
                    required>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.form-group -->
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Social Media</label>
                  <select class="form-control select2" name="social_media" id="social_media" style="width: 100%;">
                    <option selected="selected" disabled>Select</option>
                    <option>Facebook</option>
                    <option>Instagram</option>
                    <option>Twitter</option>
                    <option>Linkdin</option>
                    <option>Youtube</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.form-group -->
            </div>

            <div class="modal-footer">
              <button type="close" class="btn btn-default" data-dismiss="modal" name="close" id="close">Close</button>
              <button type="button" name="submitt" class="btn btn-primary float-right my-3 " id="sub"
                style="margin-right: 5px;">Submit </button>
            </div>
          </form>
        </div>

      </div>

      <!-- Button trigger modal -->


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
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["csv", "excel", "pdf", "print"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
      </script>

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
          }
          else { return false; }
        }
      </script>
      <script>
        $(document).ready(function () {
          $('.delbtn').click(function (e) {
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
                  window.location.href = "view_clients.php?del_id" + del_id;
                } else {
                  swal("Your imaginary file is safe!");
                }
              });
          })
        });
      </script>
      <script>
        function getdata(val) {
          let fetch = $(".dropbtn").val();
          let leadid = $("#leadid").val();
          $.ajax({
            url: "api_crm/action_client.php",
            method: "POST",
            data: {
              fetch: fetch,
              leadid: leadid
            },
            success: function (data) {
              $('#leads').html(data);
            }
          });
        }

        function package(val) {
          $("#package").val(val);
          let firm_name = $("#leadid").val();
          $.ajax({
            url: "action_clients.php",
            method: "POST",
            data: {
              packa: val,
              firm_name: firm_name
            },
            success: function (data) {
              $(".packageresult").html(data);
            }
          });
        }

        $(document).ready(function () {
          $("#sub").click(function () {
            let firm_name = $("#firm_name").val();
            let package = $("#package").val();
            let number = $("#number").val();
            let cname = $("#cname").val();
            let Rname = $("#Rname").val();
            let social_media = $("#social_media").val();
            let sub = $("#sub").val();
            $.ajax({
              type: "POST",
              url: "action_clients.php",
              data: {
                firm_name: firm_name,
                package: package,
                number: number,
                cname: cname,
                Rname: Rname,
                social_media: social_media,
                sub: sub
              },
              success: function (data) {
                $(".packresult").html(data);
                $("#exampleModal").modal('hide');
              }
            });
          });
        });
      </script>
      <script>
function package(val){
    $.ajax({
      url:"action_itr.php",
      method:"POST",
      data:{packa:val},
      success:function(data){
        $("#example1").html(data);
      }
    
    });
  }
  </script>
</body>

</html>