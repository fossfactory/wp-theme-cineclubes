<?php
/*
Template Name: Público
*/

get_header(); ?>



<div id="primary" class="content-area padd-post2">

<?php
$cineclubes = $wpdb->get_var("SELECT count(DISTINCT pm.post_id) FROM wp_postmeta pm JOIN wp_posts p ON (p.ID = pm.post_id) WHERE pm.meta_key = '_form_id' AND pm.meta_value = '6' AND p.post_type = 'nf_sub' AND p.post_status = 'publish';");
if (0 < $cineclubes) $cineclubes = number_format($cineclubes);
?>
<?php
$filmes = $wpdb->get_var("SELECT count(DISTINCT pm.post_id) FROM wp_postmeta pm JOIN wp_posts p ON (p.ID = pm.post_id) WHERE pm.meta_key = '_form_id' AND pm.meta_value = '22' AND p.post_type = 'nf_sub' AND p.post_status = 'publish';");
if (0 < $filmes) $filmes = number_format($filmes);
?>
<?php
$expectadores = $wpdb->get_var("SELECT sum(meta_value) FROM wp_postmeta WHERE meta_key = '_field_147';");
if (0 < $expectadores) $expectadores = number_format($expectadores);
?>

			<div class="row">
				<div class="col-md-11">
					<h1>Números da Rede</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<img src="<?php echo get_template_directory_uri(); ?>/images/foto04_numeros_02.jpg.png" width="80%" class="center-block img-responsive">
					<h2 class="text-center">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=134"><?php echo $cineclubes; ?> Cineclubes</a>
					</h2>
				</div>
				<div class="col-md-3">
					<img src="<?php echo get_template_directory_uri(); ?>/images/foto04_numeros_03.jpg.png" width="80%" class="center-block img-responsive">
					<h2 class="text-center">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=110"><?php echo $filmes; ?> Filmes exibidos</a>
					</h2>
				</div>
				<div class="col-md-3">
					<img src="<?php echo get_template_directory_uri(); ?>/images/foto04_numeros_01.jpg.png" width="80%" class="center-block img-responsive">
					<h2 class="text-center">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=110"><?php echo $expectadores; ?> Expectadores</a>
					</h2>
				</div>
			</div>
	
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





<?php get_footer(); ?>