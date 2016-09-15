<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package All_Paving
 */

get_header(); 

$image = get_field('front_page_hero_image');

if( !empty($image) ): ?>

	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
