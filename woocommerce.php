<?
  get_header();
  get_template_part( 'templates/partials/_h-page' );
?>

  <main id="content" role="main">
    <div class="container">
      <div class="row">
        <?php if (is_product_category( )) : get_sidebar(); endif; ?>
        <div class="<?= (is_product_category()) ? 'col-md-9' : 'col-md-12'; ?>">
          <article <?php post_class( 'page woocommerce p-woo' ); ?> >
            <?php woocommerce_content() ?>
          </article>
        </div>
      </div>
    </div>
  </main>

<?
  get_footer();