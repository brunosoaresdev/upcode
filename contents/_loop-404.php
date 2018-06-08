<?php get_template_part('partials/_h-page'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<article <?php post_class('page 404'); ?> >
					<h1><?php _e( 'Página não encontrada.', 'bfriend' ); ?></h1>
					<p><?php _e( 'Acho que você se perdeu, digite abaixo o que procura ou volte para a página inicial.', 'bfriend' ); ?></p>
					<?php get_search_form(); ?>

					<script type="text/javascript">
						document.getElementById('s') && document.getElementById('s').focus();
					</script>
				</article>
			<?php endwhile; ?>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>