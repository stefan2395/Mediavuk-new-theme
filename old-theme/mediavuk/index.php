<?php get_header(); ?>

<div class="content mainBlog">

     <div class="breadCrumb pt50 breadcrumb_single_project desktop_breadcrumb">
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to Home." href="<?php echo esc_url(home_url('/')); ?>" class="home">
                    <span property="name">Home</span>
                </a><meta property="position" content="1">
            </span>

            /<span property="itemListElement" typeof="ListItem">
                <a property="item"
                   typeof="WebPage"
                   title="Go to Project."
                   href="<?php echo esc_url(home_url('/blog/')); ?>"
                   class="post post-project-archive">
                    <span property="name">Blog</span>
                </a>
                <meta property="position" content="2">
            </span>
        </div>

<style type="text/css">
  
  .postThumb a{width: 100%;position: relative;height: 100%;display: block;
backface-visibility: hidden;}
  .postThumb a::after {
content: '';
  animation:out 2s;
  -webkit-animation: out 2s;
backface-visibility: hidden;
  }


/*@-webkit-keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}
*/

@keyframes in {
    from {opacity: 0;}
    to {opacity: 1;}
}
@keyframes out {
       from {opacity:1;}
    to {opacity: 0;}
}


.postThumb a:hover::after,
.postThumb a:focus::after {
content: '';
  background: red;display:block;height: 100%;width:100%;
  position: absolute;
  left: 0;right: 0;width: 100%;height: 100%;
  animation:in 2s;
  -webkit-animation: in 2s;
  display: block;
 background: rgba(0,0,0,0) linear-gradient(to bottom, transparent 0%,transparent 0%,rgba(0,0,0,0.5) 100%,rgba(0,0,0,0.1) 100%) repeat scroll 0 0;
          opacity: 1;
  top:0;
  margin: auto;

}
.cat-item.cat-item-1 {

  display: none
}
</style>
                 <div class="wide-1160">

                
                  <h1 class="blogMain">Blog </h1>

                  <span class="taglineBlog">Take a look at our creative minds</span>


                    <div class="grid-65 fl" style="padding-left: 25px;padding-right: 25px">

                    <div class="blogListing">

                    <ul>
                         <?php
                            $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
                            
                            $args = array(
                                'post_type'     => 'post',
                                'post_per_page' => 5,
                                'paged'         => $paged
                            );
                            $posts = new WP_Query($args);
                            if ($posts->have_posts()) {
                                while ($posts->have_posts()) {
                                    $posts->the_post();
                            ?>
                         <li>
                           
                               
                              
                               <div class="postContent">

                                <?php 
                                  $postthumb    = get_field('postthumb');
                                ?>
                                  <!-- start postContent -->
                                  <div class="postThumb"> <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo $postthumb['sizes']['blog_image']; ?>"></a></div>
                                
                                   <span class="categoryMediavuk"><?php the_category(); ?></span>
                                   
                                   <a href="<?php echo get_the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

      
                
                                    
                                  <span class="datePost"><?php echo get_the_date('F j, Y') ?></span>

                                      <div class="postExcerptContent">
                                        
                                        <?php the_field('excerpt'); ?>
                                          

                                        </div>
                      


         <div class="permalink">
                            <a href="<?php echo get_the_permalink(); ?>">Read More</a></div> <!-- ### ADD READ MORE TEXT HERE-->
                            </div><!-- ned postContent -->




                                  
                         
                           
                         </li>


                     
                         <?php
                            }
                            } else {
                            echo 'No posts!'; // ### ADD NO POSTS MESSAGE HERE
                            }
                            ?>

                                <div class="contentPagination">
                      
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

                                </ul>

                        </div> <!-- end pagination -->

                         
             

                        </div>


                      <div class="grid-30 fl"><?php dynamic_sidebar( 'blog-sidebar' ); ?></div>

                  </div>       
                         
              </div>
                

</div>       

  <script>

    $(window).on('load ready', function(){
          $('#searchform').submit(function(e) { 
              var s = $( this ).find("#s").val($.trim($( this ).find("#s").val()));
              if (!s.val()) {
                  e.preventDefault(); 
                  alert("No search results for your search!");
                  $('#s').focus();
              }
          });
      });

  </script>
<!-- end mainContent -->

<!-- =============================================================================
   BLOG STRUCTURE:= end mainContent
   =============================================================================-->
<?php get_footer();