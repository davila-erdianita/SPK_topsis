<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>SPK TOPSIS</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      #card-title {
        color: blue;
        font-weight: bold;
      }

      .nav-link:hover{
        background-color:#1E90FF;/*#de2eba*/
        font-size: 17px;
        color: #fff;
      }


      th{
        width: 10%;
        background-color: #4682B4;
        color: white;
      }

      label{
        /*font-weight: bold;*/
        font-size: 1.150rem;
      }

    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/dashboard.css" rel="stylesheet">
  </head>
    <body>
    <nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color: #6495ED">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" style="background-color: #6495ED" href="#">SPK TOPSIS</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
</nav>

<div class="container-fluid" style="background-color: #F5F5F5">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color:#4169E1">
      <div class="sidebar-sticky pt-3" >
        <ul class="nav flex-column" style="color: white;font-weight:bolder;font-size: 15px;">
          <li class="nav-item">
            <a class="nav-link text-black-50" href="<?=base_url()?>dashboard">
              <span data-feather="home"></span>
             Dashboard <span class="sr-only"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black-50" href="<?=base_url()?>data-alternatif">
              <span data-feather="file"></span>
              Data Alternatif
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black-50" href="<?=base_url()?>data-kriteria">
              <span data-feather="shopping-cart"></span>
              Data Kriteria
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black-50" href="<?=base_url()?>data-penilaian">
              <span data-feather="users"></span>
             Data Penilaian
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black-50" href="perhitungan">
              <span data-feather="bar-chart-2"></span>
              Data Perhitungan
            </a>
          </li>
 
        </ul>

        
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?=$judul;?></h1>
      </div>


      