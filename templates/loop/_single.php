<? get_template_part( 'templates/partials/_h-page' ); ?>

<main id="content" role="main">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
					<article <?php post_class( 'page single' ); ?> >
						<figure><?php the_post_thumbnail( 'post-thumb', array( 'class' => 'img-fluid' ) ); ?></figure>
						<ul class="infos">
							<li class="time"><time><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></time></li>
							<li class="author"><?php _e( 'Publicado por', 'upcode' ); ?> <?php the_author_posts_link(); ?></li>
							<li class="comments"><?php comments_number( '0 comentário', '1 comentário', '% comentários' ); ?></li>
						</ul>
						<p><? the_category(', '); ?></p>
						<p><? the_author(); ?></p>
						<div class="content">
							<? the_content(); ?>
						</div>
						<footer>
							<?
								the_tags( __( 'Tags: ', 'upcode' ), ', ', '<br>');
								comments_template();
							?>
						</footer>
					</article>

				<?php endwhile; ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>