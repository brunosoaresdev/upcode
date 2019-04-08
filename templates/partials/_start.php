<?php
	if ( is_front_page() ) : _partials( '_slideshow' );
	else : _partials( '_h-page' );
	endif;
?>

<!-- start content -->
<main id="content" role="main">