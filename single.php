<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MiniLiz
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main row" role="main">
		<div class="small-12 medium-9 columns">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/blog/content', 'blog-single' );
				?>
				<div class="row">
					<div class="small-12 medium-10 columns medium-offset-2">
						<div class="row collapse nav-links" data-equalizer>
							<?php 
								$prev_link = get_previous_post_link( '%link' );
								$next_link = get_next_post_link( '%link' );
							?>

							<div class="small-12 medium-6 columns nav-previous">
								
								<?php
									if ( $prev_link ) {
								?>
									<div class="button" data-equalizer-watch>
										<div class="nav-previous-icon"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
										<?php echo $prev_link ?>
									</div>
								<?php
									}
								?>
							</div>
							<div class="small-12 medium-6 columns nav-next">
								<?php
									if ( $next_link ) {
								?>
									<div class="button" data-equalizer-watch>
										<?php echo $next_link ?>
										<div class="nav-next-icon"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
									</div>
								<?php
									}
								?>
							</div>
				    </div>
					</div>
				</div>

				<?php
				endwhile; // End of the loop.
				?>

		</div>
		<div class="small-12 medium-3 columns">
			<?php
				get_sidebar('blog');
			?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();