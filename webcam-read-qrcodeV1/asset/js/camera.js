let scanner=new Instascan.Scanner({video:document.getElementById("qr-canvas")});

var audio = new Audio("asset/audio/beep.mp3");

let startCamera = document.querySelector('#start');
let stopCamera = document.querySelector('#stop');

// Start Camera Webcam
startCamera.addEventListener('click',() => {

    Instascan.Camera.getCameras().then(function(cameras){
    if(cameras.length>0){
        scanner.start(cameras[0]);
    }else{
        alert('No cameras found');
    }}).catch(function(e){
        console.error(e)
    });

}) 
        
// Stop Camera Webcam
stopCamera.addEventListener('click',() => {

    Instascan.Camera.getCameras().then(function(cameras){
    if(cameras.length>0){
        scanner.stop(cameras[0]);
    }else{
        alert('No cameras found');
    }}).catch(function(e){
        console.error(e)
    });

})

scanner.addListener('scan',function(content){
    let qrcodeResult = content;
    let r_studentId = qrcodeResult.split("-")[0];
    let r_studentName = qrcodeResult.split("-")[1];
    let r_studentLastname = qrcodeResult.split("-")[2];
    let r_studentGroup = qrcodeResult.split("-")[3];

    document.getElementById("std_id").value=r_studentId;
    document.getElementById("std_name").value=r_studentName;
    document.getElementById("std_lastname").value=r_studentLastname;
    document.getElementById("std_group").value=r_studentGroup;
    
    // play beep.mp3
    audio.play(); 

    // jquery ajax send data to save.php
    $(document).ready(function(){
        
        let studentId = $('#std_id').val();
        let studentName = $('#std_name').val();
        let studentLastname = $('#std_lastname').val();
        let studentGroup = $('#std_group').val();

        if(studentId != "" && studentName != "" && studentLastname != "" && studentGroup != ""){
            
            $.ajax({
                url: "save.php",
                method: "POST",
                data: {
                    stdId: studentId,
                    stdName: studentName,
                    stdLastname: studentLastname,
                    stdGroup: studentGroup
                },
                dataType: "text",
                success: function(data) {
                    $('#id_show').prepend("<p style='border: 1px solid #4caf50'><span class='glyphicon glyphicon-check'></span> " + studentId + " Save data successfully </p>");
                }
            })
        }
        
    });

});