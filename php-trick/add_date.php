<?php 

$dateBorrowing = "2022-11-24";

$dateReturnfix = date('Y-m-d',strtotime($dateBorrowing.' + 7 days'));


echo 'วันที่ยืม : '.$dateBorrowing;
echo '</hr>';
echo 'กำหนดคืน : '.$dateReturnfix;

?>