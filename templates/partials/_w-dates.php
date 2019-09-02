<ul class="dates w-100">
	<li>
		<?php
			$whats = get_field('whatsapp_info', 'option');
			$whatsapp = str_replace(' ', '', $whats);
			$whatsapp = str_replace('(', '', $whatsapp);
			$whatsapp = str_replace(')', '', $whatsapp);
			$whatsapp = str_replace('-', '', $whatsapp);
			if( !empty($whats) ) :
		?>
			<span><i class="fab text-primary fa-whatsapp"></i> Whatsapp</span>
<!--			<a href="" target="_blank" class="flutuante">-->
			<a class='mask-phone' href='https://api.whatsapp.com/send?phone=55<?= $whatsapp; ?>&text=Olá, como vai?' target="_blank"><?= $whats; ?></a>
		<? endif; ?>
	</li>
	<?php $phone = get_field('phone_info', 'option'); if( !empty($phone) ) : ?>
		<li>
			<span><i class="fas text-primary fa-phone"></i> Atendimento</span>
			<a class='mask-phone'  title='Ligue para nós!' href='tel:<?= $phone; ?>'><?= $phone; ?></a>
		</li>
	<? endif; ?>
	<?php $mail = get_field('email_info', 'option'); if( !empty($mail) ) : ?>
		<li>
			<span><i class="fas text-primary fa-envelope"></i> E-mail</span>
			<a class='email_info' href='mailto:<?= $mail; ?>?subject=Fale Conosco' title='<?= __('Fale Conosco', 'upcode'); ?>'><?= $mail; ?></a>
		</li>
	<? endif; ?>
</ul>