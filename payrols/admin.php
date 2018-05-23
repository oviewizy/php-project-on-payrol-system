        <?php
        session_start();
       include("auth.php");
        include("includes/connections.php");
        include("header.php");
        ?>
<nav class="navbar navbar-inverse">
  
  <div class="container-fluid">
   
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>
    
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

        <?php
        echo "<li ";
        if (!isset($_GET['Part'])|| $_GET['Part']=='home' ){echo "class='active'";} 
        echo"><a href='admin.php?Part=home'>Admin Module</a></li>";

        echo "<li ";
        if (isset($_GET['Part'])and $_GET['Part']=='employee' ){echo "class='active'";} 
        echo"><a href='admin.php?Part=employee'>Employee</a></li>";

        echo "<li ";
        if (isset($_GET['Part'])and $_GET['Part']=='grade' ){echo "class='active'";} 
        echo"><a href='admin.php?Part=grade'>Grade/Level</a></li>";
        
        echo "<li ";
        if (isset($_GET['Part'])and $_GET['Part']=='setup' ){echo "class='active'";} 
        echo"><a href='admin.php?Part=setup'>Setup Dues</a></li>";
        
      
        echo "<li ";
        if (isset($_GET['Part'])and $_GET['Part']=='payslip' ){echo "class='active'";} 
        echo"><a href='admin.php?Part=payslip'>Payslip</a></li>";
        
        echo "<li ";
        if (isset($_GET['Part'])and $_GET['Part']=='report' ){echo "class='active'";} 
        echo"><a href='admin.php?Part=report'>Report</a></li>";
        ?>
       
        <li><a data-toggle="modal" href="#changepass">Change Password</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="fa fa-sign-out"></span> Sign Out</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">

    <div class="col-sm-12 text-left">
      
      <?php
        include("sidebar.php");
       
        ?>
             
      
    </div>
  </div>
</div>


 <!-- this modal is changing password -->
      <div class="modal fade" id="changepass" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Change Password</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="admin.php?Part=password"  method="post">
               <div class="form-group">
                  <label class="col-sm-4 control-label">Old Password</label>
                  <div class="col-sm-4">
                    <input type="text" name="oPass" class="form-control" placeholder="Old Password" required="required">
                  </div>
                  <div class="col-sm-4"></div>
                </div>
                
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">New Password</label>
                  <div class="col-sm-4">
                    <input type="text" name="nPass" class="form-control" placeholder="New Password" required="required">
                  </div>
                  <div class="col-sm-4"></div>
                </div>
                
              <div class="form-group">
              <label class="col-sm-4 control-label">Comfirm New Password</label>
              <div class="col-sm-4">
              <input type="text" name="cPass" class="form-control" placeholder="Comfirm New Password" required="required">
              </div>
              <div class="col-sm-4"></div>
              </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                    <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

<?php
include("footer.php");
?>
