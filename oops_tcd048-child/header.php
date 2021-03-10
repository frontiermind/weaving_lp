<?php
$options = get_desing_plus_option();
$header_fix = $options['header_fix']; // ヘッダーバーの表示位置
$mobile_header_fix = $options['mobile_header_fix']; // ヘッダーバーの表示位置（スマホ）
$header_class = '';
	if ( wp_is_mobile() ) {
		if ( 'type2' == $mobile_header_fix ) { 
			$header_class .= ' is-fixed is-active'; 
		}
	} else {
		if ( is_front_page() ) {
			$header_class .= ' l-header--large'; 
		}
		if ( 'type2' == $header_fix ) { 
			$header_class .= ' is-fixed'; 
		}
	}
?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head<?php if ( $options['use_ogp'] ) { echo ' prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#"'; } ?>>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="description" content="<?php seo_description(); ?>">
<meta name="viewport" content="width=<?php echo is_no_responsive() ? '1280' : 'device-width'; ?>">
<title>株式会社Weaving - お客様の利益を創造し、関わる企業・人に"ポジティブ"を循環し続ける</title>
<link rel='icon' href="http://weaving-lp.dev-fmc.tokyo/wp-content/uploads/2020/12/cropped-icon@2x-32x32-1.png" >
<?php if ( $options['use_ogp'] ) { ogp(); } ?>
<?php wp_head(); ?>
</head>
<body>


<?php if ($options['use_load_icon']) : ?>
<div id="site_loader_overlay">
	<div id="site_loader_animation" class="c-load--<?php echo esc_attr( $options['load_icon'] ); ?>">
		<?php if ( 'type3' === $options['load_icon'] ) : ?>
  	<i></i><i></i><i></i><i></i>
		<?php endif; ?>
 	</div>
</div>
<div id="site_wrap">
<?php endif; ?>

<!-- ここからヘッダー -->
<header id="js-header" class="l-header<?php echo esc_attr( $header_class ); ?>">
	<div class="l-header__inner">
		<div class="l-header__top">
		<!-- ↓↓ headerロゴ関係 ↓↓ -->
			<?php
				if(is_front_page()){ $thisTag = 'h1'; }else{ $thisTag = 'div'; }
				if ( wp_is_mobile() ) : 
				if ( $options['header_logo_image_mobile'] ) :
			?>
			<<?php echo $thisTag; ?> class="p-logo l-header__logo
				<?php if ( $options['header_logo_image_mobile_retina'] ) {echo ' l-header__logo--retina'; } ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo wp_get_attachment_url( $options['header_logo_image_mobile'] ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
			</<?php echo $thisTag; ?>>

			<?php else : ?>

			<<?php echo $thisTag; ?> class="l-header__logo p-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="font-size: <?php echo esc_attr( $options['logo_font_size_mobile'] ); ?>px;"><?php bloginfo( 'name' ); ?></a>
			</<?php echo $thisTag; ?>>

			<?php
				endif;
				else : 
				if ( $options['header_logo_image'] ) :
			?>
			<<?php echo $thisTag; ?> class="p-logo l-header__logo<?php if ( $options['header_logo_image_retina'] ) { echo ' l-header__logo--retina'; } ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo wp_get_attachment_url( $options['header_logo_image'] ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
			</<?php echo $thisTag; ?>>
			<?php 
				else :
			?>
			<<?php echo $thisTag; ?> class="p-logo l-header__logo l-header__logo--text">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="font-size: <?php echo esc_attr( $options['logo_font_size'] ); ?>px;"><?php bloginfo( 'name' ); ?></a>
			</<?php echo $thisTag; ?>>
			<?php
				endif;
				endif; 
			?>
			<!-- ↑↑ headerロゴ関係 ↑↑ -->

			<!-- ↓↓ header・提携パートナー募集 ↓↓ -->
			<div class="header-name">
				<!-- <a href="https://weaving-co.jp/" target=”_blank”> -->
					<span class="header-name_btn">提携パートナー募集</span>
				<!-- </a> -->
			</div>
			<!-- ↑↑ header・提携パートナー募集 ↑↑ -->

			<!-- ↓↓ header・TEL ↓↓ -->
			<div class="header-tel">
				<div class="view-pc">
					<span class="text-01"><a href="tel:0120-264-093">0120-264-093</a></span>
					<div class="text-02">
						<span class="text-02-01">受付時間</span>9:00～18:00 
						<span class="text-02-02">土日祝除く</span>
					</div>
				</div>
				<div class="view-sp">
					<a href="tel:0120-264-093"></a>
				</div>
			</div>
			<!-- ↑↑ header・TEL ↑↑ -->
			<!-- ↓↓ header・お問い合わせ ↓↓ -->
			<div class="header-contact">
				<a href="https://weaving-co.jp/dairiten/#cb_9"></a>
			</div>
			<!-- ↑↑ header・お問い合わせ ↑↑ -->
		</div>

		<!-- ↓↓ header・nav関係 ↓↓ -->
		<?php
			if ( is_front_page() ) :
			if ( has_nav_menu( 'global_front' ) ) : 
		?>

		<a href="#" id="js-menu-button" class="p-menu-button c-menu-button"></a>
		<?php
			wp_nav_menu( array(
				'container' => 'nav',
				'menu_class' => 'p-global-nav u-clearfix',
				'menu_id' => 'js-global-nav',
				'theme_location' => 'global_front',
				'link_after' => '<span></span>'
			) );
			endif;
			else :
			if ( has_nav_menu( 'global_sub' ) ) : 
		?>

		<a href="#" id="js-menu-button" class="p-menu-button c-menu-button"></a>
		<?php
			wp_nav_menu( array(
				'container' => 'nav',
				'menu_class' => 'p-global-nav u-clearfix',
				'menu_id' => 'js-global-nav',
				'theme_location' => 'global_sub',
				'link_after' => '<span></span>'
			) );
			endif;
			endif;
		?>
		<!-- ↑↑ header・nav関係 ↑↑ -->

		</div>
</header>
