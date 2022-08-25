<!-- itr_report -->
<?php
include("include/config.php");
?>
<?php
if(isset($_POST['packa'])){
    $name=$_POST['packa'];
    $query=mysqli_query($conn,"SELECT * FROM `ITR` WHERE customer_id='$name'");
    echo '  <thead>
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
';
    $row=mysqli_fetch_array($query);
    echo "
    <tr>
    <td>". $row['id'] ."</td>
            <td>". $row['years'] ."</td>
            <td>".$row['total_income']."</td>
            <td>".$row['tds_refund'] ."</td>
            <td>".$row['tax_paid'] ."</td>
            <td>".$row['itr_upload'] ."</td>      
    </tr> 
    ";
    }   
    echo'</tbody>'
    ?>


<!-- Business_itr_report -->
<?php
if(isset($_POST['packa1'])){
    $name=$_POST['packa1'];
    $query=mysqli_query($conn,"SELECT * FROM `ITR_business` WHERE customer_id='$name'");
    echo '  <thead>
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
';
    $row=mysqli_fetch_array($query);
    echo "
    <tr>
    <td>". $row['id'] ."</td>
            <td>". $row['year'] ."</td>
            <td>".$row['total_income']."</td>
            <td>".$row['tds_refund'] ."</td>
            <td>".$row['tax_paid'] ."</td>
            <td>".$row['bitr_uplode'] ."</td>      
    </tr> 
    ";
    }   
    echo'</tbody>'
    ?>



