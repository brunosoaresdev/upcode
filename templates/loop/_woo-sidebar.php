<? get_template_part( 'templates/partials/_h-page' ); ?>

<main id="content" role="main">
	<div class="container">
    <div class="row">
      <div class="col-md-4">
        SIDEBAR
      </div>
      <div class="col-md-8">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>			
          <article <?php post_class( 'page p-woo sidebar' ); ?> >
            <? the_content(); ?>
          </article>
        <?php endwhile; ?>
      </div>
    </div>
	</div>
</main>