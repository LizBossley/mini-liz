<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package MiniLiz
 */
get_header(); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main row" role="main">
			<div class="small-12 columns">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title-404"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'mini-liz' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p class="not-found-intro"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'mini-liz' ); ?></p>

					<?php
						echo '<div class="small-12 columns">';
						get_search_form();
						echo '</div>';

						echo '<div class="small-12 medium-6 columns">';
						the_widget( 'WP_Widget_Recent_Posts' );
						echo '</div>';

						// Only show the widget if site has multiple categories.
						if ( mini_liz_categorized_blog() ) :
					?>

					<div class="widget widget_categories small-12 medium-6 columns">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'mini-liz' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
		
					<?php
						endif;

						/* translators: %1$s: smiley */
						echo '<div class="small-12 medium-6 columns">';
						// $archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'mini-liz' ) ) . '</p>';
						// the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

						// the_widget( 'WP_Widget_Tag_Cloud' );
						echo '</div>';
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
