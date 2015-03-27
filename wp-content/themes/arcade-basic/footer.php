<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the main and #page div elements.
 *
 * @since 1.0.0
 */
$bavotasan_theme_options = bavotasan_theme_options();
?>
	</main><!-- main -->

	<footer id="footer" role="contentinfo">
		<div id="footer-content" class="container">
			<div class="row">
				<div class="copyright col-lg-12">
					<span class="pull-left"><?php printf( __( 'Copyright &copy; %s %s. All Rights Reserved.', 'arcade' ), date( 'Y' ), ' <a href="' . home_url() . '">' . get_bloginfo( 'name' ) .'</a>' ); ?></span>
					<span class="credit-link pull-right"></span>
				</div><!-- .col-lg-12 -->
			</div><!-- .row -->
		</div><!-- #footer-content.container -->
	</footer><!-- #footer -->
</div><!-- #page -->


<script src="http://www.whospanda.com/wp-content/themes/arcade-basic/fbfeed/resources/jquery.isotope.js"></script>
<script src="http://www.whospanda.com/wp-content/themes/arcade-basic/fbfeed/resources/imagesloaded.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#container').imagesLoaded( function() {
    // images have loaded
        $('#packer').isotope({
            masonry: {
                columnWidth: 320
            }
        });
    });
});
    $('#packer').isotope({ filter: '.fb-update' }, function( $items ) {
    var id = this.attr('id'),
        len = $items.length;
    });
</script>

<?php wp_footer(); ?>
</body>
</html>
