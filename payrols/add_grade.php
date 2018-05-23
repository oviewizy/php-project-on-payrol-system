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
    $name = $_POST['name'];
    $level = $_POST['level'];
    $amount= $_POST['amount'];
    
    
    $sql = mysql_query("INSERT into gradelevel(GradeName, Level, amount)VALUES('$name','$level','$amount')");
   
 
    if($sql)
    {
      ?>
        <script>
            alert('Grade Level had been successfully added.');
            window.location.href='admin.php?Part=grade';
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