<?php
   /**
    * The template shows Blog Single Post
    *
    */
   
   get_header(); ?>
<?php while (have_posts()) : the_post(); //GLOBAL WP LOOP  ?>
<!-- =============================================================================
   PAGE STRUCTURE:= start mainContent
   =============================================================================-->
        <style type="text/css">
          
.post-template-default h1 {text-align: left!important;}

        </style>
 <?php 
                                  $postthumb    = get_field('postthumb');
                                ?>
<div class="content mainBlog">
        <div class="breadCrumb pt50 breadcrumb_single_project desktop_breadcrumb">
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to Home." href="<?php echo esc_url(home_url('/')); ?>" class="home">
                    <span property="name">Home</span>
                </a><meta property="position" content="1">
            </span>/<span property="itemListElement" typeof="ListItem">
                <a property="item"
                   typeof="WebPage"
                   title="Go to Project."
                   href="<?php echo esc_url(home_url('/blog/')); ?>"
                   class="post post-project-archive">
                    <span property="name">Blog</span>
                </a>
                <meta property="position" content="2">
            </span>/<span property="itemListElement" typeof="ListItem">
                <span property="name"><?php the_title(); ?></span>
                <meta
                    property="position" content="3">
            </span>
        </div>
    <div class="wide-1160 blog">

            <div class="grid-65 fl" style="padding-left: 15px;padding-right: 25px">

               <div data-aos="fade-down" class="postThumb" style="padding-top: 10px"><img src="<?php echo $postthumb['sizes']['blog_image']; ?>">



               </div>
              
 <span class="categoryMediavuk"><?php the_category(); ?></span>
<h1><?php the_title(); ?></h1>

<div class="entry-avatar">
  
  <span class="mediavukAutor">    <?php
$user = "Jelena Petkovic";
 
if ( $user ) :
    ?>
    <img src="https://mediavuk.com/wp-content/uploads/2017/09/jelena-petkovic-mediavuk-1.jpg" />
<?php endif; ?></span>

<span class="jelenaPetkovic">
  
  <span>by</span> <?php echo get_the_author(); ?>
</span>


  <span><?php echo get_the_date('F j, Y') ?></span>

  

</div>


<style type="text/css">
  
  .entry-avatar {

        margin: 15px 0 40px;
  }
.entry-avatar>* {
    display: inline-block;
    padding-right: 10px;
    vertical-align: middle;
    color: #6b6b6b
}
.mediavukAutor img {

  width: 40px;height: 40px;border-radius: 50%;
}

span.jelenaPetkovic {padding-right: 10px}
span.jelenaPetkovic > span {

  color: #a9915f
}

span.jelenaPetkovic::after {
content: '|';
color: #6b6b6b;
margin-left: 15px;

}

.entry-avatar span:last-child {

  font-size: 14px;
}

.rpwwt-post-date {

  font-size: 13px;font-family: 'PT Sans', sans-serif;
}

.rpwwt-widget ul li {margin-bottom: 7px!important}
.rpwwt-widget ul li:last-child {margin-bottom: 0;}


</style>


               
             
                <?php include 'inc/acf-flexible-content-blog.php'; ?>
               

                    <!-- start tags -->
                            <div class="tags">
                            Tags: 
                            <?php 
                                    $args = array(
                                     'smallest'                  =>15, 
                                    'largest'                   => 27,
                                    'unit'                      => 'px', 
                                    'number'                    => 45,  
                                    'format'                    => 'flat',
                                    'separator'                 => ",",
                                    ); 

                                    wp_tag_cloud( $args );
                                  ?>
                                                               </div>
                                <!-- end tags -->

               <!-- end social media sharing -->
              <!--  <div style="padding-top: 5px;border-top: 1px solid #ededed">
                  <div class="fl"><?php previous_post_link('%link', '&laquo; Prev', TRUE); ?></div>
                  <div class="fr"><?php next_post_link('%link', 'Next &raquo;', TRUE); ?> </div>
               </div> -->
              
                                <div class="authorBio"><!-- start authorBio -->

                                      
                                    <div class="avatarPhoto dib"><?php echo get_avatar( get_the_author_meta( 'ID' )); ?></div>
                                      <div class="avatarInfo grid-70 dib alignMiddle">

                                        <span><?php the_author(); ?></span>
                                        <div class="authorinfo"><?php echo get_the_author_meta('description'); ?></div>

                                     </div>

                                 </div>
                                 
                      <div class="clear"></div>
         

  </div>

     
            <div class="grid-30 fl"><?php dynamic_sidebar( 'blog-sidebar' ); ?></div>

<?php endwhile; // End of the GLOBAL WP LOOP. ?>
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

</div><!-- end wide1160 -->
</div>
<?php get_footer();