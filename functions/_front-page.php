<?php
add_action('acf_homepage_builder','acf_homepage_builder');
function acf_homepage_builder() {
    // loop through the rows of data
  while ( have_rows('acf_homepage_builder') ) : the_row();
 
 
 
  if( get_row_layout() == 'hero_image' ) {
 
        ///////////////////////////////////////////// "Hero" Layout /////////////////////////////////////
          // Variables
 
      $hero_image = get_sub_field('hero_image');
          $hero_size = $hero_image['sizes'][ 'large' ]; // Use the 'large' size version rather than the original, in case the original is HUGE 
          $hero_title = get_sub_field('hero_block_title');
          $hero_title_size = get_sub_field('hero_block_title_size');
          $hero_caption = get_sub_field('hero_block_text');
          $caption_position = get_sub_field('hero_block_caption_position');
          $hero_display_button = get_sub_field('hero_block_display_cta_button');
          $hero_button = get_sub_field('hero_block_hero_cta_button');
          $hero_lightbox = get_sub_field('hero_cta_lightbox');
           
          include ( __DIR__ . '/../views/acf-homebuilder-hero-image.php');
 
  } elseif( get_row_layout() == 'hero_slider' ) { 
 
          //////////////////////////////////////// "Hero slider" Layout ////////////////////////////////
          // Non-repeater Variables sit here
        $show_slider = get_sub_field('show_hero_slider');
 
 
            if(!empty($show_slider)){ // Only show slider if the checkbox is ticked
               
              include ( __DIR__ . '/../views/acf-homebuilder-hero-slider.php');
 
            }
  } elseif( get_row_layout() == 'full_width_promo_bar' ) { 
 
          //////////////////////////////// "Full width Announcement bar" Layout //////////////////////
          // Variables 
          $show_promo_bar = get_sub_field('show_promo_bar');
          $promo_bg_color = get_sub_field('promo_background_colour');
          $promo_text_color = get_sub_field('promo_text_colour');
          $promo_title = get_sub_field('promo_title');
          $promo_text = get_sub_field('promo_text');
          $promo_button = get_sub_field('promo_button');
          $promo_bar_css_class = get_sub_field('promo_bar_css_class');
          ?>
          <?php
 
            if(!empty($show_promo_bar)){ // Only show Promo bar if the checkbox is ticked
               
               
              include ( __DIR__ . '/../views/acf-homebuilder-promo-bar.php');
 
               
            }
  } elseif( get_row_layout() == 'full_width_strapline' ) { 
 
          /////////////////////////// "Full width Decorative strapline" Layout /////////////////////////
          // Variables 
          $strapline = get_sub_field('acf_strapline');
          $strap_quotes = get_sub_field('acf_strapline_quotes');
 
          include ( __DIR__ . '/../views/acf-homebuilder-strapline-bar.php');
 
 
  } elseif( get_row_layout() == 'acf_home_widget_area_1' ) { 
 
          include ( __DIR__ . '/../views/acf-homebuilder-widget-1.php');
 
           
  } elseif( get_row_layout() == 'image_text' ) { 
 
          ////////////////////////////////// "Image - Text" Layout //////////////////////////////////////
          // Variables
          $i_t_left_image = get_sub_field('left_image');
          $i_t_left_size = get_sub_field('left_image_column_size');
          $i_t_right_text = get_sub_field('right_text');
          $i_t_right_size = get_sub_field('right_text_column_size');
          $i_t_class = get_sub_field('image_text_class');
 
          include ( __DIR__ . '/../views/acf-homebuilder-image-text.php');
 
 
  } elseif( get_row_layout() == 'text_image' ) { 
 
 
          ///////////////////////////////// "Text - Image" Layout ///////////////////////////////////////
      // Variables
          $t_i_left_text = get_sub_field('left_text');
          $t_i_left_size = get_sub_field('left_text_column_size');
          $t_i_right_image = get_sub_field('right_image');
          $t_i_right_size = get_sub_field('right_image_column_size');
          $t_i_class = get_sub_field('text_image_class');
 
          include ( __DIR__ . '/../views/acf-homebuilder-text-image.php');
 
  } elseif( get_row_layout() == '3_mpu_boxes' ) { 
 
            /////////////////////////////////////// "3 MPU Box" Layout ////////////////////////////////
            // Variables
            $mpu_3_size = 'medium'; // Use the 'medium' size version rather than the original, in case the original is HUGE 
            $mpu_3_title = get_sub_field('acf_fl_3_mpu_section_title');
            $mpu_3_collapse = get_sub_field('acf_fl_3_mpu_collapse');
            $mpu_3_box_1_title = get_sub_field('acf_fl_3_mpu_box_1_title');
            $mpu_3_box_1_image = get_sub_field('acf_fl_3_mpu_box_1_image'); // ACF ID, Not Array or Object
            $mpu_3_box_1_text = get_sub_field('acf_fl_3_mpu_box_1_text');
            $mpu_3_box_1_button = get_sub_field('acf_fl_3_mpu_box_1_button');
            $mpu_3_box_2_title = get_sub_field('acf_fl_3_mpu_box_2_title');
            $mpu_3_box_2_image = get_sub_field('acf_fl_3_mpu_box_2_image');
            $mpu_3_box_2_text = get_sub_field('acf_fl_3_mpu_box_2_text');
            $mpu_3_box_2_button = get_sub_field('acf_fl_3_mpu_box_2_button');
            $mpu_3_box_3_title = get_sub_field('acf_fl_3_mpu_box_3_title');
            $mpu_3_box_3_image = get_sub_field('acf_fl_3_mpu_box_3_image');
            $mpu_3_box_3_text = get_sub_field('acf_fl_3_mpu_box_3_text');
            $mpu_3_box_3_button = get_sub_field('acf_fl_3_mpu_box_3_button');
            $mpu_3_box_css = get_sub_field('acf_fl_3_mpu_css_class');
             
 
            include ( __DIR__ . '/../views/acf-homebuilder-3-mpu.php');
               
 
  } elseif( get_row_layout() == '4_mpu_boxes' ) { 
 
            ////////////////////////////////////// "4 MPU Box" Layout ///////////////////////////////
            // Variables
            //$mpu_4_image = get_sub_field('')
            $mpu_4_size = 'medium'; // Use the 'medium' size version rather than the original, in case the original is HUGE 
            $mpu_4_title = get_sub_field('acf_fl_4_mpu_section_title');
            $mpu_4_collapse = get_sub_field('acf_fl_4_mpu_collapse');
            $mpu_4_box_1_title = get_sub_field('acf_fl_4_mpu_box_1_title');
            $mpu_4_box_1_image = get_sub_field('acf_fl_4_mpu_box_1_image'); // ACF ID, Not Array or Object
            $mpu_4_box_1_text = get_sub_field('acf_fl_4_mpu_box_1_text');
            $mpu_4_box_1_button = get_sub_field('acf_fl_4_mpu_box_1_button');
            $mpu_4_box_2_title = get_sub_field('acf_fl_4_mpu_box_2_title');
            $mpu_4_box_2_image = get_sub_field('acf_fl_4_mpu_box_2_image');
            $mpu_4_box_2_text = get_sub_field('acf_fl_4_mpu_box_2_text');
            $mpu_4_box_2_button = get_sub_field('acf_fl_4_mpu_box_2_button');
            $mpu_4_box_3_title = get_sub_field('acf_fl_4_mpu_box_3_title');
            $mpu_4_box_3_image = get_sub_field('acf_fl_4_mpu_box_3_image');
            $mpu_4_box_3_text = get_sub_field('acf_fl_4_mpu_box_3_text');
            $mpu_4_box_3_button = get_sub_field('acf_fl_4_mpu_box_3_button');
            $mpu_4_box_4_title = get_sub_field('acf_fl_4_mpu_box_4_title');
            $mpu_4_box_4_image = get_sub_field('acf_fl_4_mpu_box_4_image');
            $mpu_4_box_4_text = get_sub_field('acf_fl_4_mpu_box_4_text');
            $mpu_4_box_4_button = get_sub_field('acf_fl_4_mpu_box_4_button');
            $mpu_4_box_css = get_sub_field('acf_fl_4_mpu_css_class');                        
 
            include ( __DIR__ . '/../views/acf-homebuilder-4-mpu.php');
 
    } elseif( get_row_layout() == 'flexbox_wysi' ) { 
 
            //////////////////////////////////////////// Flexbox WYSI repeater Layout ////////////////////
            // Variables
                                  
 
          include ( __DIR__ . '/../views/acf-homebuilder-flexbox-wysiwyg.php');          
               
 
  }  elseif( get_row_layout() == 'acf_home_flexible_custom_content' ) { 
 
            //////////////////////////////////// "Custom Content" Layout ///////////////////////////
            // Variables
          $custom_html = get_sub_field('custom_acf_row_html');
 
 
		  if($custom_html):echo $custom_html; endif;
  }

endwhile;
}

/* Add a 'Delete confirmation dialgue box' for removing ACF Flexible Content Row */
add_action('acf/input/admin_head', 'bb_acf_fc_delete_dialogue');
 
function bb_acf_fc_delete_dialogue() {
     
    ?>
     <script>
		     (function($) {
         
		 acf.add_action('ready', function(){
			  
			 $('body').on('click', 'li.acf-fc-show-on-hover a.acf-icon.-minus.small', function( e ){
				  
				 return confirm("Quer memso deletar ?");   
			 });
		 });
	 })(jQuery); 
	  
	 </script>   
    <?php   
     
}
 
/** ADMIN CSS TO MAKE HOMEPAGE SITE BUILDER LOOK A BIT NICER */
add_action('admin_head', 'my_custom_admin_css');
function my_custom_admin_css() {
  echo '<style>
    /* ACF UI tweaks */
    .acf-flexible-content .layout .acf-fc-layout-handle{
        background: #333;
        color: #fff;
    }
    .acf-table > thead > tr > th{
        word-break:break-word;
    }
  </style>';
}