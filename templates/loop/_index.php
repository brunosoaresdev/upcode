<div class="container">
	<div class="row">
		<div class="col-md-9">
			<?php if ( have_posts() ): while( have_posts() ): the_post(); ?>
				<article <?php post_class( 'page index' ); ?> >
					<figure><?php the_post_thumbnail( 'post-thumb', array( 'class' => 'img-fluid' ) ); ?></figure>	
					<div class="content">
						<?php the_title( '<h2>', '</h2>'); ?>
						<p><?php echo content(40); ?></p>
						<a href="<?php the_permalink(); ?>" title="Saiba mais sobre: <?php the_title(); ?>" class="btn s-btn">saiba mais</a>
					</div>
				</article>
			
				<?php endwhile; else: ?>
				<article><h2>Nenhum post encontrado.</h2></article>
			<?php endif; ?>
		</div>

		<div class="col-md-3"><?php get_sidebar(); ?></div>
	</div>
</div>