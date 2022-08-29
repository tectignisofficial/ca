<?php
include("include/config.php");
$customer_id=$_GET['customerId'];

if(isset($_POST['submit']))
{
  $year = $_POST['year'];
  $total_income = $_POST['total_income'];
  $tds_refund = $_POST['tds_refund'];
  $tax_paid = $_POST['tax_paid'];
  $itr_upload=$_FILES['itr_upload']['name'];
  $totAmt=$_POST['totAmt'];
  $advanceAmt=$_POST['advanceAmt'];
  $bal=$_POST['bal'];
  $extension=substr($itr_upload,strlen($itr_upload)-4,strlen($itr_upload));   

  $itr_upload=md5($itr_upload).$extension;
  $dnk=$_FILES['itr_upload']['tmp_name'];
  $loc="dist/img/credit/".$itr_upload;
  move_uploaded_file($dnk,$loc);
        
    $sql="INSERT INTO `ITR`(`year`, `total_income`, `tds_refund`, `tax_paid`, `itr_upload`,`cus_no`,`totAmt`,`advAmt`,`balance`) VALUES ('$year','$total_income','$tds_refund','$tax_paid','$itr_upload','$customer_id','$totAmt','$advanceAmt','$bal')";
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
      <section class="content-header">
        <div class="container-fluid">

          <div class="row">
            <div class="col-12">
              <div class="card">
              <?php     
                    $sql=mysqli_query($conn,"select * from customer_registration where cus_no='$customer_id'");
                    while($arr=mysqli_fetch_array($sql)){
                    ?>
                <div class="card-header">
                  <div class="row">
                    <div class="col-6">
                      
                      <label>Customer Name:</label>
                      <label><?php echo $arr['name'];?></label>
                    </div>
                    <div class="col-6">
                    <label>Customer Category:</label>
                      <label><?php echo $arr['category'];?></label>
                    
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label>Customer Email:</label>
                      <label><?php echo $arr['email'];?></label>
                    
                    </div>
                    <div class="col-6">
                   
                    <label>Customer  Pancard No:</label>
                      <label><?php echo $arr['pan'];?></label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                    
                    <label>Customer  Aadhar No:</label>
                      <label><?php echo $arr['aadhar'];?></label>
                    </div>
                   
                  </div>
                </div>
                <?php }  ?>
              </div>
            </div>
            </div>
          </div>
      

      </section>
      <section class="content-header">
        <div class="container-fluid">

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">

                    <div class="col-7 col-sm-12">

                      <table id="example1" class="table table-bordered table-striped">
                        <h3>ITR <button type="button" class="btn btn-primary float-right " data-bs-toggle="modal" data-bs-target="#myModal" style="margin-right: 5px;">+ Add ITR</button></h3>
                        <thead>
                          <tr>
                            <th>Sr No.</th>
                            <th>Year</th>
                            <th>Total Income</th>
                            <th>TDS Refund</th>
                            <th>Tax Paid</th>

                            <th>ITR_File</th>
                          </tr>
                        </thead>


                        <tbody id="leads" class="packresult">

                        <?php     
                    $sql=mysqli_query($conn,"select * from ITR where cus_no='$customer_id'");
                    $count=1;
                    while($arr=mysqli_fetch_array($sql)){
                    ?>
                  <tr >
                    <td><?php echo $count;?></td>
                    <td><?php echo $arr['year'];?></td>
                    <td><?php echo $arr['total_income'];?></td>
                    <td><?php echo $arr['tds_refund'];?></td>
                    <td><?php echo $arr['tax_paid'];?></td>
                    <td><button type="button" class="btn btn-sm btn-info m-1 customerview"
                                data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i> </button>
                            </td>                  
                  </tr>                 
                  <?php $count++; }  ?>

                        </tbody>
                      </table>
                    </div>

                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>

      </section>
   
     
  </div>              
                    
<?php
  include("include/footer.php");
  ?>
  </div>
    <!-- /.content-wrapper -->
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
  <!-- ./wrapper -->

  <div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
          <div class="card-body">
          <div class="row">
            <div class="col-6">
                <!-- Date -->
                <div class="form-group">
                  <label>Year:</label>
                  <input type="text" class="form-control" name="year">
                  <div class="text" id="reservationdate" data-target-input="nearest" >
                 
                  </div>
                </div>
            </div>
            <div class="col-6">
                <!-- Date and time -->
                <div class="form-group">
                        <label>Total Income</label>
                        <input type="text" class="form-control" name="total_income">
                </div>
            </div>
            <div class="col-6">
                  <div class="form-group">
                        <label>TDS Refund</label>
                        <input type="text" class="form-control" name="tds_refund">
                  </div>
            </div>
            <div class="col-6">
                  <div class="form-group">
                        <label>Tax Paid</label>
                        <input type="text" class="form-control" name="tax_paid">
                  </div>
                  <!-- /.input group -->
            </div>
            <div class="col-6">
                  <div class="form-group">
                      <label>ITR upload</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="itr_upload" accept="image/jpg,image/png,image/svg,image/webp,image/jpeg,image/pdf">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
            </div>
            
           
            </div>
                  
                <!-- /.form group -->
          </div>
          <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Payment</h1><br>
            </div>
            <div class="row">
            <div class="col-6">
                  <div class="form-group">
                        <label>Total Payment Amt</label>
                        <input type="text" class="form-control" name="totAmt" id="totAmt">
                  </div>
                  <!-- /.input group -->
            </div>
            <div class="col-6">
                  <div class="form-group">
                        <label>Advance Payment Amt</label>
                        <input type="text" class="form-control" name="advanceAmt" id="advanceAmt">
                  </div>
                  <!-- /.input group -->
            </div>
            <div class="col-6">
                  <div class="form-group">
                        <label>Balance</label>
                        <input type="text" class="form-control" name="bal" id="bal">
                  </div>
                  <!-- /.input group -->
            </div>
                    </div>
            
          </div>
        </div><!-- /.container-fluid -->
    </section>
          <button type="submit" class="btn btn-primary" name="submit" data-bs-dismiss="modal">Submit</button>
                          </form>
        </div>

      <!-- Modal footer -->
     

    </div>
  </div>
</div>
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

  <!-- Page specific script -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
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
    $(document).ready(function(){
      $("#tamt,#advanceAmt").keyup(function(){
     let tamt=$("#tamt").val();
     let advanceAmt=$("#advanceAmt").val();
     $("#bal").val(tamt-advanceAmt);
    });
  });
</script>
  
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
      })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
      })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date picker
      $('#reservationdate').datetimepicker({
        format: 'L'
      });

      //Date and time picker
      $('#reservationdatetime').datetimepicker({
        icons: {
          time: 'far fa-clock'
        }
      });

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
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
              'month')]
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
      file.previewElement.querySelector(".start").onclick = function () {
        myDropzone.enqueueFile(file)
      }
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

