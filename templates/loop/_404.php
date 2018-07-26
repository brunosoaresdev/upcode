<?php get_template_part('templates/partials/_h-page'); ?>

<main id="content" role="main">
	<div class="container">
		<div class="row">
			<div class="col-md-6 mx-auto">
				<article <?php post_class('page 404'); ?> >
					<h1><?php _e( 'Página não encontrada.', 'upcode' ); ?></h1>
					<p><?php _e( 'Acho que você se perdeu, digite abaixo o que procura ou volte para a página inicial.', 'upcode' ); ?></p>
					<?php get_search_form(); ?>

					<script type="text/javascript">
						document.getElementById('s') && document.getElementById('s').focus();
					</script>
				</article>
			</div>
		</div>
	</div>
</main>