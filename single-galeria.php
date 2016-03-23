<?php 
	global $post;
	$pdi            = $post->ID;
    //$post_title     = $post->post_title;
    $post_type      = $post->post_type;
    $url_thumb      = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );             

    //POST THUMBNAIL
    if(!empty($url_thumb)) {
        ?>
			<div class="col-md-3">
			    <a href="<?php echo $url_thumb; ?>"
				    data-toggle="lightbox" data-gallery="multiimages" 
				   	data-title="<a href='<?php the_permalink(); ?>' class='text-center'><?php the_title(); ?></a>"
				>
			        <img src="<?php echo $url_thumb; ?>" alt="<?php the_title(); ?>" />
			    </a>					    
			</div>
		<?php
    }
    
    //FOTOS RELATORIO SESSAO
    if($post_type == "relatorio_sessao"){
        for($i = 1; $i <= 6; $i++){
            $foto = rwmb_meta( 'rs_foto_sessao'.$i, 'type=image', $pdi  );
            foreach ( $foto as $f ){ 
                if(!empty($f['url'])){
				?>
					<div class="col-md-3">
					    <a href="<?php echo $f['url']; ?>"
						    data-toggle="lightbox" data-gallery="multiimages" 
						    data-title="<a href='<?php the_permalink(); ?>' class='text-center'><?php the_title(); ?></a>"
						>
					        <img src="<?php echo $f['url']; ?>" alt="<?php the_title(); ?>" />
					    </a>					    
					</div>
				<?php
				}
            }
        }
    }
    
    //FOTOS DEBATEDORES
    if($post_type == "sessao"){
        for($d = 1; $d <= 5; $d++){
            $foto_debatedor = rwmb_meta( 'ss_foto_debatedor'.$d, 'type=image', $pdi  );
            foreach ( $foto_debatedor as $f ){ 
                if(!empty($f['url']))
                ?>
					<div class="col-md-3">
					    <a href="<?php echo $f['url']; ?>"
						    data-toggle="lightbox" data-gallery="multiimages" 
						    data-title="<a href='<?php the_permalink(); ?>' class='text-center'><?php the_title(); ?></a>"
						>  
					        <img src="<?php echo $f['url']; ?>" alt="<?php the_title(); ?>" />
					    </a>					    
					</div>
				<?php
            }
        }
    }
?>