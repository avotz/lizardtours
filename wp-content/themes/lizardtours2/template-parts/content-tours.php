<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lizardtours
 */
get_header(); 
?>
<section class="tours">
		<div class="inner">
			<div class="tours-container">
			<?php $items = $GLOBALS['wp_query']->posts;

			if ( ! $items ) {
				return;
			}
			
			 foreach ($items as $key => $item) {  
			 	$item_id = $item->id;
				$item_url = get_permalink( $item_id );
				$image_html = wp_get_attachment_image_src($item_id,'full', true);
				$price_html = "";//$item->get_price_html();
			 	?>
				<div class="tours-item">
					<div class="tours-media">
						<img src="<?php echo $image_html[0]  ?>" alt="<?php echo esc_html( $item->post->post_title ); ?>" />
						<a href="<?php echo esc_url( $item_url ); ?>" class="tours-link anchor">
							<span>Read More</span> <i class="icon-angle-right"></i>
						</a>
					</div>
					<div class="tours-info">
						<a href="<?php echo esc_url( $item_url ); ?>" class="anchor"><h3><?php echo esc_html( $item->post->post_title ); ?></h3></a>
						<?php echo $item->description; ?>
						
					</div>
					
				</div>
				<?php } ?>
			</div>
						
		</div>
		
</section>


<?php

get_footer();