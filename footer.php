<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

	_partials( '_map' );
?>

	<footer id="footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-6 mx-auto mb-4 col-md-2 mr-md-auto ml-md-0 mb-md-0 d-flex flex-column align-items-center">
					<a id="logotipo" class="logotipo d-inline-block my-2 my-md-5" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php if ( get_field('logotipo_rodape', 'option') ) : ?>
						<img src="<?php echo get_field('logotipo_rodape', 'option'); ?>" class="img-fluid" />
						<?php else : ?>
						<img src="<?php echo get_field('logotipo', 'option'); ?>" class="img-fluid" />
						<?php endif; ?>
					</a>
					<?php _partials('_s-networks'); ?>
				</div>
				<div class="col-10 mx-auto col-md-6 ml-md-auto mr-md-0 mt-md-5 d-flex flex-column justify-content-end">
					<?php _partials('_contacts'); ?>
				</div>
			</div>
		</div>
		<div class="footer-txt pt-3">
			<div class="container d-flex justify-content-between align-itens-center">
				<p>© Copyright <?php echo date('Y') ?> - <?php bloginfo( 'name' ); ?> - Todos direitos reservados.</p>
				<?php _partials( '_signature' ); ?>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>
<script>jQuery(document).ready(function ($) { $('.preloader').delay(400).fadeOut(500); });</script>
</body>
</html>