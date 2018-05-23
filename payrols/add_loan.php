<?php
  $conn = mysql_connect('localhost', 'root', '');
  if (!$conn)
  {
    die("Database Connection Failed" . mysql_error());
  }

  $select_db = mysql_select_db('payrols');
  if (!$select_db)
  {
    die("Database Selection Failed" . mysql_error());
  }

  if(isset($_POST['submit'])!="")
  {
    $staffno = $_POST['staffno'];
    $loanamt = $_POST['loanamt'];
    $intrate= $_POST['intrate'];
    
    $mnth= $_POST['mnth'];
    $repayamt= ($loanamt/$mnth)+($loanamt * ($intrate/100));
    $disbursedate=date("d-m-y");
    $d=strtotime("+".$mnth."Months");
    $expiry= date("Y-m-d h:i:sa", $d);
    
    $sql = mysql_query("INSERT into loan(empid, loanamount, intrate, loanbal, repayamt, expiry, running,new)
                       VALUES('$staffno','$loanamt','$intrate','$loanamt','$repayamt','$expiry','1','1')");
   
 
    if($sql)
    {
      ?>
        <script>
            alert('Loan Disbursed successfully!.');
            window.location.href='accountant.php?Part=loan';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='admin.php?Part=grade';
        </script>
      <?php 
    }
  }
  
?>