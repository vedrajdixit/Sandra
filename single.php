<?php get_header();

	while(have_posts()): the_post();
		
	  //GETTING META VALUES...
	  $meta_set = get_post_meta($post->ID, '_dt_post_settings', true);
	  $page_layout = !empty($meta_set['layout']) ? $meta_set['layout'] : 'content-full-width';
	  
	  $feature_image = "";
	  
	  if($page_layout != "content-full-width") {
		$feature_image = "blog-full-sidebar";
	  }
	  else {
		$feature_image = "blog-full";
	  }
	  //BREADCRUMP...
	  if(dt_theme_option('general', 'disable-breadcrumb') != "on"): ?>
          <!-- breadcrumb starts here -->
          <section class="breadcrumb-wrapper">
              <div class="container">
                  <h1><?php the_title(); ?></h1>
                  <?php new dt_theme_breadcrumb; ?>
              </div>                      
          </section>
          <!-- breadcrumb ends here --><?php
	  endif; ?>

	  <!-- content starts here -->
	  <div class="content">
          <div class="container">
              <section class="<?php echo $page_layout; ?>" id="primary">
                  <div class="column dt-sc-one-column blog-fullwidth<?php if($page_layout != "content-full-width") echo " with-sidebar"; ?>">
                      <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
                          <div class="post-details"><?php
                              if(isset($meta_set['disable-date-info']) == ""): ?>                
                                  <div class="date"><span><?php echo get_the_date('d'); ?></span><?php echo get_the_date('M'); ?><br /><?php echo get_the_date('Y'); ?></div><?php
                              endif;
                              if(isset($meta_set['disable-comment-info']) == ""): ?>
                                  <div class="post-comments">
									<?php comments_popup_link('0 <i class="fa fa-comment"></i>', '1 <i class="fa fa-comment"></i>', '% <i class="fa fa-comment"></i>', '', '0 <i class="fa fa-comment"></i>'); ?>
                                  </div><?php
                              endif;
							  //POST FORMAT...
							  $format = get_post_format(); ?>
			                  <span class="post-icon-format"> </span>
                          </div>
                          <div class="post-content">

                              <div class="entry-thumb">
                                  <?php if(is_sticky()): ?>
                                      <div class="featured-post"><?php _e('Featured','iamd_text_domain'); ?></div>
                                  <?php endif; ?>
                                  
                                  <!-- POST FORMAT STARTS -->
                                  <?php if( $format === "image" || empty($format) ): ?>
                                          <a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
                                          <?php if( has_post_thumbnail() ):
                                                  $attr = array('title' => get_the_title()); the_post_thumbnail($feature_image, $attr);
                                                else: ?>
                                                  <img src="http://placehold.it/840x340&text=Image" alt="<?php the_title(); ?>" />
                                          <?php endif;?>
                                          </a>
                                  <?php elseif( $format === "gallery" ):
                                          $post_meta = get_post_meta(get_the_id() ,'_dt_post_settings', true);
                                          if( array_key_exists("items", $post_meta) ):
                                              echo "<ul class='entry-gallery-post-slider'>";
                                              foreach ( $post_meta['items'] as $item ) { echo "<li><img src='{$item}' /></li>";	}
                                              echo "</ul>";
                                          endif;
                                        elseif( $format === "video" ):
                                              $post_meta =  get_post_meta(get_the_id() ,'_dt_post_settings', true);
                                              if( array_key_exists('oembed-url', $post_meta) || array_key_exists('self-hosted-url', $post_meta) ):
                                                  if( array_key_exists('oembed-url', $post_meta) ):
                                                      echo "<div class='dt-video-wrap'>".wp_oembed_get($post_meta['oembed-url']).'</div>';
                                                  elseif( array_key_exists('self-hosted-url', $post_meta) ):
                                                      echo "<div class='dt-video-wrap'>".apply_filters( 'the_content', $post_meta['self-hosted-url'] ).'</div>';
                                                  endif;
                                              endif;
                                        elseif( $format === "audio" ):
                                              $post_meta =  get_post_meta(get_the_id() ,'_dt_post_settings', true);
                                              if( array_key_exists('oembed-url', $post_meta) || array_key_exists('self-hosted-url', $post_meta) ):
                                                  if( array_key_exists('oembed-url', $post_meta) ):
                                                      echo wp_oembed_get($post_meta['oembed-url']);
                                                  elseif( array_key_exists('self-hosted-url', $post_meta) ):
                                                      echo apply_filters( 'the_content', $post_meta['self-hosted-url'] );
                                                  endif;
                                              endif;
                                        else: ?>
                                          <a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php
                                              if( has_post_thumbnail() ):
                                                  $attr = array('title' => get_the_title()); the_post_thumbnail($feature_image, $attr);
                                              else:?>
                                                  <img src="http://placehold.it/840x340&text=Image" alt="<?php the_title(); ?>" />
                                          <?php endif;?>
                                          </a>
                                  <?php endif; ?>
                                  <!-- POST FORMAT ENDS -->
                              </div>
                                  
                              <div class="entry-detail">
                                  <h2><?php the_title(); ?></h2><?php
                                  //PAGE TOP CODE...
                                  if(dt_theme_option('integration', 'enable-single-post-top-code') != '') echo stripslashes(dt_theme_option('integration', 'single-post-top-code'));
                                  the_content();
                                  wp_link_pages(array('before' => '<div class="page-link"><strong>'.__('Pages:', 'iamd_text_domain').'</strong> ', 'after' => '</div>', 'next_or_number' => 'number'));
                                  edit_post_link(__('Edit', 'iamd_text_domain'), '<span class="edit-link">', '</span>' );
                                  echo '<div class="social-bookmark">';
                                  show_fblike('post'); show_googleplus('post'); show_twitter('post'); show_stumbleupon('post'); show_linkedin('post'); show_delicious('post'); show_pintrest('post'); show_digg('post');
                                  echo '</div>';
                                  dt_theme_social_bookmarks('sb-post');
                                  if(dt_theme_option('integration', 'enable-single-post-bottom-code') != '') echo stripslashes(dt_theme_option('integration', 'single-post-bottom-code')); ?>
                              </div>
                              <?php if(isset($meta_set['disable-author-info']) == "" || isset($meta_set['disable-category-info']) == "" || isset($meta_set['disable-tag-info']) == ""): ?>
                                  <div class="post-meta">
                                      <ul><?php
                                          if(isset($meta_set['disable-author-info']) == ""): ?>								
                                              <li><span class="fa fa-user"></span><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author_meta('display_name'); ?></a></li><?php
                                          endif;
                                          if(isset($meta_set['disable-category-info']) == "" && count(get_the_category())): ?>
                                              <li><span class="fa fa-thumb-tack"></span><?php the_category(', '); ?></li><?php
                                          endif;
                                          if(isset($meta_set['disable-tag-info']) == ""):
										  	  the_tags('<li><span class="fa fa-pencil"></span>', ', ', '</li>');
                                          endif; ?>
                                      </ul>
                                  </div>
                              <?php endif; ?>                        
                          </div>
                      </article>
                  </div>
                  
                  <?php if(get_the_author_meta('description')): ?>
                      <div class="post-author-details">
                          <h4><?php _e('About the Author', 'iamd_text_domain'); ?></h4>
                          <div class="entry-author-image"><?php echo get_avatar(get_the_author_meta('user_email'), $size = '60'); ?></div>
                          <div class="author-desc">
                              <h5><a href="<?php echo get_author_posts_url( get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a></h5>
                              <p><?php the_author_meta('description'); ?></p>
                          </div>
                      </div>
                  <?php endif;
                  if(dt_theme_option('general', 'global-post-comment') != true && (isset($meta_set['disable-comment']) == "")) comments_template('', true); ?>
                  
              </section>
              <?php if($page_layout != 'content-full-width' && $page_layout == 'with-left-sidebar'): ?>
                  <section class="left-sidebar" id="secondary"><?php get_sidebar(); ?></section>
              <?php elseif($page_layout != 'content-full-width' && $page_layout == 'with-right-sidebar'): ?>    
                  <section id="secondary"><?php get_sidebar(); ?></section>
              <?php endif;
        endwhile; ?>
          </div>
      </div>
      <!-- content ends here -->

<?php get_footer(); ?>