<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

	<?php if ( is_singular( get_post_type() ) ) { ?>

		<header class="entry-header">
			<h1 class="entry-title"><?php single_post_title(); ?></h1>
			<?php echo apply_atomic_shortcode( 'entry_byline', '<div class="entry-byline">' . __( '[post-format-link] published on [entry-published] [entry-comments-link before=" | "] [entry-edit-link before=" | "]', 'celebrate' ) . '</div>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'celebrate' ) . '</span>', 'after' => '</p>' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in: "] [entry-terms before="<br/>Tagged: "]', 'celebrate' ) . '</div>' ); ?>
		</footer><!-- .entry-footer -->

	<?php } else {  
			get_the_image(array('size'=> 'full'));
		?>        
		<div class="entry-summary">
			<?php the_content( __( 'Read more &rarr;', 'celebrate' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'celebrate' ) . '</span>', 'after' => '</p>' ) ); ?>
		</div><!-- .entry-content -->

	<?php } ?>

</article><!-- .hentry -->