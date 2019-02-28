<?php
  get_header();
  _partials('_start');
    if (is_front_page()) : _loop('_home');
    elseif (is_page()) : _loop( '_page' );
    elseif (is_single()) : _loop( '_single' );
    elseif (is_404()) : _loop( '_404' );
    else : _loop( '_index' );
    endif;
  _partials('_end');
  get_footer();