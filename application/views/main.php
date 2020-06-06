<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $icon; ?>" />

    <title><?=$site['name_app']." &mdash; ".$c_judul; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '<?php echo base_url();?>'
      });
    </script>
    <style type="text/css">
        .card-body
        .sectionRow {
        padding: 16px 0;
        }
        .boxDivider {
        border-bottom: 1px solid #dce1e8;
        margin: 0 -14px;
        }
    </style>
    <!-- Dashboard Core -->
    <link href="<?php echo base_url();?>assets/css/dashboard.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>assets/js/dashboard.js"></script>
    <!-- Datatables Plugin -->
    <script src="<?php echo base_url();?>assets/plugins/datatables/plugin.js"></script>
    
    <!-- Alert -->
    <script src="<?php echo base_url();?>assets/js/alert.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/notify/plugin.js"></script>

    <script>
    require(['datatables', 'jquery'], function(datatable, $) {
        $('.datatable').DataTable();
    });
    </script>

</head>
<body>
    <div class="page">
      <div class="flex-fill">

        <div class="header py-4" style="background-color: #467fcf;">
            <!-- Container header -->
            <?php $this->view('base/header'); ?>
            <!-- End header -->
        </div>

        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
            <!-- Container Nav Menu -->
            <?php $this->view('base/nav'); ?>
            <!-- End menu --> 
        </div>

        <div class="my-3 my-md-5">
            <!-- Container contents-->
            <?=$contents; ?>
            <!-- End Contents -->
        </div>

      </div>
      <div class="footer">
            <!-- Container footer -->
            <?php $this->view('base/foot'); ?>
            <!-- End Footer -->
      </div>
    </div>
</body>
</html>