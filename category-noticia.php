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

         <?php
    //Fix homepage pagination
    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }

    $temp = $wp_query;  // re-sets query
    $wp_query = null;   // re-sets query
    $args = array( 'post_type' => array('post'), 'category__in' => array(4),'orderby'=>'date', 'order'=>'DESC', 'posts_per_page' => 10, 'paged' => $paged);
    $wp_query = new WP_Query();
    $wp_query->query( $args );
    
    while ($wp_query->have_posts()) : $wp_query->the_post(); 
?>

<?php endwhile; ?>


	<div id="primary" class="content-area padd-post2">
		<div id="content" class="site-content" role="main">


                <h1 class="archive-title3"><?php printf( __( '%s', 'twentythirteen' ), single_cat_title( '', false ) ); ?></h1>
<hr />
              <ul class="media-list">
		<?php if ( have_posts() ) : ?>
					<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

                <li class="media">
                  <a href="<?php the_permalink(); ?>"  class="pull-left"><?php the_post_thumbnail( 'noticia' );?></a>
                  <div class="media-body">
                  		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="padd-content3">
		<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
		<div class="entry-thumbnail">
		</div>
		<?php endif; ?>
                    <h4 class="media-heading"><a href="<?php the_permalink(); ?>" rel="bookmark"><b><?php the_title(); ?></b></a> - <?php the_time(' Y/m/d') ?></h4>
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_excerpt(); ?></a>
                  </div>
                </li>
                <hr>


		<?php if ( is_single() ) : ?>
		<div><?php the_title(); ?></h1>

		<?php else : ?>
		<div class="padd-dist" style="padding-top:10px">
		<?php endif; // is_single() ?>

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<?php else : ?>
	</div>
	<?php endif; ?>
</article><!-- #post -->
			<?php endwhile; ?>
</ul>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>


          <div class="row">
            <div class="col-md-12">

              <?php paginate(); ?>
              

            </div>
          </div>

		
		
		</div><!-- #content -->
	</div><!-- #primary -->
	
	


<?php get_footer(); ?>
