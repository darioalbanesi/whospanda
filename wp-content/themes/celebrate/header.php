<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<title><?php hybrid_document_title(); ?></title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    	<link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic' rel='stylesheet' type='text/css'>
        
		<link rel="stylesheet" href="http://www.whospanda.com/wp-content/themes/celebrate/fbfeed/css/base.css" />
		<link rel="stylesheet" href="http://www.whospanda.com/wp-content/themes/celebrate/fbfeed/css/style.css" />


<?php wp_head(); // wp_head ?>


</head>

<body class="<?php hybrid_body_class(); ?>">
	<div id="container">
		<header id="header">
			<hgroup id="branding">
				<h1 id="site-title"><a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup><!-- #branding -->
		</header><!-- #header -->
		<?php get_template_part( 'menu', 'primary' ); // Loads the menu-primary.php template. ?>
		<div id="main">		