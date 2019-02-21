<?php if ( have_rows( 'depoimentos', get_option( 'page_on_front' ) ) ): ?>
	<div class="depoimentos-box">
	  <?php while ( have_rows( 'depoimentos', get_option( 'page_on_front' ) ) ) : the_row();
	  $image = get_sub_field( 'imagem' );
	  $thumb = $image['sizes']['depoimento'];?>
				<div>
					<div class="depoimento-box d-flex flex-column">
						<div class="depoimento-header d-flex flex-row justify-content-start align-content-center">
							<div class="depoimento-imagem">
								<img src="<?php echo $thumb; ?>"  style="max-width: 135px;min-height: 130px;" class="img-fluid rounded-circle" alt="">
							</div>
							<div class="depoimento-meta d-flex flex-column align-items-start justify-content-center p-3">
								<span class="depoimento-titulo"><?php the_sub_field( 'titulo' ); ?></span>
								<span class="depoimento-nome"><?php the_sub_field( 'nome' ); ?></span>
								<span class="depoimento-stars"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span>
							</div>
						</div>
						<div class="depoimento-body">
							<?php the_sub_field( 'depoimento' ); ?>
						</div>
					</div>
				</div>
	  <?php endwhile; ?>
	</div>
<?php endif; ?>