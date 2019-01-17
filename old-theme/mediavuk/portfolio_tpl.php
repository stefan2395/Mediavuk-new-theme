<?php
/*
Template Name: Portfolio
*/

get_header();

// $projects_list array created, so after is possible to array_push
$projects_list = array();

// Sam as $projects_list
$categories = array();

// Values of project_taxonomy
$custom_terms = get_terms('project_taxonomy');


foreach ($custom_terms as $custom_term) {
    $args = array('post_type'      => 'project',
                  'posts_per_page' => -1,
                  'order_by'       => 'date',
                  'order'          => 'ASC',
                  'tax_query'      => array(
                      array(
                          'taxonomy' => 'project_taxonomy',
                          'field'    => 'slug',
                          'terms'    => $custom_term->slug,
                      ),
                  ),
    );

    $categories[] = [
        'name' => $custom_term->name,
        'slug' => $custom_term->slug . '-category',
    ];

    $loop = new WP_Query($args);
    if ($loop->have_posts()) {

        while ($loop->have_posts()) : $loop->the_post();

            $single_project['id'] = get_the_ID();
            $single_project['title'] = get_the_title();
            $single_project['category_name'] = $custom_term->name;
            $single_project['category_slug'] = $custom_term->slug . '-category';
            $single_project['image'] = get_field('portfolio_page_image');
            if ($single_project['image']['width']  <= 442 ) {
                // If default picture is square, set responsive image as default
                $single_project['responsive_image'] = $single_project['image'];
            } else {
                // If default picture is rectangle get square responsive image
                $single_project['responsive_image'] = get_field('portfolio_page_image_rec');
            }

            $single_project['categories'] = [];

            $postCats = get_the_terms($single_project['id'], 'project_taxonomy');
            foreach ($postCats as $taxonomy) {

                if ($taxonomy->name !== 'All') {

                    $taxonomy_name = $taxonomy->name;

                    if ($taxonomy_name == 'gui') {
                        $taxonomy_name = 'Gui';
                    }

                    array_push($single_project['categories'], $taxonomy_name);
                }
            }

            if ($single_project['image']['width'] > 442) {

                $single_project['image_class'] = 'col-66-projects';
            } else {

                $single_project['image_class'] = 'col-33-projects';
            }

            $single_project['permalink'] = get_post_permalink();
            $single_project['date'] = get_the_date();
            $single_project['post_type'] = get_post_type();

            array_push($projects_list, $single_project);

        endwhile;
    }
}

?>


    <div class="content">

        <script>

            $('.filter:first-child').addClass('active');

        </script>

        <div class="breadCrumb">
                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" title="Go to Home." href="<?php echo esc_url(home_url('/')); ?>" class="home">
                            <span property="name">Home</span>
                        </a>
                        <meta property="position" content="1">
                    </span>/
            <span property="itemListElement" typeof="ListItem">
                        <span property="name">Portfolio</span>
                <meta property="position" content="2">
                    </span>
        </div>

        <div class="wide-1440 pt-80 pb50">

            <div class="subpageTitle">

                <h1 class="subPage tac pb50"><span>what we've done</span></h1>
            </div>


            <div id="maincontent"></div>
            <div class="portfolioTabs tac mb-80 skipToContentFade" id="Container">

                <ul class="pb50">
                    <?php foreach ($categories as $category): ?>

                        <li class="uppercase ls-02 portfolioTabsHover">

                            <div class="filter <?php echo $active ?>" id="<?php echo $category['name'] ?>"
                                 data-filter=".<?php echo $category['slug'] ?>"><?php echo $category['name'] ?></div>

                        </li>


                    <?php endforeach; ?>

                    <li class="ls-02 portfolioTabsHover archive">

                        <div><a title="Archive" href="<?php echo esc_url(home_url('/')); ?>_archive/">Archive</a></div>

                    </li>

                </ul>

                <?php foreach ($projects_list as $project): ?>


                    <div class="outerColProject mix <?php echo $project['category_slug']; ?> <?php echo $project['image_class']; ?>">

                        <a title="<?php echo $project['title'] ?>" href="<?php echo $project['permalink']; ?>">

                            <figure class="thumbCaption">

                                <img class="fullImage" src="<?php echo $project['image']['url']; ?>" alt="<?php echo $project['image']['alt'] ?>"
                                     title="<?php echo $project['image']['title'] ?>">
                                <img class="fullImage responsive" src="<?php echo $project['responsive_image']['url']; ?>" alt="<?php echo $project['responsive_image']['alt'] ?>"
                                     title="<?php echo $project['responsive_image']['title'] ?>">
                                <figcaption class="thumbContent">

                                    <div class="aristotel">
                                        <div class="aristotel-tableCell">
                                            <img src="<?php the_field('projects_hover_icon', 'option'); ?>" title="View" alt="View icon">
                                            <?php
                                            ?>
                                            <span class="titleThumb"><span><?php echo $project['title'] ?></span></span>
                                            <div class="thumbService">

                                                <?php foreach ($project['categories'] as $category): ?>

                                                    <?php echo $category; ?><br>

                                                <?php endforeach; ?>

                                            </div>

                                        </div>

                                    </div>

                                </figcaption>

                            </figure>

                        </a>

                    </div>


                <?php endforeach; ?>


            </div>

        </div>
    </div>

    <script>

        $(document).ready(function () {


            // Setting active tab
            if (Cookies.get('filter') !== undefined) {

                var actualFilter = Cookies.get('filter');

                var actualFilterSlug = actualFilter.toLowerCase().split(' ').join('-') + '-category';

                $('li.portfolioTabsHover').removeClass('portfolioTabsActive');

                if (actualFilterSlug !== 'all-category') {

                    $("[data-filter=\"." + actualFilterSlug + "\"]").parent().addClass('portfolioTabsActive');

                }

                else {

                    $("[data-filter=\".allba-category\"]").parent().addClass('portfolioTabsActive');

                }


            }

            else {

                $('.portfolioTabsHover:first-child').addClass('portfolioTabsActive');

                Cookies.set('filter', 'All');

            }

            // Setting active filter via cookies
            $('.filter').on('click', function () {

                var filter = $(this).attr('id');

                Cookies.remove('filter', {path: ''});

                Cookies.set('filter', filter);

                console.log(filter);

                $('li.portfolioTabsHover').removeClass('portfolioTabsActive');

                $(this).parent().addClass('portfolioTabsActive');

            });

            var filter = Cookies.get('filter');
            console.log(filter);

            $(function () {

                var filterSlug = filter.toLowerCase().split(' ').join('-') + '-category';

                if (Cookies.get('filter') !== 'All') {

                    $('#Container').mixItUp({

                        load: {
                            // Set active mixItUp load
                            filter: '.' + filterSlug
                        },

                        animation: {
                            enable: false
                        }

                    });

                }

                else {

                    $('#Container').mixItUp({

                        load: {
                            // Set default mixItUp load
                            filter: '.allba-category'
                        },

                        animation: {
                            enable: false
                        }

                    });

                }

            });

        });

    </script>

<?php
get_footer();
