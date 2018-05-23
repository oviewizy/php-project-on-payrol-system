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
    $type = $_POST['type'];
   
    if ($type=='1'){
    $amount= $_POST['percentage'];
    $rate="N/A";
    $types="Flat Amount";
    
      }else{
           $amount= "N/A";
            $rate= $_POST['percentage'];
            $types="Percentage";
      }
    
    $sql = mysql_query("INSERT into dues(name, amount, type, rate)VALUES('$name','$amount','$types', '$rate')");
   
 
    if($sql)
    {
      ?>
        <script>
            alert('Due had been successfully added.');
            window.location.href='admin.php?Part=setup';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='admin.php?Part=setup';
        </script>
      <?php 
    }
  }
  
?>