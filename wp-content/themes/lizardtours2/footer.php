<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lizardtours2
 */

?>
<footer class="footer">
    <div class="inner">
        <div class="footer__partner">
           
            <a href="#" class="footer__partner__link" title="Lizard Tours"><img src="<?php echo get_template_directory_uri();  ?>/img/logo.png" /></a>
            <div class="counter">
                <a href="https://info.flagcounter.com/PeG5"><img src="https://s10.flagcounter.com/countxl/PeG5/bg_D1DCFF/txt_305EC9/border_6388FF/columns_2/maxflags_10/viewers_0/labels_0/pageviews_0/flags_0/percent_0/" alt="Flag Counter" border="0"></a>
            </div>
            <span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=cgu0f8z4fS3l0empwLV86fXxGhaw2qHKHlCg6bMe3E9nfotCuhL2CY9IVuTE"></script></span>
        </div>
        
        <div class="footer__social">
             <a href="https://www.facebook.com/lizard.tour" class="footer__social__link" target="_blank"><i class="icon-facebook"></i></a>
             <a href="https://twitter.com/lizard_tours" class="footer__social__link" target="_blank"><i class="icon-twitter"></i></a>
             <a href="https://plus.google.com/u/0/101773595494694736850" class="footer__social__link" target="_blank"><i class="icon-google-plus"></i></a>
             <a href="https://www.instagram.com/lizardtours/" class="footer__social__link" target="_blank"><i class="fa fa-instagram"></i></a>
             <a href="https://www.tripadvisor.com.mx/Attraction_Review-g309244-d8471008-Reviews-Lizard_Tours-Playa_Flamingo_Province_of_Guanacaste.html" class="footer__social__link" target="_blank"><i class="fa fa-tripadvisor"></i></a>
             
        </div>
       
        <div class="footer__copyright">
            <p>Copyright &copy; <a href="http://avotz.com"><i class="icon-avotz"></i></a></p>
        </div>
    </div>
</footer>
<div id="request-popup" class="request-popup white-popup mfp-hide mfp-with-anim">               
    <?php echo do_shortcode('[contact-form-7 id="583" title="Request Booking 2"]') ?>
</div>
<?php wp_footer(); ?>
</body>
</html>
