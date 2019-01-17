<?php
   /**
    * The template shows Search Results
    *
    */
   
   get_header(); ?>
<!-- =============================================================================
   PAGE STRUCTURE:= start mainContent
   =============================================================================-->
<div class="mainContent">
   <!-- start mainContent-->
   <div class="spacer"></div>
   <!-- end spacer -->
   <div class="desktop">
      <!-- start  desktop-->
      <div class="table">
         <!-- start table -->
         <div class="gap">
            <!-- start gap -->
            <div class="content blog searchResults">
               <!-- start content -->
               <?php _e("<h1 class='searchTitle'>Search results: " . get_query_var('s') . "</h1>"); ?>
               <ul>
                  <?php
                     $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
                     
                     $s = get_search_query();
                     
                     $args = array(
                         'post_type' => 'post',
                         's'             => $s,
                         'post_per_page' => 10,
                         'paged'         => $paged
                     );
                     $posts = new WP_Query($args);
                     if ($posts->have_posts()) {
                         while ($posts->have_posts()) {
                             $posts->the_post();
                             ?>
                  <li>
                     <span class="date"><?php echo get_the_time('d.m.y') ?></span>
                     <h3><?php the_title() ?></h3>
                     <div class="postContent">
                        <!-- start postContent -->
                        <div class="postExcerpt"><?php the_excerpt(); ?></div>
                        <div class="permalink"><a href="<?php echo get_the_permalink(); ?>">Keep reading</a></div> <!-- ### ADD READ MORE TEXT HERE -->
                     </div>
                     <!-- end postContent -->
                  </li>
                  <?php
                     }
                     } else {
                     echo '<ul class="searchNo"><li>'. 'No results were found. Please check the search criteria and try again.'.'<br>'.'</li>'; // ### ADD NO RESULTS TEXT HERE
                     echo '<li>'.'<a title="Back to home page" href="' . get_home_url() .'">Blog</a>' .'</li>'.'</ul>';
                     }
                     ?>
                  <div class="pagination">
                     <!-- start pagination-->
                     <?php $big = 999999999; // need an unlikely integer
                        echo paginate_links(array(
                            'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format'    => '?paged=%#%',
                            'current'   => max(1, get_query_var('paged')),
                            'total'     => $posts->max_num_pages,
                            'mid_size'  => 1,
                            'prev_text' => "<",
                            'next_text' => ">"
                        )); ?>
                  </div>
                  <!-- end pagination-->
               </ul>
            </div>
            <!-- end content -->
         </div>
         <!-- end gap -->
      </div>
      <!-- end table -->
   </div>
   <!-- end desktop -->
</div>
<!-- start mainContent-->
<!-- =============================================================================
   PAGE STRUCTURE:= end mainContent
   =============================================================================-->
   <script>

    $(window).on('load ready', function(){
          $('#searchform').submit(function(e) { 
              var s = $( this ).find("#s").val($.trim($( this ).find("#s").val()));
              if (!s.val()) {
                  e.preventDefault(); 
                  alert("Aramanız için uygun sonuç yok!");
                  $('#s').focus();
              }
          });
      });

  </script>
<?php get_footer();