<?php
if (is_tax(['product_cat']) ) :
	$query = get_queried_object();
	if(isset($query->term_id)):
		$image = get_field('imagem','product_cat_'.$query->term_id);
		?>
			<div class="term-bg" style="background-image: url('<?=$image;?>');">
				<div class="container">
					<div class="row">
						<div class="col-md-6 mx-auto d-flex flex-column justify-content-center align-items-center col-12 h-100">
							<h1><?=$query->name;?></h1>
							<div class="content">
									<?=apply_filters('the_content',$query->description );?>
							</div>
						</div>
					</div>
				</div>
				<div class="mask">

				</div>
			</div>

	<?php
	endif;
endif;
?>
<div class="h-page">

    <div class="container">
      <?php
        if ( is_product() ) : yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        elseif ( is_tax(['product_cat'])) : echo '<div class="term-meta"><strong>'.$query->name.'</strong> '.woocommerce_catalog_ordering().' </div>';
        elseif ( is_singular('post') ) : echo '<a href="'.get_permalink(6).'"><i class="fas fa-angle-left"></i> Voltar para o blog</a>';
        elseif ( is_home() || is_archive()) : echo '<h1>Blog</h1>';
        else : the_title('<h1>', '</h1>');
        endif;
      ?>
    </div>
</div>
