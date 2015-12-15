<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>The GamingPlace</title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/custom.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">The GamingPlace</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
                <?php if(!$this->session->userdata('logged_in')) : ?>
                <li><a href="<?php echo base_url();?>users/register">Create Account</a></li>
                <?php endif;?>
            </ul>
            <?php if(!$this->session->userdata('logged_in')) : ?>
            <form class="navbar-form navbar-right" method="post" action="<?php echo base_url();?>users/login">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" />
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                </div>
                <button name="submit" type="submit" class="btn btn-default">Login</button>
            </form>
            <?php else : ?>
            <form class="navbar-form navbar-right" method="post" action="<?php echo base_url();?>users/logout">
                <button name="submit" type="submit" class="btn btn-default">Logout</button>
            </form>
            <?php endif;?>
        </div><!-- /.navbar-collapse -->
    </div>
</div><!-- /.navbar -->

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php $this->load->view('sidebar');?>
        </div>