<?php
include("include/config.php");
$customer_id=$_GET['customerId'];
if(isset($_POST['submit']))
{
    $customer=$_POST['customer'];
  $category = $_POST['category'];
  $name = $_POST['name'];
  $designation = $_POST['designation'];
  $adress = $_POST['adress'];
  $number = $_POST['number'];
  $c_person = $_POST['c_person'];
    
        
            
    $sql="INSERT INTO `business_registration`(`category`, `name`, `designation`, `adress`, `number`, `c_person`,`cus_no`) VALUES ('$category','$name','$designation','$adress','$number','$c_person','$customer')";
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
  <title>AdminLTE 3 | Advanced form elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
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
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Advanced Form</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Advanced Form</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">


          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Personal ITR</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" aria-expanded="false" data-card-widget="collapse">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
              <?php     
                    $sql=mysqli_query($conn,"select * from customer_registration where cus_no='$customer_id'");
                    while($arr=mysqli_fetch_array($sql)){
                    ?>
                <div class="col-md-4 col-sm-6">
                  <div class="card card-widget widget-user">
                    <div class="widget-user-header" >
                      <div style="display:inline-block;width: 100%;">
                      
                        <a href="itr.php?customerId=<?php echo $arr['cus_no']?>" style="color:#000;">
                          <h3 class="widget-user-desc"><?php echo $arr['name'];?></h3>
                        </a>
                        <a href="view_clients">
                          <h5 style="font-size: 15px !important;" class="widget-user-username">Indivisual ITR</h5>
                        </a>
                      
                      </div>
                    </div>
                  </div>
                </div>
                <?php }  ?>
              </div>
            </div>
            <!-- /.card-body -->
           
          </div>
          <!-- /.card -->

          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default collapsed-card">
            <div class="card-header">
              <h3 class="card-title">Business ITR</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-plus"></i>
                </button>

              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row justify-content-end mt-0"style="
    margin-bottom: 20px;
">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                  data-target="#businessITR" style="margin-right: 5px;">+ Add ITR</button>
              </div>
              <div class="row">
              <?php     
                    $sql=mysqli_query($conn,"select * from business_registration where cus_no='$customer_id'");
                    while($arr=mysqli_fetch_array($sql)){
                    ?>
                <div class="col-md-4 col-sm-6">
                  <div class="card card-widget widget-user">
                    <div class="widget-user-header" >

                      <div style="display:inline-block;width: 100%;">
                      
                      
                        <a href="business_itr.php?customerId=<?php echo $arr['cus_no']?>" style="color:#000;">
                          <h3 class="widget-user-desc"><?php echo $arr['name'];?></</h3>
                        </a>
                        <a href="view_clients">
                          <h5 style="font-size: 15px !important;" class="widget-user-username">Business ITR</h5>
                        </a>
                      </div>
                    </div> 
                  </div>
                </div>
                <?php }  ?>
              </div>
            </div>
            <!-- /.card-body -->
           
          </div>
          <!-- /.card -->

          <div class="card card-default collapsed-card">
            <div class="card-header">
              <h3 class="card-title">Business GST</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-plus"></i>
                </button>

              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">

                <div class="col-md-4 col-sm-6">
                  <div class="card card-widget widget-user">
                    <div class="widget-user-header" style="background:#B2BEB5;">

                      <div style="display:inline-block;width: 100%;">
                        <a href="view_clients" style="color:#000;">
                          <h3 class="widget-user-desc">Business Name</h3>
                        </a>
                        <a href="view_clients">
                          <h5 style="font-size: 15px !important;" class="widget-user-username">Business GST</h5>
                        </a>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- /.card-body -->
           
          </div>
        </div>
        <!-- /.card -->


        <!-- /.row -->
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Modal -->
    <div class="modal fade" id="businessITR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ADD ITR DETAILS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Category</label>
                  <input type="text" class="form-control" name="category" placeholder="Enter ...">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Firm Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter ...">
                  <input type="hidden" class="form-control" name="customer" value="<?php echo $customer_id ?>" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Designation</label>
                  <input type="text" class="form-control" name="designation" placeholder="Enter ...">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Adress</label>
                  <textarea class="form-control" name="adress"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Contact Number</label>
                  <input type="number" class="form-control" name="number" placeholder="Enter ...">
                </div>
              </div>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Contact Person</label>
                  <input type="number" class="form-control" name="c_person" placeholder="Enter ...">
                </div>
              </div>
            </div>
            <div class="row justify-content-center" id="btnGST">
              <button type="button" name="" class="btn btn-outline-info btn-sm" onclick="addGST()">Add Gst</button>
            </div>
            <div class="row" id="GST" style="display:none;">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>5% GST</label>
                <div class="row">
                  <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="CGST 2.5%">
                    </div>
                  <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="SGST 2.5%">
                  </div>
                </div>
                </div>
              </div>
              
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>12% GST</label>
                <div class="row">
                  <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="CGST 6%">
                    </div>
                  <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="SGST 6%">
                  </div>
                </div>
                </div>
              </div>

              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>28% GST</label>
                <div class="row">
                  <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="CGST 14%">
                    </div>
                  <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="SGST 14%">
                  </div>
                </div>
                </div>
              </div>

              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>18% GST</label>
                <div class="row">
                  <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="CGST 9%">
                    </div>
                  <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="SGST 9%">
                  </div>
                </div>
                </div>
              </div>

              <div class="col-sm-12">
                <div class="row justify-content-center">
                  <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeGST()">Remove Gst</button>
                </div>
              </div>
            </div>
          
          </div>
          <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>


    <?php
  include("include/footer.php");
  ?>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <script>
    function addGST() {
      document.getElementById("btnGST").setAttribute("style", "display:none;");
      document.getElementById("GST").removeAttribute("style");
      // document.getElementById("btnGST").removeAttribute("style");
    }
    function removeGST() {
      document.getElementById("GST").setAttribute("style", "display:none;");
      document.getElementById("btnGST").removeAttribute("style");
      // document.getElementById("btnGST").removeAttribute("style");
    }
  </script>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Select2 -->
  <script src="plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- InputMask -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
  <!-- date-range-picker -->
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Bootstrap Switch -->
  <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <!-- BS-Stepper -->
  <script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
  <!-- dropzonejs -->
  <script src="plugins/dropzone/min/dropzone.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date picker
      $('#reservationdate').datetimepicker({
        format: 'L'
      });

      //Date and time picker
      $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })

      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      $('.my-colorpicker2').on('colorpickerChange', function (event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      })

      $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
      url: "/target-url", // Set the url
      thumbnailWidth: 80,
      thumbnailHeight: 80,
      parallelUploads: 20,
      previewTemplate: previewTemplate,
      autoQueue: false, // Make sure the files aren't queued until manually added
      previewsContainer: "#previews", // Define the container to display the previews
      clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function (file) {
      // Hookup the start button
      file.previewElement.querySelector(".start").onclick = function () { myDropzone.enqueueFile(file) }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function (progress) {
      document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function (file) {
      // Show the total progress bar when upload starts
      document.querySelector("#total-progress").style.opacity = "1"
      // And disable the start button
      file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function (progress) {
      document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function () {
      myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function () {
      myDropzone.removeAllFiles(true)
    }
  // DropzoneJS Demo Code End
  </script>
</body>

</html>