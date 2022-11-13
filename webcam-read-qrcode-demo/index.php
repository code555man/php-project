<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qrcode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center">
                <video id="preview" width="500px" src=""></video>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="insert.php" method="post" class="form-horizontal">
                    <label for="">Qr Code</label>
                    <input type="text" name="text" readonly="" id="text">
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript"src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script>
        let scanner=new Instascan.Scanner({video:document.getElementById("preview")});
        Instascan.Camera.getCameras().then(function(cameras){
    if(cameras.length>0){
        scanner.start(cameras[0]);
        // alert('No cameras found');
    }else{
        alert('No cameras found');
    }}).catch(function(e){
        console.error(e)
    });
    scanner.addListener('scan',function(content){
        document.getElementById("text").value=content;
        document.forms[0].submit();
    });
    </script>
</body>
</html>