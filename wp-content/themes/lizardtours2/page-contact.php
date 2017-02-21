<?php
/**
 Template Name: Page Contact
 */

get_header(); ?>

	<main class="main">
           <section class="contact">
                <div class="inner no-padding">
                <?php if(function_exists('rdfa_breadcrumb')){ rdfa_breadcrumb(); } ?>
                    <div class="contact__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1649.718486795047!2d-85.77333080701916!3d10.444260510196033!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x723857155e6c02f!2sLizard+Tours!5e0!3m2!1ses!2scr!4v1472930722748" width="600" height="480" frameborder="0" style="border: 0px; allowfullscreen=""></iframe>
                    </div>
                    <div class="contact__form">
                        
                        	<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'page' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.?>
                    </div>
                </div>
                
              
               
            </section>
	</main><!-- #main -->
	

<?php
/*get_sidebar();*/
get_footer();
