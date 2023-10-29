<?php

$xmlDoc = new DOMDocument();
$xmlDoc->load("links.xml");

$x= $xmlDoc->getElementsByTagName('link');

//get the q parameter from URL
$search = $_GET["search"];

//lookup all links from the xml file if length of q>0
if (strlen($search)>0) {

  $hint = "";
  
  for($i=0; $i<($x->length); $i++) {
    $y = $x->item($i)->getElementsByTagName('title');
    $z = $x->item($i)->getElementsByTagName('url');

    if ($y->item(0)->nodeType==1) {

      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$search)) {
        if ($hint == "") {

          $hint = "<a style='background-color:#fff; text-decoration:none; padding:10px;' class='dropdown-item text-success' href='" . $z->item(0)->childNodes->item(0)->nodeValue . "' target='_blank'>" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";

        } else {

          $hint = $hint . "<a style='background-color:#fff; text-decoration:none; padding:10px;' class='dropdown-item text-success' href='" . $z->item(0)->childNodes->item(0)->nodeValue . "' target='_blank'>" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint == "") {
  $response = "<span style='background-color:#fff;' class='text-danger'>การค้นหา " . $search . " ไม่พบข้อมูล</span>";
} else {
  $response = $hint;
}

//output the response
echo $response;
?>