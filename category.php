<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>



	<div id="primary" class="content-area padd-post2">
	
		<div id="content" class="site-content" role="main">
		

                <h1 class="archive-title3"><?php printf( __( '%s', 'twentythirteen' ), single_cat_title( '', false ) ); ?></h1>
                        
                        
		<?php if ( have_posts() ) : ?>


			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="padd-content3">
		<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail( 'capamenor' );?>
		</div>
		<?php endif; ?>

		
		<?php if ( is_single() ) : ?>
		<div><?php the_title(); ?></h1>

		<?php else : ?>
		<div class="padd-dist" style="padding-top:10px">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		<?php endif; // is_single() ?>

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	
		<?php the_excerpt(); ?>
	
	<?php else : ?>
	
	
	</div>
	<?php endif; ?>
</article><!-- #post -->
			
			<?php endwhile; ?>


		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	
	


<?php get_footer(); ?>