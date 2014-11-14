	
<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
	
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo THEMEROOT; ?>/css/jquery.bxslider.css">	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">

	<script src="<?php echo THEMEROOT; ?>/js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="<?php echo THEMEROOT; ?>/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo THEMEROOT; ?>/js/jquery.fancybox.js"></script>
	<script type="text/javascript" src="<?php echo THEMEROOT; ?>/js/jquery.fancybox-media.js?v=1.0.6"></script>
	<script type="text/javascript" src="<?php echo THEMEROOT; ?>/js/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo THEMEROOT; ?>/js/jquery.everslider.min.js"></script>
	<script type="text/javascript" src="<?php echo THEMEROOT; ?>/js/jquery.expender.js"></script>
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo THEMEROOT; ?>/js/jquery.doubleScroll.js"></script>
	<script type="text/javascript" src="<?php echo THEMEROOT; ?>/js/jquery.bxslider.js"></script>
	<script type="text/javascript" src="<?php echo THEMEROOT; ?>/js/custom.js"></script>
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f634c21af71b12"></script>
	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "ur-1fe1dd2-d31d-e959-895d-490e78109f19", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
	<script type="text/javascript">
		function googleTranslateElementInit() {
		  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'de,en,es,fr,iw,ja,la,nl,pl,ru', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
		}
	</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	<?php wp_head(); ?>
</head>
<body>
<header>
	<div class="top-header">
		<div class="container">
			<div class="row">
				<div class="leftbar">
					<div id="google_translate_element" class="google_translate"></div> 
					<script>
					(function() {
						var cx = '008099527256576458347:wbs3tvb0pcg';
						var gcse = document.createElement('script'); gcse.type = 'text/javascript';
						gcse.async = true;
						gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
						'//www.google.com/cse/cse.js?cx=' + cx;
						var s = document.getElementsByTagName('script')[0];
						s.parentNode.insertBefore(gcse, s);
					})();
					</script>
					<p style="padding-top: 10px">
						<?php _e('Holistic-Vibration - Explore a holistic approach to whole body vibration','holistic-vibration'); ?>
					</p>
				</div>
				<div class="social-links">
					
					<div class="search-box">
						<div class="search">
							<i class="fa fa-search"></i>
						</div>
						<form role="form" class="search-field">
						  	<div class="form-group">
						    	<input type="search" class="form-control" id="search" placeholder="Search">
						  	</div>
						</form>
					</div>
					<div class="rss">
						<a href="#" class="rss-feed">
							<i class="fa fa-rss"></i>
							<span>RSS</span>
						</a>
						<div class="rss-tip">
							<a class="btn-primary btn-sm" href="#">Facebook Feed</a>
							<a class="btn-primary btn-sm" href="#">Twitter Feed</a>
							<a class="btn-primary btn-sm" href="sitemap.php">Sitemap</a>
						</div>
					</div>
					<a href="#" class="contact-link">
						Contact
					</a>
					<div class="social-icon">
						<a href="#"><i class="fa fa-facebook-square"></i></a>
						<a href="#"><i class="fa fa-youtube-square"></i></a>
						<a href="#"><i class="fa fa-twitter-square"></i></a>
						<a href="#"><i class="fa fa-google-plus-square"></i></a>
						<a href="#"><i class="fa fa-linkedin-square"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<div class="main-header">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<p>10% off when you <a class="fancybox" href="<?php echo home_url(); ?>/schedule">schedule</a> or call for a free consultation 1-800-838-18125</p>
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo home_url(); ?>">
						<img src="<?php echo IMAGES ?>/logo.png" alt="<?php bloginfo('name') .'|'. bloginfo('description'); ?>">
					</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<?php 
						 wp_nav_menu(array(
						'theme_location'=>'top-menu',
						'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav">%3$s</ul>',
						));
					?>
				</div>
			</div><!-- /.container-fluid -->
		</nav>
	</div>
</header>