<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MiniLiz
 */

?>
<div class="row">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="small-12 medium-2 columns">
			<?php
			if ( 'post' === get_post_type() ) : ?>
				<div class="date">
					  <?php $date = explode (' ', get_the_date( 'j M Y' ));//print_r ($date); ?>
            <div class="day"><?php echo( $date[0] ) ?></div>
            <div class="month-year">
            	<span class="month"><?php echo( $date[1] ) ?></span>
            	<span class="year"><?php echo( $date[2] ) ?></span>
            </div>
				</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</div>
		<div class="small-12 medium-10 entry-wrapper columns">
			<header class="entry-header">
					<?php
					if ( is_single() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php mini_liz_entry_categories(); ?>
					</div><!-- .entry-meta -->
					<?php
					endif; ?>
				</header><!-- .entry-header -->

		<div class="entry-content">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'mini-liz' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mini-liz' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		<footer class="entry-footer">
			<?php mini_liz_entry_footer(); ?>
		</footer><!-- .entry-footer -->
		</div>
	</article><!-- #post-## -->
</div>