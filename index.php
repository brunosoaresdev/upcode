<?
  get_header();
  
    if (is_front_page()) : get_template_part( 'templates/loop/_home' );
    elseif (is_page()) : get_template_part( 'templates/loop/_page' );
    elseif (is_single()) : get_template_part( 'templates/loop/_single' );
    elseif (is_404()) : get_template_part( 'templates/loop/_404' );
    else : get_template_part( 'templates/loop/_index' );
    endif;
  
  get_footer();