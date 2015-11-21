<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php bloginfo( 'name' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/icones/favicon.ico" type="image/x-icon"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/forms-views.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fullcalendar.css" type="text/css" />




<!-- Jquery Version 2.0.3-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui.min.js"></script>

<!-- CAMPOS ESPECIAIS FORMS TYPE(DATE, HOUR)-->
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>


<!--  Bootstrap Version 3.3.4-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

<!-- Upload File-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/SimpleAjaxUploader.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/fullcalendar.min.js"></script>




<!-- Galeria Lightbox -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ekko-lightbox.min.js"></script>

<!--Plugin Calendar -->

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/calendar.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lang-calendar-all.js"></script>
 
 <?php wp_head(); ?>

</head>

<body>




    
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="row">
          <div class="collapse navbar-collapse alinhamento-superior" id="navbar-ex-collapse">
            <div class="col-md-2">
              <a class="home-link hidden-xs" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/foto00_logo.png" class="img-responsive"></a>
            </div>
            <div class="col-md-6 text-right alinhamento-superior">
              <a href="https://www.youtube.com/channel/UCshIUo6p1XlAVP4NBDaSZ0Q/feed" target="_blank"><i class="fa fa-2x fa-fw fa-youtube text-muted"></i></a>
              <a href="https://www.facebook.com/Rede-CEUs-de-Cineclubes-108610736152314/info/?tab=page_info" target="_blank"><i class="fa fa-2x fa-facebook fa-fw text-muted"></i></a>
            </div>
            <div class="col-md-4 alinhamento-superior">

              <form role="search" action="<?php echo site_url('/'); ?>" method="get">
                <div class="form-group">
                  <div class="input-group">
                    <input id="s" maxlength="120" name="s" size="15" type="text" value="" class="txt form-control" placeholder="O que você está procurando?">
                    <span class="input-group-btn">
                    <input type="submit" class="btn btn-primary" alt="Search" value="Pesquisar" />
                      
                    </span>
                  </div>
                </div>
              </form>
            </div>
            <ul class="nav navbar-nav navbar-right alinhamento-inferior">
                    <?php if (function_exists('getNavMenu')): ?>
                        <?php echo getNavMenu('principal'); ?>
                    <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    

    
