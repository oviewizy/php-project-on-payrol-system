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
    $sname   = $_POST['sname'];
    $fname   = $_POST['fname'];
    $phoneno = $_POST['phoneno'];
    $address = $_POST['address'];
    $state   = $_POST['state'];
    $dept    = $_POST['dept'];
    $bank    = $_POST['bank'];
    $acctname = $_POST['acctname'];
    $accountno = $_POST['accountno'];
    $birthdate = $_POST['birthdate'];
    $appointdate = $_POST['appointdate'];
    $designation = $_POST['designation'];
    $gradelevel = $_POST['grade'];
    $level = $_POST['level'];
    $dues = $_POST['dues'];

    
  $sql = mysql_query("INSERT into employee(surname, firstname, phoneno, address, state, dept, bank, acctname, accountno,
                    bday, appoint, designation, gradeid,level)
  VALUES('$sname','$fname','$phoneno', '$address', '$state', '$dept','$bank','$acctname', '$accountno', '$birthdate',
  '$appointdate', '$designation', '$gradelevel','$level')");  
   
   $last_id = mysql_insert_id($conn);
   
     mysql_query("INSERT into user(username, password, status, role, empid) VALUES('$sname','$accountno', 1, 3,  '$last_id')"); 
    
    $num = count($dues);
    for ($counter=0; $counter<$num; $counter++) {
    mysql_query("INSERT into assigneddues(dueid, empid)VALUES('$dues[$counter]','$last_id')");
} 
  
    if($sql)
    {
      ?>
        <script>
            alert('Employee had been successfully added.');
            window.location.href='admin.php?Part=employee';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='index.php';
        </script>
      <?php 
    }
  }
?>