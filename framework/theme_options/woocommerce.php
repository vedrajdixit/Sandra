<!-- #woocommerence starts here-->
<div id="woocommerce" class="bpanel-content">
  	<!-- .bpanel-main-content starts here-->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#my-woocommerce"><?php _e("wooCommerce Settings",'iamd_text_domain');?></a></li>
        </ul>
        
        
        <!-- #my-woocommerce starts here --> 
        <div id="my-woocommerce" class="tab-content">
        	<div class="bpanel-box">
<?php  if( class_exists('woocommerce') ) : ?>

        		<!-- SHOP PAGE -->
            	<div class="box-title"><h3><?php _e('Shop','iamd_text_domain');?></h3></div>
                <div class="box-content">
                
                	<div class="column one-third"><label><?php _e('Products Per Page','iamd_text_domain');?></label></div>
                    <div class="column two-third last">
                    	<input name="mytheme[woo][shop-product-per-page]" type="text" class="small" value="<?php echo trim(stripslashes(dt_theme_option('woo','shop-product-per-page')));?>" />
                        <p class="note"><?php _e('Number of porducts to show in catalog / shop page','iamd_text_domain');?></p>
                    </div>
                    
                    <!-- Layout -->
                    <h6><?php _e('Layout','iamd_text_domain');?></h6>
                    <p class="note no-margin"> <?php _e("Choose the Product Layout Style in Catalog / Shop ","iamd_text_domain");?> </p>
                    <div class="hr_invisible"> </div>
                    <div class="bpanel-option-set">
                    	<ul class="bpanel-layout-set">
                        <?php $posts_layout = array('one-half-column' => __("Two products per row.",'iamd_text_domain'),'one-third-column' => __("Three products per row.",'iamd_text_domain'),'one-fourth-column' => __("Four products per row.",'iamd_text_domain'));
									$v = dt_theme_option('woo',"shop-page-product-layout");
									$v = !empty($v) ? $v : "one-half-column";
								  foreach($posts_layout as $key => $value):
									$class = ( $key ==  $v ) ? " class='selected' " :"";								  
									echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png' /></a></li>";
                           		 endforeach;?>                        
                        </ul>
                        <input name="mytheme[woo][shop-page-product-layout]" type="hidden" value="<?php echo $v;?>"/>
                    </div><!-- .Layout End -->
                    
                </div><!-- SHOP PAGE -->
                
				<!-- Product Page -->
            	<div class="box-title"><h3><?php _e('Product Detail','iamd_text_domain');?></h3></div>
                <div class="box-content">
                	<!-- Product Detail Page Layout -->
                    <h6><?php _e('Layout','iamd_text_domain');?></h6>
                    <p class="note no-margin"> <?php _e("Choose the Product Page Layout","iamd_text_domain");?></p>
                    <div class="hr_invisible"> </div>
                    <div class="bpanel-option-set">
                    	<ul class="bpanel-layout-set">
                        <?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar');
							  $v = 	dt_theme_option('woo',"product-layout");
							  $v = !empty($v) ? $v : "content-full-width";
							  
                        foreach($layout as $key => $value):
                            $class = ( $key ==  $v ) ? " class='selected' " : "";
                            echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
                        endforeach; ?>
                        </ul>
                        <input name="mytheme[woo][product-layout]" type="hidden" value="<?php echo $v;?>"/>
                    </div><!-- Product Detail Page Layout End-->
                </div><!-- Product Page -->

				<!-- Product Category Page -->
            	<div class="box-title"><h3><?php _e('Product Category','iamd_text_domain');?></h3></div>
                <div class="box-content">
                	<!-- Product Detail Page Layout -->
                    <h6><?php _e('Layout','iamd_text_domain');?></h6>
                    <p class="note no-margin"> <?php _e("Choose the Product category page layout Style","iamd_text_domain");?></p>
                    <div class="hr_invisible"> </div>
                    <div class="bpanel-option-set">
                    	<ul class="bpanel-layout-set">
                        <?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar');
							  $v = 	dt_theme_option('woo',"product-category-layout");
							  $v = !empty($v) ? $v : "content-full-width";
							  
                        foreach($layout as $key => $value):
                            $class = ( $key ==  $v ) ? " class='selected' " : "";
                            echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
                        endforeach; ?>
                        </ul>
                        <input name="mytheme[woo][product-category-layout]" type="hidden" value="<?php echo $v;?>"/>
                    </div><!-- Product Detail Page Layout End-->

                </div><!-- Product Category Page -->

				<!-- Product Tag Page -->
            	<div class="box-title"><h3><?php _e('Product Tag','iamd_text_domain');?></h3></div>
                <div class="box-content">
                	<!-- Product Detail Page Layout -->
                    <h6><?php _e('Layout','iamd_text_domain');?></h6>
                    <p class="note no-margin"> <?php _e("Choose the Product tag page layout Style","iamd_text_domain");?></p>
                    <div class="hr_invisible"> </div>
                    <div class="bpanel-option-set">
                    	<ul class="bpanel-layout-set">
                        <?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar');
							  $v = 	dt_theme_option('woo',"product-tag-layout");
							  $v = !empty($v) ? $v : "content-full-width";
						
                        foreach($layout as $key => $value):
                            $class = ( $key ==   $v ) ? " class='selected' " : "";
                            echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
                        endforeach; ?>
                        </ul>
                        <input name="mytheme[woo][product-tag-layout]" type="hidden" value="<?php echo $v;?>"/>
                    </div><!-- Product Detail Page Layout End-->
                    
                </div><!-- Product Tag Page -->
<?php 	else: ?>
				<div class="box-title"><h3><?php _e('Warning','iamd_text_domain');?></h3></div>
                <div class="box-content"><p class="note"><?php _e("You have to install and activate the wooCommerce plugin to use this module ..",'iamd_text_domain');?></p></div>
<?php   endif;?>                
            </div><!--.bpanel-box End -->
        </div><!-- #my-woocommerce ends here -->        

    </div><!-- .bpanel-main-content ends here-->    
</div><!-- #woocommerence end-->