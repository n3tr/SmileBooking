<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    
    <?php echo link_tag('css/bootstrap.css'); ?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse">
            <ul class="nav">
              <?php if ($this->session->userdata('is_admin') == TRUE): ?>
               <li class="active"><?php echo anchor('booking/show',"Reverse Manager");?></li>
                <li class="active"><?php echo anchor('order/form',"Order Manager");?></li>
                <li class="active"><?php echo anchor('adminpanel/formfood',"Add Food");?></li>
                <li class="active"><?php echo anchor('adminpanel/formtype',"Add Type");?></li>
                 <li class="active"><?php echo anchor('adminpanel/managecus',"Manage Customer");?></li>
                 <li class="active"><?php echo anchor('adminpanel/formtable',"Table");?></li>


              <?php else: ?>
                 <li class="active"><?php echo anchor('adminpanel/login',"Login");?></li>
                
              <?php endif ?>
             
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <?php if(isset($title)) :?>

      <h2><?php echo $title ?></h2>

    <?php endif?>
     

   

    