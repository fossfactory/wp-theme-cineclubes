<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Cineclubes
 * @since Cineclubes 1.0
 */
 
get_header(); ?>

	<div id="primary" class="content-area padd-post2">
		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Resultados da busca: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header>
		
		<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</header>

				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div>
			</article>
			<?php endwhile; ?>
			<?php else : ?>
				<header class="entry-header">
					<h3>Nenhum conteúdo encontrado</h3>
				</header>
			<?php endif; ?>
	</div>

 

<?php get_footer(); ?>

