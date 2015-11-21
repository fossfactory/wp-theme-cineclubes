<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

    <div class="section">
      <div class="container">
        <div class="row">
          <div>
            <div id="carousel-example" data-interval="5000" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
			<div class="item active">
			<?php $myquery = new WP_Query( 'category_name=slider&posts_per_page=1' ); ?>
			<?php if ($myquery->have_posts()) : while ($myquery->have_posts()) : $myquery->the_post(); ?>
			<?php if (has_post_thumbnail( $post->ID )): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<?php the_post_thumbnail( 'slider' );?>
			<?php endif; ?>
			<div class="carousel-caption">
			<h3 class="text-center"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<?php the_excerpt();?>
			</div>

			<?php endwhile; endif;
			wp_reset_query(); ?>
			</div>

			<div class="item">
			<?php $myquery = new WP_Query( 'category_name=slider&posts_per_page=1&offset=1' ); ?>
			<?php if ($myquery->have_posts()) : while ($myquery->have_posts()) : $myquery->the_post(); ?>
			<?php if (has_post_thumbnail( $post->ID )): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<?php the_post_thumbnail( 'slider' );?>
			<?php endif; ?>
			<div class="carousel-caption">
			<h3 class="text-center"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<?php the_excerpt();?>
			</div>
			<?php endwhile; endif;
			wp_reset_query(); ?>
			</div>

			<div class="item">
			<?php $myquery = new WP_Query( 'category_name=slider&posts_per_page=1&offset=2' ); ?>
			<?php if ($myquery->have_posts()) : while ($myquery->have_posts()) : $myquery->the_post(); ?>
			<?php if (has_post_thumbnail( $post->ID )): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<?php the_post_thumbnail( 'slider' );?>
			<?php endif; ?>
			<div class="carousel-caption">
			<h3 class="text-center"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<?php the_excerpt();?>
			</div>
			<?php endwhile; endif;
			wp_reset_query(); ?>
			</div>

                        <div class="item">
                        <?php $myquery = new WP_Query( 'category_name=slider&posts_per_page=1&offset=3' ); ?>
                        <?php if ($myquery->have_posts()) : while ($myquery->have_posts()) : $myquery->the_post(); ?>
                        <?php if (has_post_thumbnail( $post->ID )): ?>
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                        <?php the_post_thumbnail( 'slider' );?>
                        <?php endif; ?>
                        <div class="carousel-caption">
                        <h3 class="text-center"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                        <?php the_excerpt();?>
                        </div>
                        <?php endwhile; endif;
                        wp_reset_query(); ?>
                        </div>

                        <div class="item">
                        <?php $myquery = new WP_Query( 'category_name=slider&posts_per_page=1&offset=4' ); ?>
                        <?php if ($myquery->have_posts()) : while ($myquery->have_posts()) : $myquery->the_post(); ?>
                        <?php if (has_post_thumbnail( $post->ID )): ?>
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                        <?php the_post_thumbnail( 'slider' );?>
                        <?php endif; ?>
                        <div class="carousel-caption">
                        <h3 class="text-center"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                        <?php the_excerpt();?>
                        </div>
                        <?php endwhile; endif;
                        wp_reset_query(); ?>
                        </div>


              </div>
              <a class="left carousel-control" href="#carousel-example" data-slide="prev"><i class="icon-prev  fa fa-angle-left"></i></a>
              <a class="right carousel-control" href="#carousel-example" data-slide="next"><i class="icon-next fa fa-angle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="section">
      <div class="container">
        <div class="row">
          <h1>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=138">Mapa da Rede: CEUs Cineclubes pelo Brasil</a>
          </h1>
          <hr>
        </div>
        <div class="row">
          <div class="col-md-12">
		<div style="height:400px">
			<?php get_template_part( 'mapa/cineclubes-home'); ?>
		</div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="section">
      <div class="container">
           
        <div class="row">
          <h1>
		 <a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=110">Sessões da Rede: a telona dos cines!</a>            
          </h1>
          <div class="col-md-12">
            
              <!-- Calendar -->
              <div id='wrap'>
                <div id='calendar'></div>
                <div style='clear:both'></div>
              </div>
              <!-- Calendar -->
		 
          </div>
        </div>
      </div>
      <hr>
      
    <?php
       //Count Cineclubes
       $cineclubes = wp_count_posts( 'cineclube' );
       $cineclubes = $cineclubes->publish;
       

      //Count Filmes/
      $args = array(
          'post_type' => 'sessao',
          'posts_per_page' => -1,
      );
      $sessao = new WP_Query( $args );
      while ( $sessao->have_posts() ) : $sessao->the_post();
        $pdi = $post->ID;
        for($i = 1; $i <= 16; $i++){
          $filme = rwmb_meta( 'ss_nome_filme'.$i, 'type=text', $pdi  );
          if(!empty($filme)){
            $contFilme = $contFilme + 1;
          }
        }
      endwhile;


      //Count Expectadores/
      $args = array(
          'post_type' => 'relatorio_sessao',
          'posts_per_page' => -1,
      );
      $relatorio = new WP_Query( $args );
      while ( $relatorio->have_posts() ) : $relatorio->the_post();
          $pdi = $post->ID;
          $expectador = rwmb_meta( 'rs_pessoas_presentes', 'type=text', $pdi  ); 
                         
          $expectadores = $expectadores +  $expectador;//Soma Quantidade de Expectadores
      endwhile;


    ?>


	      <div class="section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1>Números da Rede</h1>
            </div>
          </div>
<hr />
          <div class="row">
            <div class="col-md-4">
              <img src="<?php echo get_template_directory_uri(); ?>/images/foto07.png" class="center-block img-responsive">
              <h2 class="text-center">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=138"><?php echo $cineclubes; ?> Cineclubes</a>
              </h2>
            </div>
            <div class="col-md-4">
              <img src="<?php echo get_template_directory_uri(); ?>/images/foto05.png" class="center-block img-responsive">
              <h2 class="text-center">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=110"><?php echo $contFilme; ?> Filmes exibidos</a>
              </h2>
            </div>
            <div class="col-md-4">
              <img src="<?php echo get_template_directory_uri(); ?>/images/foto04_numeros_01.jpg.png" class="center-block img-responsive">
              <h2 class="text-center">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=110"><?php echo $expectadores; ?> Espectadores</a>
              </h2>
            </div>
          </div>
        </div>
      </div>
<div style="height:100px"></div>

<?php get_footer(); ?>




