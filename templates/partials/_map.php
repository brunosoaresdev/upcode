<?php 
  $location = get_field('map_info', get_option('page_on_front'));
  if( !empty($location) ):
?>
  <div class="acf-map">
    <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
  </div>
<?php endif; ?>