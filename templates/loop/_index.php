<? get_template_part( 'templates/partials/_h-page' ); ?>

<main id="content" role="main">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php if ( have_posts() ): while( have_posts() ): the_post(); ?>
					
					<article <?php post_class( 'page index' ); ?> >
						<figure><?php the_post_thumbnail( 'post-thumb', array( 'class' => 'img-fluid' ) ); ?></figure>	
						<ul class="infos">
							<li class="time"><time><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></time></li>
							<li class="author"><?php _e( 'Publicado por', 'upcode' ); ?> <?php the_author_posts_link(); ?></li>
							<li class="comments"><?php comments_number( '0 comentário', '1 comentário', '% comentários' ); ?></li>
						</ul>
						<p><?php the_category(', '); ?></p>
						<p><?php the_author(); ?></p>

						<div class="content">
							<p><?= content(40); ?></p>
							<a href="<?php the_permalink(); ?>" title="Saiba mais sobre: <?php the_title(); ?>" class="btn btn-classic">saiba mais</a>
						</div>
					</article>
				
					<?php endwhile; else: ?>
					<article>
						<h2>Nenhum post encontrado.</h2>
					</article>
				<?php endif; ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>