<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lizardtours2
 */

get_header(); ?>

	 <main class="main">
            <section class="intro">
                <div class="inner no-padding">
                    <div class="intro__banner">
                        <div class="cycle-slideshow" 
                            data-cycle-fx="scrollHorz"
                            data-cycle-timeout="4000"
                            data-cycle-slides=".intro__banner__slide"
                            >
                            <!-- empty element for pager links -->
                            <div class="cycle-pager intro__banner__pager"></div>

                            <div class="intro__banner__slide">
                                <img src="<?php echo get_template_directory_uri();  ?>/img/banner1.jpg">
                                 <a href="#" class="intro__banner__slide__link">Take a Look at Our Most Popular Tours</a>
                            </div>
                            <div class="intro__banner__slide">
                                <img src="<?php echo get_template_directory_uri();  ?>/img/banner2.jpg">
                                <a href="#" class="intro__banner__slide__link">Travel and tourism is the reason why we are here</a>
                            </div>
                            <div class="intro__banner__slide">
                                <img src="<?php echo get_template_directory_uri();  ?>/img/banner3.jpg">
                                 <a href="#" class="intro__banner__slide__link">Diverse Things to do</a>
                            </div>
                            <div class="intro__banner__slide">
                                <img src="<?php echo get_template_directory_uri();  ?>/img/banner4.jpg">
                                 <a href="#" class="intro__banner__slide__link">Beautiful Places</a>
                            </div>
                            
                            
                        </div>          
                    </div>
                    <div class="intro__featured">
                        <h1 class="intro__featured__title">Our Tours</h1>
                        <div id="scroll-down">
                            <a href="#"><i class="fa fa-angle-down"></i></a>
                            <small>Scroll Down</small>
                        </div>
                        <div class="nano" style="height: 615px;">
                            <div class="nano-content">
                        <?php $categories = get_terms( array(
					            'taxonomy' => 'tour_category',
					            'hide_empty' => false,
					            'number' => 9,
                                /*'slug' => ['buggy-tours','bike-golf-cart-and-equipment-rentals','fishing-tours','zip-line','catamaran','volcano-parks','surfing-paddle-board']*/
					            
					        ) );
					  
					     foreach ($categories as $key => $category) {  ?>
							 <article class="intro__featured__item">
	                            <div class="intro__featured__item__img">
	                                <img src="<?php echo get_template_directory_uri();  ?>/img/featured/<?php echo $category->slug; ?>.jpg" alt="<?php echo $category->name; ?>">
	                            </div>
	                            <span class="intro__featured__item__title"><?php echo $category->name; ?></span>
	                            <a class="intro__featured__item__link" href="./tour-category/<?php echo $category->slug; ?>"></a>
	                        </article>
							
							<?php } ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
              
               
            </section>
           
        </main>

<?php

get_footer();
