<?php
/**
 * Tour category template.
 *
 * @author    Themedelight
 * @package   Themedelight/AdventureTours
 * @version   1.0.0
 */

//lizardtours_render_template_part( 'template-parts/content-tours' );
//get_template_part( 'template-parts/content', 'tours' );

get_header(); 
 $categories = get_terms( array(
            'taxonomy' => 'tour_category',
            'hide_empty' => false
            
        ) );

$categorySelected = get_terms( array(
            'taxonomy' => 'tour_category',
            'hide_empty' => false,
            'slug' => get_query_var('tour_category')
            
        ) );

?>
	<main class="main">
           <section class="tour-category">
                <div class="inner no-padding">
                <?php if(function_exists('rdfa_breadcrumb')){ rdfa_breadcrumb(); } ?>
                	<h3 class="tour-category-title"><?php echo $categorySelected[0]->name ?></h3>
                	<input type="hidden" id="selectedCategory" name="selectedCategory" value="<?php echo $categorySelected[0]->slug ?>">
                	
                	<div class="tour-category-items nano">
                		<div class="tour-category-items-container nano-content">
	                        <?php
								while ( have_posts() ) : the_post();
 
								?>

									<div class="tour-category-item">

										<a href="<?php the_permalink(); ?>" class="tour-category-item-img-container">
											<?php if ( has_post_thumbnail() ) :

									  	 	$id = get_post_thumbnail_id($post->ID);
									  	 	$thumb_url = wp_get_attachment_image_src($id,'large', true);
									  	 	?>
									    	
											<div class="tour-category-item-img" style="background-image: url('<?php echo $thumb_url[0] ?>');"></div>
														
										<?php endif; ?>
										</a>
										<div class="tour-category-item-info">
											<div class="tour-category-item-summary">
												
												<h2 class="tour-category-item-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>
												
												<?php echo limit_words(get_the_excerpt(), '38'); ?>
											</div>
											<div class="tour-category-item-prices">
											  
											  
													 
											  <?php
											  	/*$product = new WC_Product( $post->ID );*/?>
											  
												
												    <?php $product = new WC_Product( $post->ID ); 
												    	/*echo $product->get_price_html();*/
												    	
												    woocommerce_template_loop_price(); 
												    ?>
													 
													<?php if($post->ID != 491 && $post->ID != 473) :?>
														<div class="per-person">per adult</div>
													<?php endif ?>

													<?php /*echo $product->get_price_html(); */?>
													<div class="per-person"><?php echo get_post_meta( get_the_ID(), 'custom_price_label', true ); ?><br><?php echo get_post_meta( get_the_ID(), 'custom_price_individual', true ); ?></div>
													
												
												<?php woocommerce_template_loop_add_to_cart(); ?>     
												<?php 
													$product = new WC_Product( $post->ID );
													echo apply_filters( 'woocommerce_loop_add_to_cart_link',
													    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s readmore">%s</a>',
													        esc_url( $product->add_to_cart_url() ),
													        esc_attr( $product->id ),
													        esc_attr( $product->get_sku() ),
													        $product->is_purchasable() ? 'add_to_cart_button' : '',
													        esc_attr( $product->product_type ),
													        esc_html( $product->add_to_cart_text() )
													    ),
													$product );
												 ?>
											</div>
											
										</div>
										
									</div>
								
								<?php

									

								endwhile; // End of the loop.?>
								<?php
									/**
									 * woocommerce_after_shop_loop hook.
									 *
									 * @hooked woocommerce_pagination - 10
									 */
									do_action( 'woocommerce_after_shop_loop' );
								?>
	                    </div>
                	</div>
                    
                    <div class="tour-category-form-request">
                        
                        	<?php get_sidebar('right-page'); ?>
                        	
                    </div>
                </div>
                
              
               
            </section>
	</main><!-- #main -->
	

<?php
/*get_sidebar();*/
get_footer();

