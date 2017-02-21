<?php
/**
 * Tour category template.
 *
 * @author    lizardtours2
 * @package   lizardtours2
 * @version   2.0.0
 */

//lizardtours_render_template_part( 'template-parts/content-tours' );
//get_template_part( 'template-parts/content', 'tours' );

get_header('shop'); ?>

	<main class="main">
           <section class="tour-category">
                <div class="inner no-padding">
                <?php if(function_exists('rdfa_breadcrumb')){ rdfa_breadcrumb(); } ?>
                	<div class="tour-category-items nano">
                		<div class="tour-category-items-container nano-content">
	                       

	                        <?php
								while ( have_posts() ) : the_post();?>

									<div class="tour-category-item">

										<a href="<?php the_permalink(); ?>" class="tour-category-item-img-container">
											<?php if ( has_post_thumbnail() ) :

									  	 	$id = get_post_thumbnail_id($post->ID);
									  	 	$thumb_url = wp_get_attachment_image_src($id,'full', true);
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
													<div class="per-person">per person</div>
												
												<?php woocommerce_template_loop_add_to_cart(); ?>     
												<?php 

													echo apply_filters( 'woocommerce_loop_add_to_cart_link',
													    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s">%s</a>',
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
