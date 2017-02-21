<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lizardtours2
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
 <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="header">
        <div class="header__top">
            <div class="inner no-padding">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header__logo"><img src="<?php echo get_template_directory_uri();  ?>/img/logo-long-blue.png" alt="Lizard Tours" class="header__logo__img" /><span>Playa Flamingo - Potrero</span></a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header__logo__small"><img src="<?php echo get_template_directory_uri();  ?>/img/logo.png" alt="Lizard Tours" class="header__logo__img" /><span>Playa Flamingo - Potrero</span></a>

                <div class="header__top__info">
                    <a href="https://www.facebook.com/lizard.tour" class="header__top__info__link" target="_blank"><i class="icon-facebook"></i><span>Facebook</span></a>
                    <a href="https://www.tripadvisor.com.mx/Attraction_Review-g309244-d8471008-Reviews-Lizard_Tours-Playa_Flamingo_Province_of_Guanacaste.html" class="header__top__info__link" target="_blank"><i class="icon-tripadvisor"></i> <span>tripAdvisor</span></a>
                    <a href="#request-popup" class="header__top__info__link request-popup-link"><i class="icon-email"></i> <span>Request</span></a>
                    <a href="tel:8833-8942" class="header__top__info__link"><i class="icon-ring_volume"></i> <span>+(506) 2654 5800</span></a>
                    
                </div>
                
            </div>
        </div>
        <div class="inner no-padding">
            <?php wp_nav_menu( array(
                     'theme_location' => 'primary',
                     'menu_id' => 'primary-menu',
                     'container'       => 'nav',
	                'container_class' => 'header__menu',
	                'container_id'    => '',
	                'menu_class'      => 'header__menu__ul',
                      ) 
                  ); 
                  ?>
           
            
        </div>
        <div class="header__btn-menu__container">
            <span>Menu</span>
            <button id="btn-menu" class="header__btn-menu"><i class="icon-menu"></i></button>
            
        </div>
    
</header>
