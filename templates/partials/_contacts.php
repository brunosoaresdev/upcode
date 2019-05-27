<ul class="list-unstyled d-flex align-items-center justify-content-end phones">
	<?php $whatsapp = get_field('whatsapp_info', 'option'); $phone = get_field('phone_info', 'option'); ?>
	<li><a href="https://api.whatsapp.com/send?phone=55<?php echo $whatsapp; ?>&text=Olá, como vai?" target="_blank"><i class="fab fa-whatsapp"></i> <span class="mask-phone"><?php echo $whatsapp; ?></span></a></li>
	<li class="ml-3"><a title='Ligue para nós!' href='tel:<?php echo $phone; ?>'><i class="fas fa-phone-volume"></i> <span class="mask-phone"><?php echo $phone; ?></span></a></li>
</ul>
<p class='address_info text-center text-md-right'><?php echo get_field('address_info', 'option' ) ;?></p>