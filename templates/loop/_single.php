<?
	if (is_product()) : get_template_part( 'templates/loop/_woo' );
	else :
	get_template_part( 'templates/partials/_h-page' );
?>
	<main id="content" role="main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<article <?php post_class( 'post single' ); ?> >
							<header>
									<?php
									the_title('<h1>','</h1>');
									?>
								<div class="meta d-flex justify-content-center align-items-center">
									<span class="cat"><? the_category(', '); ?> · <?php echo get_the_date('d F Y'); ?></span>
								</div>
							</header>
							<figure><?php the_post_thumbnail( 'post-thumb', array( 'class' => 'img-fluid' ) ); ?></figure>

							<div class="content col-md-8 mx-auto">
								<? the_content(); ?>
							</div>
							<footer class="destaques">
								<h1>Últimos Destaques</h1>
				        <?= do_shortcode('[products limit="4" columns="4"]'); ?>
							</footer>
						</article>

					<?php endwhile; ?>
				</div>
				<?php //get_sidebar(); ?>
			</div>
		</div>
	</main>
<?php endif; ?>