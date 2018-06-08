<?php get_template_part( 'partials/_h-page' ); ?>

<div class="container">
	<div class="row">

		<div class="col-md-8">
			<?php if (is_archive()) : ?>
				<h1><?php single_cat_title(); ?></h1>
			<?php elseif(is_search()) : ?>
				<?php get_template_part( 'partials', '_header-search' ); ?>
			<?php endif; ?>
			
			<?php if ( have_posts() ): while( have_posts() ): the_post(); ?>
				<article <?php post_class( 'page index' ); ?> >
					<header>
						<figure><?php the_post_thumbnail( 'post-thumb', array( 'class' => 'img-fluid' ) ); ?></figure>
						
						<ul class="infos">
							<li class="time"><time><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></time></li>
							<li class="author"><?php _e( 'Publicado por', 'bfriend' ); ?> <?php the_author_posts_link(); ?></li>
							<li class="comments"><?php comments_number( '0 comentário', '1 comentário', '% comentários' ); ?></li>
						</ul>

						<p><?php the_category(', '); ?></p>
						<p><?php the_author(); ?></p>
					</header>

					<div class="content">
						<p><?php echo content(40); ?></p>
						<a href="<?php the_permalink(); ?>" title="Saiba mais sobre: <?php the_title(); ?>">saiba mais</a>
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