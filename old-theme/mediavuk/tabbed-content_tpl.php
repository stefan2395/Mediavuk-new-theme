<?php
/*
  Template Name: Tabbed Content
 */
get_header();
?>


    <div class="content pt-80"> <!-- CONTENT START -->

      
<style>
  

@media only screen and (max-width: 1280px) {
div.tab div div.activeTitle {

  display: none;
}

</style>



        <div class="wide-1440 skipToContentFade">

        


            <div class="mediavukServices  center"><!-- start mediavukServices -->
                  
				
   <!-- start page navigation   -->

		<div class="footerNavigation">

			<div class="fl"><a href="<?php the_field('ln'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/left-direction.svg"><span><?php the_field('lname'); ?></span></a></div>  
			<div class="fr"><a href="<?php the_field('rn'); ?>"><span><?php the_field('rname'); ?></span><img src="<?php echo get_template_directory_uri(); ?>/images/right-navigation.svg"></a></div>

		</div>
			
	           <div class="clear"></div>

		<!-- end page navigation -->  

					<h1><?php the_title(); ?></h1>
                  
<div class="grid-25 center"> <?php the_field('servicescontent'); ?></div>
                 

                 

             </div><!-- end mediavukServices -->


            <div class="tabContainer"><!-- start tabContainer -->

                    <div class="tab"><!-- start tab -->

                         <?php
                               $counter = 1;
                            $field = get_field('tab_links');
                                  
                              if( $field ): ?>
                                       
                                       <?php foreach($field as $row): ?>

                                          <?php 

                                               $active = $row['active'];
                                               $hover  = $row['hover'];
                                               $id     = $row['id'];
                                               $linkid = $row['link_id'];
                                               $icontitle = $row['icontitle'];

                                            ?>

                                          <?php if($id): ?><?php $tab = 'id="defaultOpen"'; ?><?php endif; ?>
                                          
                                          <div style="margin: 0 20px">
                                            <div class="tablinks" onclick="project(event, '<?php echo $linkid; ?>')"  <?php echo $tab; ?>><!-- start tablinks -->
                                               <span class="iconCounter"><?php echo $counter++; ?>.</span>
                                              <span class="titleIcon"><?php echo $icontitle; ?></span>

                                              <div class="tabInner"><!-- start tabInner -->
                                                <img src="<?php echo $active; ?>"> 
                                               
                                                   <div class="tabActive"><!-- start tabActive -->
                                                    
                                                      <img src="<?php echo $hover; ?>">
                                                 
                                                   </div><!--end tabActive -->
                                                  
                                               </div><!-- end tabInner -->
                                            
                                            </div><!-- end tablinks -->
</div>
                                        <?php endforeach; ?>

                                      <?php endif; ?>

                                 </div><!-- end tab -->

                       
                          <?php

                            $field = get_field('description');
                                  
                                    if( $field ): ?>
                                       
                                             <?php foreach($field as $row): ?>

                                                <?php 

                                                     $listDesc = $row['description_list'];
                                                     $pic  = $row['infographics'];
                                                     $id     = $row['contentid'];
                                                     $description = $row['tabdescription'];

                                                  ?>
                                      

                                                   <div id="<?php echo $id; ?>" class="tabcontent"><!-- start  taBmainContent -->

                                                       <div class="grid-70 fl"><!-- start  grid-70 fl -->

                                                          <div class="tabDescription"><!-- start tabDescription -->
                                                        
                                                            <?php echo $description; ?>

                                                         </div><!-- end tabDescription -->

                                                            
                                                         <div class="tabList"><!-- start  tabList -->


                                                         <?php echo $listDesc; ?>

                                                           
                                                         </div><!-- end  tabList -->

                                                    </div><!-- end  grid-70 fl -->

                                                    <div class="grid-30 fl infographics"><!-- start grid-30 -->
                                                      
                                                         <img src="<?php echo $pic; ?>">

                                                    </div><!-- end grid-30 -->

                                                 </div><!-- end taBmainContent -->

                                        <?php endforeach; ?>

                                      <?php endif; ?>

                           </div><!-- end tabContainer -->


                          <div class="vallenato">



                              <?php

                            $counterNew=1;
                            $counterNewIvana = 1;      
                            $field = get_field('description');
                                  
                                    if( $field ): ?>
                                       
                                             <?php foreach($field as $row): ?>

                                                <?php 

                                                     $listDesc = $row['description_list'];
                                                     $pic  = $row['infographics'];
                                                     $id     = $row['contentid'];
                                                     $description = $row['tabdescription'];     
                                                     $active = $row['active'];
                                                     $hover  = $row['hover'];
                                                     $id     = $row['id'];
                                                     $linkid = $row['link_id'];
                                                     $icontitle = $row['icontitle'];

                                                  ?>
                                                  
                                                 <div class="vallenato-header">
                                                  <div class="tablinks"><!-- start tablinks -->
                                    <!--            <span class="iconCounter"><?php echo $counter++; ?>.</span> -->
                                           

                                              <div class="tabInner"><!-- start tabInner -->
  
                                                   <span class="titleIcon"><?php echo $counterNew++; ?>.<?php echo $icontitle; ?></span>
                                                <img src="<?php echo $active; ?>"> 
                                               
                                                   <div class="tabActive"><!-- start tabActive -->
                                                      <span class="titleIcon"> <?php echo $counterNewIvana++; ?>.<?php echo $icontitle; ?></span>
                                                      <img src="<?php echo $hover; ?>">
                                                 
                                                   </div><!--end tabActive -->
                                                  
                                               </div><!-- end tabInner -->
                                            
                                            </div><!-- end tablinks -->
                                                            </div><!--/.vallenato-header-->

                                                            <div class="vallenato-content">


                                                                 <div class="tabDescription"><!-- start tabDescription -->
                                                        
                                                                    <?php echo $description; ?>

                                                                 </div><!-- end tabDescription -->

                                                                    
                                                                 <div class="tabList"><!-- start  tabList -->


                                                                 <?php echo $listDesc; ?>

                                                                   
                                                                 </div><!-- end  tabList -->

                                                            </div><!--/.vallenato-content-->
           
                                           <?php endforeach; ?>

                                      <?php endif; ?>



                          </div><!--/.vallenato-->
                           

                <script>
                  $(document).ready(function() {
                    vallenato();
                  });
                </script>

<style>

.footerNavigation {padding:0 25px;  
    position: absolute;
    width: 100%;
    top: 25px;}

    .mediavukServices {position: relative;}
.footerNavigation a {

	color: #a9915f;
	font-size: 18px;
	transition: 0.3s;
font-style: italic;
font-weight: 600;letter-spacing: 0.05em;
}

.footerNavigation a:hover {

	color: #6b6b6b
}


.footerNavigation span {display: inline-block!important;vertical-align: middle;}
.footerNavigation a:first-child span {padding-left: 30px
}
.footerNavigation a:last-child span {padding-right: 30px}

  
.vallenato {display: none;}

  @media screen and (max-width: 780px) {


div.tab div div.activeTitle {

  display: inline-block;
}

  .tabDescription, .tabList {

  padding-left: 45px;
  padding-right: 45px;
  padding-top: 0;
}



.page-template-tabbed-content_tpl .grid-55.out{

  width: 70%
}

.mediavukServices .grid-25 {

  width: 100%;
  padding:0 25px 25px 25px
}
.mediavukServices {

	padding-bottom: 15px
}

.footerNavigation {

	    position: static;
    padding-left: 25px;
    padding-right: 25px;
    padding-bottom: 75px;
    padding-top: 25px
}

div.tab div {

  display: block;
  text-align: left;
}

div.tab div.iconDetails {

  display: none!important;
}
.tabInner {

  border-width:1px;
}

div.tab div.activeTitle {

  padding-left: 15px;
  display: inline-block;
  vertical-align: middle;
  text-transform: uppercase;
  font-weight: 700;letter-spacing: 0.25em;
  color: #6b6b6b;
  font-size: 14px;
}


.page-template-tabbed-content_tpl .grid-55.out {width: 80%;margin-top: 50px;}

.page-template-tabbed-content_tpl .grid-55.out::before,
.page-template-tabbed-content_tpl .grid-55.out::after {
  display: table;content: '';clear: both
}
.mediavukServices.grid-25 {width: 100%;padding: 0 20px 58px 20px}

.tabContainer {display: none;}
.vallenato {display: block;}


/*Headers*/

.vallenato-header {
  overflow: hidden;
/*  border: 1px solid #cccccc;
  border-radius: 4px;
  padding: 10px;
  font-weight: bold;
  margin-top: 5px;
  background: #eeeeee;*/
max-width: 60%;
margin:0 auto 15px auto;
position: relative;

}

.vallenato-header:hover {color: #fff!important}
.vallenato-header .tabInner .tabActive,
.vallenato-header .tabInner  {

padding: 15px;
}

.vallenato-header .titleIcon {

  text-align: center;
  margin-bottom: 15px;
}

.vallenato-active {


    /* transition: left 1s linear; */
    /* border: 2px solid #a9915f; */

}
.vallenato-header:hover {
  cursor: pointer;
/*  background: #e7e7e7;*/
}

.vallenato-active {
 /* border-radius: 4px 4px 0 0;*/

}

.vallenato-active .tabInner .tabActive {
  opacity: 1;color: #fff;
background:#a99160}

/*Content*/

.vallenato-content {
  overflow: hidden;

  display: none;
  margin-bottom: 50px

}
}
  @media screen and (max-width: 580px) {
.vallenato-header .titleIcon {

  font-size: 14px
}
.vallenato-header {
  max-width: none;
  width: 80%!important
}
.normal46 {

  padding-top: 0;
  padding-bottom: 0;
}

}

</style>
           
           <div class="clear"></div>



         <div class="grid-55 center out"><!-- outlined blockquote -->
            <blockquote class="outlined">
                <p>During work process, customers can go back a few steps
                  if they think that something is not right.
                  Working in this way could save a lot of time and money.</p>
       
            <span class="gold">
                It‘s better to fix everything in progress, than after the project is done.

              </span>

            </blockquote>
        </div><!-- end outlined blockquote -->


     
                


            <script>



              // if(window.screen.width > 780 &&  window.outerWidth > 780 && window.innerWidth > 780)
                                    {
                                        
                                          function project(evt, projectName) {
                                              var i, tabcontent, tablinks;
                                              tabcontent = document.getElementsByClassName("tabcontent");
                                              for (i = 0; i < tabcontent.length; i++) {
                                                  tabcontent[i].style.display = "none";
                                              }
                                              tablinks = document.getElementsByClassName("tablinks");
                                              for (i = 0; i < tablinks.length; i++) {
                                                  tablinks[i].className = tablinks[i].className.replace(" active", "");
                                              }
                                              document.getElementById(projectName).style.display = "block";
                                              evt.currentTarget.className += " active";
                                          }

                                          // Get the element with id="defaultOpen" and click on it
                                          document.getElementById("defaultOpen").click();
                                    }


            </script>


        </div><!-- wide-1440 end -->


    </div><!-- CONTENT end -->

  
<?php get_footer(); ?>