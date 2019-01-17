<?php

if (have_rows('flexible_content')):
    while (have_rows('flexible_content')) : the_row(); ?>


    <?php if (get_row_layout() == 'paragraph') { ?>

        <div class="paragraph">
            <?php the_sub_field('paragraph'); ?>
        </div>

    <?php } ?>


       <?php if (get_row_layout() == 'blockquote') { ?>

        <blockquote class="blog">
            <?php the_sub_field('blockquote'); ?>
        </blockquote>

       <?php } ?>

<?php if (get_row_layout() == "list") { ?>
        <?php if (have_rows('unordered_list')): ?>

            <ul class="unorderedList">

                <?php while (have_rows('unordered_list')):
                    the_row(); ?>

                    <li>
                        <span> <?php the_sub_field('list_item_content'); ?></span>
                       
                    </li>

                <?php endwhile; ?>

            </ul>

        <?php endif; ?>
    <?php } ?>


<?php if (get_row_layout() == "files") { ?>
        <?php if (have_rows('fileList')): ?>

            <ul class="fileTypes">

                <?php while (have_rows('fileList')):
                    the_row(); ?>

                    <li>    

                       <span><i class="fa <?php the_sub_field('type'); ?>" aria-hidden="true"></i></span> 
                       <span><a target="_blank" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('linkname'); ?></a></span>
                       
                    </li>

                <?php endwhile; ?>

            </ul>

        <?php endif; ?>
    <?php } ?>




<?php if (get_row_layout() == "video") { ?>
    
            <div class="video">
            
                    <div class="embed-container">
                 
                          

                           <?php the_sub_field('video'); ?>
                        

                    </div> 

            </div>

    <?php } ?>


<?php if (get_row_layout() == "ollist") { ?>
        <?php if (have_rows('orderedList')): ?>

            <ol class="orderedList">

                <?php while (have_rows('orderedList')):
                    the_row(); ?>

                    <li>
                        <span><?php the_sub_field('order-list_item_content'); ?></span>
                    </li>

                <?php endwhile; ?>

            </ol>

        <?php endif; ?>
    <?php } ?>



    <?php if (get_row_layout() == "one_image") { ?>

        <div class="imageBox">

            <?php
            $photo = get_sub_field('photo');
            $url = $photo['url'];
            $title = $photo['title'];
            $alt = $photo['alt'];
            ?>

            <figure>

               <img alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" src="<?php echo $url; ?>">

               <?php if( get_sub_field('figcaptionTitle') ): ?>

            <!--    <figcaption><span class="figcaptionTitle"><?php the_sub_field('figcaptionTitle'); ?></span></figcaption> -->

               <?php endif; ?>
         
            </figure>


        </div>

    <?php } ?>


    <?php if (get_row_layout() == "pdf") { ?>
        <?php if (have_rows('file')): ?>

            <div class="documentList">
                <ul>
                    <?php while (have_rows('file')): the_row(); ?>
                        <li class="pdf">
                            <a target="_blank" href="<?php the_sub_field('file'); ?>">
                                <?php the_sub_field('documentName'); ?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>

        <?php endif; ?>

    <?php } ?>


<?php if(get_row_layout() == "table") { ?>

    <?php if( get_sub_field('tablecheck') ): ?>
        <strong> <?php the_sub_field('tableCaption'); ?></strong>
    <?php endif; ?>

    <?php
    $table = get_sub_field( 'table' );

    if ( $table ) {

        echo '<div class="tableData">';
        echo '<table>';

        if ( $table['header'] ) {

            echo '<thead>';

            echo '<tr>';

            foreach ( $table['header'] as $th ) {

                echo '<th>';
                echo $th['c'];
                echo '</th>';
            }

            echo '</tr>';

            echo '</thead>';
        }

        echo '<tbody>';

        foreach ( $table['body'] as $tr ) {

            echo '<tr>';

            foreach ( $tr as $td ) {

                echo '<td>';
                echo $td['c'];
                echo '</td>';
            }

            echo '</tr>';
        }

        echo '</tbody>';

        echo '</table>';

        echo '</div>';
    }

    ?>


<?php } ?>


<?php endwhile; // End general while flexy content has rows
endif; // End general if flexy content has rows ?>
