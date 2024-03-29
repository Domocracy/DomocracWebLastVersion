<?php if ( ! isset( $_SESSION ) ) session_start(); ?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<a href="https://plus.google.com/103107082212820767885" rel="publisher">Google+</a>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php elegant_titles(); ?></title>
	<?php elegant_description(); ?>
	<?php elegant_keywords(); ?>
	<?php elegant_canonical(); ?>

	<?php do_action( 'et_head_meta' ); ?>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php $template_directory_uri = get_template_directory_uri(); ?>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( $template_directory_uri . '/js/html5.js"' ); ?>" type="text/javascript"></script>
	<![endif]-->

	<script type="text/javascript">
		document.documentElement.className = 'js';
	</script>

	<?php wp_head(); ?>
</head>

<!-- Definition of header -->

<!-- Create main container -->
<body <?php body_class(); ?>>
	<div id="page-container">
	
<!-- Load information to use in the header -->
<?php
	if ( is_page_template( 'page-template-blank.php' ) ) {
		return;
	}

	$et_secondary_nav_items = et_divi_get_top_nav_items();

	$et_phone_number = $et_secondary_nav_items->phone_number;

	$et_email = $et_secondary_nav_items->email;

	$et_contact_info_defined = $et_secondary_nav_items->contact_info_defined;

	$show_header_social_icons = $et_secondary_nav_items->show_header_social_icons;

	$et_secondary_nav = $et_secondary_nav_items->secondary_nav;

	$primary_nav_class = 'et_nav_text_color_' . et_get_option( 'primary_nav_text_color', 'dark' );

	$secondary_nav_class = 'et_nav_text_color_' . et_get_option( 'secondary_nav_text_color', 'light' );

	$et_top_info_defined = $et_secondary_nav_items->top_info_defined;
?>
<!-- -------------------------------------------------------------------------------------------------------------- -->
<!-- Creation of headers -->
<!-- -------------------------------------------------------------------------------------------------------------- -->
<?php if ( $et_top_info_defined ) : ?>
<!-- -------------------------------------------------------------------------------------------------------------- -->
<!-- If there is info about top header, get that info and start it's construction -->
<!-- -------------------------------------------------------------------------------------------------------------- -->
	<div id="top-header" class="<?php echo esc_attr( $secondary_nav_class ); ?>">
	</div> <!-- #top-header -->
<?php endif; // true ==== $et_top_info_defined ?>

	<header id="main-header" class="<?php echo esc_attr( $primary_nav_class ); ?>">
		<div class="container clearfix">
		<?php
			$logo = ( $user_logo = et_get_option( 'divi_logo' ) ) && '' != $user_logo
				? $user_logo
				: $template_directory_uri . '/images/logo.png';
		?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo esc_attr( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" id="logo" />
			</a>
<!-- -------------------------------------------------------------------------------------------------------------- -->
<!-- Container with both primary and secondary menus -->
<!-- -------------------------------------------------------------------------------------------------------------- -->
			<div id="et-top-navigation">

<!-- -------------------------------------------------------------------------------------------------------------- -->
<!-- navigation for primary menu -->
<!-- -------------------------------------------------------------------------------------------------------------- -->
				<nav id="top-menu-nav">
				<?php
					$menuClass = 'nav primary';
					if ( 'on' == et_get_option( 'divi_disable_toptier' ) ) $menuClass .= ' et_disable_top_tier';
					$primaryNav = '';
					
					
					$primaryNav = wp_nav_menu( 
											array( 	'theme_location' => 'primary-menu', 
													'container' 		=> '', 
													'fallback_cb' 		=> '', 
													'menu_class' 		=> $menuClass, 
													'menu_id' 			=> 'top-menu', 
													'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
													'echo' 				=> false ) );
					
					if ( '' == $primaryNav ) :
				?>
					<ul id="top-menu" class="<?php echo esc_attr( $menuClass ); ?>">
						<?php if ( 'on' == et_get_option( 'divi_home_link' ) ) { ?>
							<li <?php if ( is_home() ) echo( 'class="current_page_item"' ); ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'Divi' ); ?></a></li>
						<?php }; ?>

						<?php show_page_menu( $menuClass, false, false ); ?>
						<?php show_categories_menu( $menuClass, false ); ?>
					</ul>
				<?php
					else :
						echo( $primaryNav );
					endif;
				?>
				</nav>
				
<!-- -------------------------------------------------------------------------------------------------------------- -->
<!-- navigation for secondary menu -->
<!-- -------------------------------------------------------------------------------------------------------------- -->
				<nav id="top-menu-nav">
				<?php
					$menuClass = 'nav secondary';
					if ( 'on' == et_get_option( 'divi_disable_toptier' ) ) $menuClass .= ' et_disable_top_tier';
					$secondaryNav = '';
					$secondaryNav = wp_nav_menu( 
											array( 	'theme_location' 	=> 'secondary-menu', 
													'container' 		=> '', 
													'fallback_cb' 		=> '', 
													'menu_class' 		=> $menuClass, 
													'menu_id' 			=> 'top-menu', 
													'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
													'echo' 				=> false ) );
					
					if ( '' == $secondaryNav ) :
				?>
					<ul id="top-menu" class="<?php echo esc_attr( $menuClass ); ?>">
						<?php if ( 'on' == et_get_option( 'divi_home_link' ) ) { ?>
							<li <?php if ( is_home() ) echo( 'class="current_page_item"' ); ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'Divi' ); ?></a></li>
						<?php }; ?>

						<?php show_page_menu( $menuClass, false, false ); ?>
						<?php show_categories_menu( $menuClass, false ); ?>
					</ul>
				<?php
					else :
						echo( $secondaryNav );
					endif;
				?>
				</nav>
				
				<?php
				if ( ! $et_top_info_defined ) {
					et_show_cart_total( array(
						'no_text' => true,
					) );
				}
				?>
				<!-- End of secondary menu -->
				
				<?php if ( false !== et_get_option( 'show_search_icon', true ) ) : ?>
				<div id="et_top_search">
					<span id="et_search_icon"></span>
					<form role="search" method="get" class="et-search-form et-hidden" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php
						printf( '<input type="search" class="et-search-field" placeholder="%1$s" value="%2$s" name="s" title="%3$s" />',
							esc_attr_x( 'Search &hellip;', 'placeholder', 'Divi' ),
							get_search_query(),
							esc_attr_x( 'Search for:', 'label', 'Divi' )
						);
					?>
					</form>
				</div>
				<?php endif; // true === et_get_option( 'show_search_icon', false ) ?>

				<!-- This method call the function attached to et_header_top, it creates the compact menu for mobiles -->
				<?php do_action( 'et_header_top' ); ?> 
				
			</div> <!-- #et-top-navigation -->
		</div> <!-- .container -->
	</header> <!-- #main-header -->

	<div id="et-main-area">