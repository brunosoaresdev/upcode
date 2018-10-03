<? get_template_part( 'templates/partials/_h-page' ); ?>
<main id="content" role="main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					
					<article <?php post_class( 'page single paged' ); ?> >
						<div class="content">
							<? the_content(); ?>
						</div>
					</article>

				<?php endwhile; ?>
			</div>

		</div>
	</div>
</main>