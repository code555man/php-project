<?php 
    if (isset($_GET['viewdata'])) {
        header('Location: data.php?page=viewdata');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>QR Code Scanner | ระบบบันทึกข้อมูลผ่านคิวอาร์โค้ด</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="asset/img/atomic-qr.ico">
        <!-- CSS Requirements -->
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></head> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="asset/css/style.css">
        <!-- Sweet Alert  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    </head>
    <body>
        <!-- Header -->
        <div class="container">               
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <h2>
                            <strong>บันทึกข้อมูลนักศึกษาผ่าน qrcode</strong>
                        </h2>
                    </div>
                    <div class="col-sm-6 div-none">
                        <a href="?viewdata" target="_blank" class="a-none" title="View Data">
                            <button data-toggle="tooltip" title="View Data" type="button" class="btn btn-success btn-sm">
                                <span class="glyphicon glyphicon-edit"></span>&nbsp;View
                            </button>
                        </a>                            </div>
                </div>
            </div>
                
            <!-- Webcam Section -->   
            <div class="panel-body">
                <div class="col-md-6 text-center">                        
                    <div class="thumbnail">
                        <div class="well">
                            <video id="qr-canvas" width="320" height="240"></video>
                            <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                        </div>
                        <div>
                            <button id="start" data-toggle="tooltip" title="Start" type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-play"></span></button>
                            <button id="stop" data-toggle="tooltip" title="Stop" type="button" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-stop"></span></button>
                            <button onclick="openWebsiteQrcode();" data-toggle="tooltip" title="Create QR Code" type="button" class="btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-qrcode"></span>
                            </button>
                            <button onclick="alertInfo()" data-toggle="tooltip" title="Info" type="button" class="btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-exclamation-sign"></span>
                            </button>
                            <a href="?viewdata" target="_blank"  title="View Data">
                                <button data-toggle="tooltip" title="View Data" type="button" class="btn btn-success btn-sm">
                                    <span class="glyphicon glyphicon-edit"></span> View
                                </button>
                            </a>
                        </div>
                        <br>
                    </div>

                    <!-- Form Data -->
                    <form>
                        <input type="hidden" id="std_id">
                        <input type="hidden" id="std_name">
                        <input type="hidden" id="std_lastname">
                        <input type="hidden" id="std_group">
                    </form>
                </div>

                <!-- Result Scanner -->
                <div class="col-md-6 result-area">
                    <div id="result" class="thumbnail r-body">
                        <div id="id_show" class="p-body"></div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer">
                <div class="justify-content-center">
                    <span>Copyright © <?php echo date('Y'); ?></span>
                    <span> Create By <a href="https://m.facebook.com/surachai.4452">Surachai</a> Computer Science Student At Sisaket Rajabhat University</span>
                </div>
            </footer>
        </div>

        <!-- JavaScript Requirements -->
        <script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
        <script type="text/javascript"src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
        <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="asset/js/camera.js"></script>

        <script>

            const openWebsiteQrcode = () => {
                window.open("https://th.qr-code-generator.com/","_blank")
            };

            // Sweet Alert 
            let alertInfo = () => {
                Swal.fire({
                    title: '<strong>มีปัญหาปรึกษา Gu</strong>',
                    icon: 'info',
                    html:
                        'ติดต่อผู้พัฒนา ' +
                        '<a href="https://facebook.com/surachai.4452">Facebook</a> ' +
                        'ตอบเร็วตอบช้าอีกเรื่อง!!',
                    showCloseButton: true, 
                    focusConfirm: false,
                })

            };
        </script>
        
    </body>
</html>