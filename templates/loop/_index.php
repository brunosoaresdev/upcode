<? get_template_part( 'templates/partials/_h-page' ); ?>

<main id="content" role="main">
	<?php if ( have_posts() ): get_template_part( 'templates/partials/_g-blog' ); else : ?>
		<article class="container">
			<h2>Nenhum post encontrado.</h2>
		</article>
	<?php endif; ?>
</main>