<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<article <?php post_class( 'page' ); ?> >
		<div class="content">
			<? the_content(); ?>

			<? if( have_rows('repeater_faq') ): ?>
				<div class="accordion" id="accordionFaq">
					<?php
					$i = 0; while ( have_rows('repeater_faq') ) : the_row(); $i++;
						$question = get_sub_field('faq_question');
						$answer = get_sub_field('faq_answer');
						$show = ($i == 1) ? 'show' : '';
						$collapsed = ($i == 1) ? '' : 'collapsed';
						$expand = ($i == 1) ? 'true' : 'false';
						?>
						<div class="card">
							<div class="card-header" id="heading-<?= $i; ?>">
								<h5 class="mb-0 d-flex align-items-center justify-content-between">
									<button class="btn btn-link <?= $collapsed; ?>" type="button" data-toggle="collapse" data-target="#collapse-<?= $i; ?>" aria-expanded="<?= $expand; ?>" aria-controls="collapse-<?= $i; ?>">
										<?= $question; ?>
									</button>
								</h5>
							</div>

							<div id="collapse-<?= $i; ?>" class="collapse <?= $show; ?>" aria-labelledby="heading-<?= $i; ?>" data-parent="#accordionFaq">
								<div class="card-body">
									<?= $answer; ?>
								</div>
							</div>
						</div>
					<? endwhile; ?>
				</div>
			<? endif; ?>
		</div>
	</article>

<?php endwhile; ?>
