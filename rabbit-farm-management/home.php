<?php 
session_start();
include_once('include/connect.php');

if (!isset($_SESSION['admin_login']) && !isset($_SESSION['user_login'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!!';
  header('location: index.php');
}

// Delete vaccine
if (isset($_GET['delete_vaccine'])) {
    $delete_id = $_GET['delete_vaccine'];
    $deletestmt = $conn->query("DELETE FROM tbl_vaccine WHERE id = $delete_id");
    $deletestmt->execute();
}

// Delete data in table Rabbit data
if (isset($_GET['delete_rb_data'])) {
  $delete_rb_id = $_GET['delete_rb_data'];
  $deletestmt = $conn->query("DELETE FROM tbl_rabbit WHERE id = $delete_rb_id");
  $deletestmt->execute();
}

// Delete data Rabbit hb
if (isset($_GET['delete_rb_hb'])) {
  $delete_rb_id = $_GET['delete_rb_hb'];
  $deletestmt = $conn->query("DELETE FROM tbl_rabbit_hb WHERE id = $delete_rb_id");
  $deletestmt->execute();
}

// Delete data Member
if (isset($_GET['delete_member'])) {
  $delete_id = $_GET['delete_member'];
  $deletestmt = $conn->query("DELETE FROM tbl_members WHERE id = $delete_id");
  $deletestmt->execute();
}

// Delete data Rabbit Heal
if (isset($_GET['delete_rb_heal'])) {
  $delete_id = $_GET['delete_rb_heal'];
  $deletestmt = $conn->query("DELETE FROM tbl_rabbit_heal WHERE id = $delete_id");
  $deletestmt2 = $conn->query("DELETE FROM tbl_health WHERE fk_id = $delete_id");
  $deletestmt->execute();
  $deletestmt2->execute();
}

if (isset($_SESSION['admin_login'])) {
  $admin_id = $_SESSION['admin_login'];
  $stmt = $conn->query("SELECT * FROM tbl_members WHERE id = $admin_id");
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

}else{
  $user_id = $_SESSION['user_login'];
  $stmt = $conn->query("SELECT * FROM tbl_members WHERE id = $user_id");
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
    
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>ระบบจัดการฟาร์มกระต่าย - มั่งมีฟาร์ม</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/logo.ico"> 

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/style.css">
    <link id="theme-style" rel="stylesheet" href="assets/css/live-search.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

    <!-- Google font -->
    <style>

      @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');

      body{
        font-family: 'Kanit', sans-serif;
      }

    </style>

    <script>

      function showResult(str) {
        if (str.length==0) {
          document.getElementById("livesearch").innerHTML="";
          return;
        }
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
          if (this.readyState==4 && this.status==200) {
            document.getElementById("livesearch").innerHTML=this.responseText;
          }
        }
        xmlhttp.open("GET","include/livesearch.php?search="+str,true);
        xmlhttp.send();
      }

    </script>

</head> 

<body class="app">   	

    <!-- include header page -->
    <?php include_once('template/header.php'); ?>

    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">

          <?php 
          
            if (!isset($_GET['page']) && empty($_GET['page'])) {
              include('pages/dashboard/overview.php');
            }
            elseif (isset($_GET['page']) && $_GET['page'] == 'setting'){
              include('pages/dashboard/setting.php'); 
            }
            elseif (isset($_GET['page']) && $_GET['page'] == 'vaccine'){
              include('pages/vaccine/vaccine.php'); 
            }
            elseif (isset($_GET['page']) && $_GET['page'] == 'rabbit_data'){
              include('pages/rabbit/rb_data.php'); 
            }
            elseif (isset($_GET['page']) && $_GET['page'] == 'rabbit_hb'){
              include('pages/rabbit/rb_hb.php'); 
            }
            elseif (isset($_GET['page']) && $_GET['page'] == 'rabbit_heal'){
              include('pages/rabbit/rb_heal.php'); 
            }
            elseif (isset($_GET['page']) && $_GET['page'] == 'heal_history'){
              include('pages/rabbit/heal_history.php'); 
            }
            elseif (isset($_GET['page']) && $_GET['page'] == 'checkList'){
              include('pages/rabbit/check_list.php'); 
            }
            elseif (isset($_GET['page']) && $_GET['page'] == 'checkHb'){
              include('pages/rabbit/check_hb.php'); 
            }
            elseif (isset($_GET['page']) && $_GET['page'] == 'member'){
              include('pages/members/member.php'); 
            }
            elseif (isset($_GET['id'])){
              include('pages/members/edit_member.php?id=' + $id); 
            }

          ?> 

		    </div><!--//container-fluid-->
	    </div><!--//app-content-->

      <!-- include footer page -->
		  <?php include_once('template/footer.php'); ?>

    </div><!--//app-wrapper-->    					

    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

      $(function () {
        $('#myTable').dataTable();

      });

      $(document).ready(function() {

        $('#search-box').hide();

        $(".search-input").click(function(){
          $('#search-box').show();
          console.log('ckcldkfd');
            if($(".search-input").val() != ""){   
              $('#search-box').show();
            }
            
        });
        // $('#search-form').click(function(){
        //   $(".search-input").valid()
        // });
      });

    </script>

</body>
</html> 

