<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */



/**
*
* A exibição da Galeria utiliza o Plugin "Ajax Load More" (https://wordpress.org/plugins/ajax-load-more/)
* A página usada no loop (chamado pelo shortcode ajax_load_more) fica na pasta wp-content/pĺugins/ajax-load-more/core/repeater/default.php
* O arquivo 'default.php' deve conter somente a seguinte linha de código:
* <?php get_template_part( 'single-galeria'); ?>
* O arquivo default.php também pode ser editado através do wp-admin
* A edição de como cada item da galeria é exibido fica no arquivo single-galeria.php dentro deste tema
*
*/
 ?>
<?php get_header(); ?>


<div class="content-galeria">
    <div class="container">        
        <div class="row">
            <?php echo do_shortcode('[ajax_load_more post_type="relatorio_sessao, sessao, cineclube" posts_per_page="24" button_label="Carregar mais imagens"]'); ?>
        </div>
    </div>
</div>



<?php get_footer(); ?>
