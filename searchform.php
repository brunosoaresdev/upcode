<form id="search-box" role="search" method="get" class="form-inline" action="<?php echo home_url( '/' ); ?>">
  <input type="search" class="search-field form-control" placeholder="O que você procura?" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
</form>