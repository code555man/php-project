<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "student";

    $conn = new mysqli($server, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " .$con->connect_error);
    }
    $sql = "SELECT * FROM data";
    $query = mysqli_query($conn,$sql);

    // Export To Excel .xsl
    if(isset($_GET['act'])){
        if($_GET['act'] == 'excel'){
            header("Content-Type: application/xsl");
            header("Content-Disposition: attachment; filename=student.xsl");
            header("Pragma: no-cache");
            header("Expires: 0");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner | ระบบบันทึกข้อมูลผ่านคิวอาร์โค้ด</title>
    <!-- icon page -->
    <link rel="shortcut icon" href="asset/img/atomic-qr.ico">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">    
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>
<body class="app">
    <div class="app-wrapper">
        <div class="app-content pt-3 md-3 p-lg-4">
            <div class="container-xl">
                <div class="bg-success p-2">
                    <h1 class="app-page-title mt-2 text-center mb-6 text-white">ข้อมูลนักศึกษา</h1>
                </div>
                <div class="row g-4 settings-section card-body">
                    <div class="col-12 col-md-12">
                        <div class="app-card app-card-seetings show-sm p-4" style="box-shadow: 1px 1px 4px #333;">
                            <a href="index.php" class="btn btn-sm btn-primary mb-4">Home</a>
                            <a href="?act=excel" class="btn btn-sm btn-success mb-4">Export to Excel</a>
                            <a href="#"><button class="btn btn-sm btn-danger mb-4">Delete All</button></a>
                            <div class="app-card-body">
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">รหัสนักศึกษา</th>
                                            <th scope="col">ชื่อ-สกุล</th>
                                            <th scope="col">สาขาวิชา</th>
                                            <th scope="col">เวลา</th>
                                            <th scope="col">เมนู</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <?php foreach($query as $stdentData): ?>
                                            <tr>
                                                <td><?=$stdentData['std_id'];?></td>
                                                <td><?=$stdentData['std_name']." ".$stdentData['std_lastname'];?></td>
                                                <td><?=$stdentData['std_group'];?></td>
                                                <td><?=$stdentData['time_in'];?></td>
                                                <td>
                                                    <a href="delete.php?deleteid=<?=$stdentData['id'];?>" onclick="return confirm('Are you sure delete It?')" class="btn btn-sm btn-danger">ลบ</a>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer" style="padding: 10px 1rem; text-align:center; background-color: #eee;">
        <div class="justify-content-center">
            <span>Copyright © <?php echo date('Y'); ?></span>
            <span> Create By <a href="https://m.facebook.com/surachai.4452">Surachai</a> Computer Science Student At Sisaket Rajabhat University</span>
        </div>
    </footer>

    <!-- JavaScript Requirements -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                language: {
                    "decimal":        "",
                    "emptyTable":     "ไม่มีข้อมูล",
                    "info":           "แสดง _START_ ถึง _END_ ของ _TOTAL_ รายการ",
                    "infoEmpty":      "แสดง 0 ถึง 0 ของ 0 รายการ",
                    "infoFiltered":   "(filtered from _MAX_ total entries)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "แสดง _MENU_ รายการ",
                    "loadingRecords": "Loading...",
                    "processing":     "",
                    "search":         "ค้นหา: ",
                    "zeroRecords":    "No matching records found",
                    "paginate": {
                        "first":      "First",
                        "last":       "Last",
                        "next":       "ถัดไป",
                        "previous":   "ก่อนหน้า"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                }
            });
        });
        
    </script>
</body>
</html>

<?php mysqli_close($conn); ?>