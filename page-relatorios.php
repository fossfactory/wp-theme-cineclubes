<?php
/*
Template Name: Relatórios
*/

get_header(); ?>

<div id="conteudo">
 
   <!-- Lista de Relatorios PostTypes -->
  <div id="lista-cineclubes" class="rows">
    <?php
      $args = array(
          'post_type' => 'relatorio_sessao',
          'post_count' => -1,
      );
      $loop_cineclubes = new WP_Query( $args );
      while ( $loop_cineclubes->have_posts() ) : $loop_cineclubes->the_post();
      $pdi = $post->ID;

      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($pdi), 'full' );
      $thumb_url = $thumb['0'];    

      if(empty($thumb_url)){
        $thumb_url = "/wp-content/uploads/cineclube/sessao.png";
      }

      /**
      ** Get MetasBoxs
      **/
      $sinopse = rwmb_meta( 'rs_sinopse', 'type=text', $pdi  );
      $estado = rwmb_meta( 'rs_estado', 'type=text', $pdi  );
      $cidade = rwmb_meta( 'rs_cidade', 'type=text', $pdi  );


    ?>
    <div class="row">
      <a class="caixa" href="<?php echo the_permalink(); ?>">
        <div class="col-md-2 image">
            <img src="<?php echo  $thumb_url ?>" />
            <p><?php echo $cidade . " - " . $estado ?></p>
          </div>
        <div class="col-md-8 text">
            <h2><?php echo get_the_title(); ?></h2>
            <p><?php echo $sinopse; ?></p>
        </div>
      </a>
    </div>
    <?php endwhile; wp_reset_query(); ?>
  </div>  



 

</div>





<div id="primary" class="content-area padd-post2">


<?php
$expectadores = $wpdb->get_var("SELECT sum(meta_value) FROM wp_postmeta WHERE meta_key = '_field_147';");
if (0 < $expectadores) $expectadores = number_format($expectadores);
?>

<?php
$sessoes = $wpdb->get_var("SELECT count(DISTINCT pm.post_id) FROM wp_postmeta pm JOIN wp_posts p ON (p.ID = pm.post_id) WHERE pm.meta_key = '_form_id' AND pm.meta_value = '23' AND p.post_type = 'nf_sub' AND p.post_status = 'publish';");
if (0 < $sessoes) $sessoes = number_format($sessoes);
?>

<h2><?php the_title(); ?></h2>

<p><i class="fa fa-university"></i> Sessões realizadas pela rede: <?php echo $sessoes; ?></p> 
<p><i class="fa fa-video-camera"></i> Número de expectadores das sessões: <?php echo $expectadores; ?></p>
<p><i class="fa fa-film"></i> Número de filmes exibidos: <?php echo $sessoes; ?></p>
<p><i class="fa fa-file-text"></i> Relatórios de sessão: lista dos relatórios</p>


</div>









<?php
//mostra o nome do filme
$filmes = $wpdb->get_var("select meta_value from wp_postmeta where meta_key = '_field_118';");
if (0 < $filmes) $filmes = number_format($filmes);
?>


<h2><?php echo $filmes; ?></h2>


<hr>
<?php if ( get_post_meta(114, '_field_118', true) ) { ?>
<?php echo '<strong>Nome da sessão</strong>: '.get_post_meta(114, "_field_118", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_119', true) ) { ?>
<?php echo '<strong>Data</strong>: '.get_post_meta(114, "_field_119", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_121', true) ) { ?>
<?php echo '<strong>Horário</strong>: '.get_post_meta(114, "_field_121", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_122', true) ) { ?>
<?php echo '<strong>Local</strong>: '.get_post_meta(114, "_field_122", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_145', true) ) { ?>
<?php echo '<strong>Endereço</strong>: '.get_post_meta(114, "_field_145", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_127', true) ) { ?>
<?php echo '<strong>Valor</strong>: '.get_post_meta(114, "_field_127", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_128', true) ) { ?>
<?php echo '<strong>OBS</strong>: '.get_post_meta(114, "_field_128", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_129', true) ) { ?>
<?php echo '<strong>Nome do filme</strong>: '.get_post_meta(114, "_field_129", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_130', true) ) { ?>
<?php echo '<strong>Nome original</strong>: '.get_post_meta(114, "_field_130", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_131', true) ) { ?>
<?php echo '<strong>Direção</strong>: '.get_post_meta(114, "_field_131", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_132', true) ) { ?>
<?php echo '<strong>Ano</strong>: '.get_post_meta(114, "_field_132", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_134', true) ) { ?>
<?php echo '<strong>País</strong>: '.get_post_meta(114, "_field_134", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_133', true) ) { ?>
<?php echo '<strong>Idioma</strong>: '.get_post_meta(114, "_field_133", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_135', true) ) { ?>
<?php echo '<strong>Legendado ou dublado</strong>: '.get_post_meta(114, "_field_135", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_137', true) ) { ?>
<?php echo '<strong>Sinopse</strong>: '.get_post_meta(114, "_field_137", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_138', true) ) { ?>
<?php echo '<strong>Classificação indicativa</strong>: '.get_post_meta(114, "_field_138", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_136', true) ) { ?>
<?php echo '<strong>Debate da sessão</strong>: '.get_post_meta(114, "_field_136", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_139', true) ) { ?>
<?php echo '<strong>Haverá debate?</strong>: '.get_post_meta(114, "_field_139", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_140', true) ) { ?>
<?php echo '<strong>Nome do debatedor</strong>: '.get_post_meta(114, "_field_140", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_141', true) ) { ?>
<?php echo '<strong>Mini bio do debatedor</strong>: '.get_post_meta(114, "_field_141", $single = true).'<br />'; ?>
<?php } ?>

<?php if ( get_post_meta(114, '_field_120', true) ) { ?>
<?php echo '<strong>Foto do debatedor</strong>: '.get_post_meta(114, "_field_120", $single = true).'<br />'; ?>
<?php } ?>


<div style="background-color:#080">

<?php
get_header();
?>
<div id="container">
<a name="top"></a>
<?php
$args = array(
	'sort_order' => 'ASC',
	'sort_column' => 'menu_order', //post_title
	'hierarchical' => 1,
	'exclude' => '',
	'child_of' => 0,
	'parent' => -1,
	'exclude_tree' => '',
	'number' => '',
	'offset' => 0,
	'post_type' => 'nf_sub',
	'post_status' => 'publish'
);
$pages = get_pages($args);
//start loop
foreach ($pages as $page_data) {
    $content = apply_filters('the_content', $page_data->post_content);
    $title = $page_data->post_title;
    $slug = $page_data->post_name;
?>
<div class='<?php echo "$slug" ?>'><a name='<?php echo "$slug" ?>'></a>
        <h2><?php echo "$title" ?></h2>
			<?php echo "$content" ?>
</div>

<?php
}
get_footer();
?>

<?php
        
                $args = array(
                        'posts_per_page' => -1,
                        'paged' => $this->step,
                        'post_type' => 'nf_sub',
                        'meta_query' => array(
                                array(
                                        'key' => '_form_id',
                                        'value' => ['22'],
                                ),
                        ),
                );

                $subs_results = get_posts( $args );        
        
        echo "Total matching posts: $subs_results->found_posts";
?>



</div>

<?php get_footer(); ?>