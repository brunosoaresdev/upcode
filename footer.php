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
?>
	


	<footer id="footer" role="contentinfo">
		<section class="instagram">
			<div class="container">
				<h1 class="t-section"><i class="fab fa-instagram"></i> InstaStaz</h1>
		  	<?php get_template_part( 'templates/partials/_instagram' ); ?>
			</div>
		</section>
		<section class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<div class="widget-footer">
							<div class="widget-title">Institucional</div>
							<div class="widget-content">
							<?php
					      wp_nav_menu( array(
								  'theme_location' => 'institucional',
								  'container_class' => 'institucional-nav'
					      ) );
					    ?>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="widget-footer widget-nav">
							<div class="widget-title">Categorias</div>
							<div class="widget-content">
							  <?php
							  wp_nav_menu( array(
								  'theme_location' => 'categorias',
								  'container_class' => 'categorias-nav'
							  ) );
							  ?>

							</div>
						</div>
					</div>
					<div class="col-md-7 d-flex flex-column flex-md-row justify-content-center align-items-start justify-content-md-start ">
						<div class="widget-footer address">
							<div class="widget-title">Onde Estamos</div>
							<div class="widget-content">
								<div class="widget-address">
									<?php the_field( 'address_info',get_option('page_on_front')); ?>
									<span class="mask-phone"><?php the_field( 'phone_info',get_option('page_on_front')); ?></span>
								</div>

							</div>
						</div>
						<div class="widget-footer">
							<div class="widget-title">Receba novidades</div>
							<div class="widget-content newsl">
					      <?php get_template_part( 'templates/partials/_newsletter' ); ?>

			          <?php get_template_part( 'templates/partials/_s-networks' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="d-flex justify-content-center align-itens-center">
							<p class="text-center">© Copyright <?php bloginfo( 'name' ); ?> - <?php echo date('Y') ?></p>
						</div>
					</div>
					<div class="col-md-2">
						<a id="gosites" class="gosites d-inline-block" href="//gosites.com.br" title="GoSites" rel="nofollow">
							<img src="<?php echo images_url('gosites.png' ); ?>" class="img-fluid" />
						</a>
					</div>
				</div>
			</div>

		</section>




	</footer>

<?php wp_footer(); ?>
</body>
</html>