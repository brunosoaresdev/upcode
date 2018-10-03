<?php get_template_part( 'templates/partials/_slideshow' ); ?>

<main id="content" role="main">
	<div class="container">
		<h1 class="t-section">Últimos Destaques</h1>
		<?= do_shortcode('[products limit="8" columns="4"]'); ?>
	</div>

	<div class="blog-home">
		<h1 class="t-section">Blog</h1>
		<?
			$args = ['post_type' => 'post', 'posts_per_page' => 15 ];
			query_posts( $args );
			if ( have_posts() ) : 
			get_template_part( 'templates/partials/_g-blog' );
			endif;
		?>
		<a href="<?= get_permalink(6); ?>" class="btn-classic">Ver todos</a>
	</div>
</main>