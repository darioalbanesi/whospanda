			<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>


        </div><!-- #main -->

        <footer id="footer">

            <div class="wrap">

                <div class="footer-content">
                    <?php do_atomic( 'footer' ); // hybrid_footer ?>
                </div><!-- .footer-content -->

            </div>

        </footer><!-- #footer -->

    </div><!-- #container -->

 <script src="http://www.whospanda.com/wp-content/themes/celebrate/fbfeed/resources/jquery.isotope.js"></script>
  <script src="http://www.whospanda.com/wp-content/themes/celebrate/fbfeed/resources/imagesloaded.js"></script>




<script type="text/javascript">
$(document).ready(function() {
	$('#container').imagesLoaded( function() {
  // images have loaded

		$('#packer').isotope({
		  masonry: {
			columnWidth: 290
		  }
		});
	});
});
</script>

<script>
	$('#packer').isotope({ filter: '.fb-update' }, function( $items ) {
	  var id = this.attr('id'),
		  len = $items.length;
	  console.log( 'Isotope has filtered for ' + len + ' items in #' + id );
	});
</script>

	<?php wp_footer(); // wp_footer ?>
</body>
</html>
