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

<?php $bio = get_field('front_page_bio');

if( !empty($bio) ): ?>

	<div class="bio"><?php echo $bio ?></div>

<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php
			$featured_posts = get_posts( array(
				'numberposts' => 6,
					)
				);
			var_dump($featured_posts);

			if($featured_posts) {
				foreach($featured_posts as $post) { ?>
					<h2><a href="<?php the_permalink(); ?>"><?php echo $post->post_title ?></a></h2>
					<?php if ( has_post_thumbnail() ) : ?>
				    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">		
			        <?php the_post_thumbnail('thumb-600'); ?>
				    </a>
					<?php endif; ?>
				<?php }
			}
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
