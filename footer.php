<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
            <footer class="section section-footer">
        <div class="container" style="position: fixed; bottom: 0px; width: 100%;z-index:999;background-color: #eaeaea;height:75px;padding-top:10px">
          <div class="row">
            <div class="container-footer" style="margin:0 auto;width:1010px">
              <a href="http://www.ufabc.edu.br" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo_ufabc_80x50.png" class="img-responsive img-float-footer" style="max-width: 80px;">
                </a>
              <a href="http://www.pac.gov.br" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo_pac2_124x50.png" class="img-responsive img-float-footer" style="max-width: 124px;">
				</a>
              <a href="http://ceus.cultura.gov.br" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo_ceus_97x50.png" class="img-responsive img-float-footer" style="max-width: 97px;">
				</a>
              <a href="http://cultura.gov.br/secretaria-de-politicas-culturais-spc" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo_spc_127x50.png" class="img-responsive img-float-footer" style="max-width: 127px;">
				</a>
              <a href="http://cultura.gov.br/secretaria-do-audiovisual-sav" target="_blank">                
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo_sav_120x50.png" class="img-responsive img-float-footer" style="max-width: 120px;">
                </a>
              <a href="http://cultura.gov.br" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo_minc_123x50.png" class="img-responsive img-float-footer" style="max-width: 123px;">
                </a>
              <a href="http://www.brasil.gov.br/" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo_gov_federal_210x65.png" class="img-responsive img-float-footer" style="max-width: 230px;">
                </a>
            </div>
          </div>
        </div>
      </footer>
    </div>
    



<?php wp_footer(); ?>

</body>
</html>
