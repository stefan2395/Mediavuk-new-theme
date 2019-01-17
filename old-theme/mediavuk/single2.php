<?php

get_header();

?>

<?php
while (have_posts()) : the_post();

    ?>


    <?php

    $photo = get_field('cover_photo');
    $url = $photo['url'];
    $title = $photo['title'];
    $alt = $photo['alt'];

    ?>

    <img src="<?php echo $url ?>" alt="<?php echo $alt ?>" title="<?php echo $title ?>">

    <div class="project_info">

        <div class="project_title">

            <h1><?php the_title(); ?></h1>

        </div>

        <div class="project_description">

            <?php the_field('project_description'); ?>

        </div>

        <div class="project_fields">

            <?php

            // check if the repeater field has rows of data
            if (have_rows('project_fields')):

                ?>

                <ul>

                    <?php

                    // loop through the rows of data
                    while (have_rows('project_fields')) : the_row();

                        ?>
                        <li>
                            <?php
                            // display a sub field value
                            the_sub_field('project_field');

                            ?>

                        </li>
                        <?php

                    endwhile;

                    ?>

                </ul>

                <?php

            else :

                // no rows found

            endif;

            ?>

        </div>


    </div>

    <?php include 'inc/acf-flexible-content.php'; ?>

    <?php

endwhile; // End of the loop.
?>

<?php
get_footer();
