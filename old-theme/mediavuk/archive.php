<?php
   /**
    * The template shows Archive Page
    *
    */
   
   get_header(); ?>
<!-- =============================================================================
   PAGE STRUCTURE:= start mainContent
   =============================================================================-->

<div class="content mainBlog">

    <div class="wide-1160 blog archiveMediavuk">
               <?php
                  the_archive_title( '<h1 class="archive">', '</h1>' );
                  the_archive_description( '<div class="taxonomy-description">', '</div>' );
                     ?>
               <ul>
                  <?php
                     $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
                     $monthnum = (get_query_var('monthnum')) ? absint(get_query_var('monthnum')) : -1;
                     $year = (get_query_var('year')) ? absint(get_query_var('year')) : -1;
                     
                     $args = array(
                         'post_type'     => 'post',
                         'post_per_page' => 10,
                         'paged'         => $paged,
                     );
                     if($monthnum != -1 && $year != -1){
                        $args["monthnum"] = $monthnum;
                        $args["year"] = $year;
                     }
                     $posts = new WP_Query($args);
                     if ($posts->have_posts()) {
                         while ($posts->have_posts()) {
                             $posts->the_post();
                             ?>
                  <li>
                      <span class="datePost"><?php echo get_the_date('d.m.y') ?></span>
                     <h3><?php the_title() ?></h3>
                     <div class="postContent">
                        <!-- start postContent -->
                        <div class="postExcerpt"><?php the_field('excerpt'); ?></div>
                          <div class="permalink">
                            <a href="<?php echo get_the_permalink(); ?>">Read More</a></div>
                     </div>
                     <!-- end postContent -->
                  </li>
                  <?php
                     }
                     } else {
                     echo 'No matching results found. Please modify your search criteria and try searching again.!';
                     }
                     ?>

            </ul>

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
       

       </div>
   </div>

<?php get_footer();