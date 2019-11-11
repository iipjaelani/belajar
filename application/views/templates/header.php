<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript">  
     <?php date_default_timezone_set('Asia/Jakarta');?>
      var serverTime = newDate(<?php print date('Y, m, d, H, i, s, 0'); ?>);
      var clientTime=newDate();   
      var Diff=serverTime.getTime()-clientTime.getTime();
      function displayServerTime(){
          var clientTime=newDate();
          var time=newDate(clientTime.getTime()+Diff);
          var sh=time.getHours().toString();
          var sm=time.getMinutes().toString();
          var ss=time.getSeconds().toString();
          document.getElementById("clock").innerHTML=(sh.length==1?"0"+sh:sh)+":"+(sm.length==1?"0"+sm:sm)+":"+(ss.length==1?"0"+ss:ss);
          
          }
      </script>
   
</head>

<body id="page-top" onload="setInterval('displayServerTime()', 1000);">
  <!-- Page Wrapper -->
   <div id="wrapper">
    