<?php get_header();

	  //GETTING META VALUES...
	  $page_layout = dt_theme_option('specialty', 'search-layout');
	  
	  //BREADCRUMP...
	  if(dt_theme_option('general', 'disable-breadcrumb') != "on"): ?>
          <!-- breadcrumb starts here -->
          <section class="breadcrumb-wrapper">
              <div class="container">
                  <h1><?php printf(__('Search Results for : %s', 'iamd_text_domain'), get_search_query()); ?></h1>
                  <?php new dt_theme_breadcrumb; ?>
              </div>                      
          </section>
          <!-- breadcrumb ends here --><?php
	  endif; ?>    

	  <!-- content starts here -->
	  <div class="content">
          <div class="container">
              <section class="<?php echo $page_layout; ?>" id="primary">
                  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php
                      //PERFORMING SEARCH LAYOUT...
                      get_template_part('includes/archive-post-layout'); ?>
                  </article>
              </section>
              <?php if($page_layout != 'content-full-width' && $page_layout == 'with-left-sidebar'): ?>
                  <section class="left-sidebar" id="secondary"><?php get_sidebar(); ?></section>
              <?php elseif($page_layout != 'content-full-width' && $page_layout == 'with-right-sidebar'): ?>    
                  <section id="secondary"><?php get_sidebar(); ?></section>
              <?php endif; ?>
          </div>
      </div>
      <!-- content ends here -->

<?php get_footer(); ?>