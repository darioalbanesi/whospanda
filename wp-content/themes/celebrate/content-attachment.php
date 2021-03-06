<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

	<?php if ( is_singular( get_post_type() ) ) { ?>

		<header class="entry-header">
			<h1 class="entry-title"><?php single_post_title(); ?></h1>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php hybrid_attachment(); // Function for handling non-image attachments. ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'celebrate' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'celebrate' ) . '</span>', 'after' => '</p>' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( 'Published on [entry-published] [entry-edit-link before="| "]', 'celebrate' ) . '</div>' ); ?>
		</footer><!-- .entry-footer -->

	<?php } else { 
			get_the_image(array('size'=> 'full'));
		?>
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '">', '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image(); ?>
			<?php the_excerpt(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'celebrate' ) . '</span>', 'after' => '</p>' ) ); ?>
		</div><!-- .entry-summary -->

	<?php } ?>

</article><!-- .hentry -->