<!doctype html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Oswald:400,700|Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
	<title><?php wp_title('&#124;', true, 'right'); ?></title>

	<?php wp_head(); ?>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300,400italic' rel='stylesheet' type='text/css'>
	<script>
	(function(d) {
		var config = {
		kitId: 'utp2fca',
		scriptTimeout: 3000,
		async: true
		},
		h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	})(document);
	</script>
</head>
<body <?php body_class(); ?> id="top">
<?php get_template_part( 'inc', 'edit' ); ?>
<header>
	<div class="wrap">
		<a href="/" class="logo"></a>
		<nav>
			<?php wp_nav_menu( array( 'container'=> false, 'menu_class'=> 'main', 'menu_id'=> 'main-nav', 'theme_location' => 'main' ) ); ?>
		</nav>
		<div class="search">
			<i class="fa fa-search" aria-hidden="true"></i>
			<form action="<?php bloginfo('url'); ?>/" method="get" id="search-site">
				<input id="s" name="s" type="search" placeholder="site search">
				<button type="submit"></button>
			</form>
		</div>
	</div>
	<div class="mobile-nav">
		<a href="javascript:void(0)" class="icon">
			<div class="hamburger">
				<div class="menui top-menu"></div>
				<div class="menui mid-menu"></div>
				<div class="menui bottom-menu"></div>
			</div>
		</a>
		<div class="mobile-logo"></div>
		<?php wp_nav_menu( array( 'container'=> false, 'menu_class'=> 'mobile-menu', 'menu_id'=> 'mobile-nav', 'theme_location' => 'main' ) ); ?>

	</div>
</header>
