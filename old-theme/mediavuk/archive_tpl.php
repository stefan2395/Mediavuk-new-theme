<?php
/*
Template Name: Archive
*/

get_header();

$projects_list = array();

$categories = array();

$years = array();

$custom_terms = get_terms('archive_taxonomy');

foreach ($custom_terms as $custom_term) {
//    wp_reset_query();
    $args = array('post_type'      => 'archive',
                  'posts_per_page' => -1,
                  'order_by'       => 'date',
                  'order'          => 'DESC',
                  'tax_query'      => array(
                      array(
                          'taxonomy' => 'archive_taxonomy',
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

            $single_project['title'] = get_field('title');
            $single_project['year'] = get_field('year');
            $single_project['description'] = get_field('description');
            $single_project['country'] = get_field('country');
            $single_project['website'] = get_field('website');
            $single_project['category_slug'] = $custom_term->slug . '-category';
            $single_project['image'] = get_field('picture');
            $single_project['image_class'] = 'col-33-projects';
            $single_project['date'] = get_the_date('Y/m/d G:i:s', $post->ID);
            array_push($projects_list, $single_project);

            array_push($years, $single_project['year']);

        endwhile;
    }
}

function sortFunction($a, $b) {
    return strtotime($a["date"]) - strtotime($b["date"]);
}

usort($projects_list, "sortFunction");

$projects_list = array_reverse($projects_list);

$years = array_unique($years);
sort($years);
?>


    <div class="content">

        <div class="breadCrumb">
                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" title="Go to Home." href="<?php echo esc_url(home_url('/')); ?>" class="home">
                            <span property="name">Home</span>
                        </a>
                        <meta property="position" content="1">
                    </span>/

            <span property="itemListElement" typeof="ListItem">
                <a property="item"
                   typeof="WebPage"
                   title="Go to Project."
                   href="<?php echo esc_url(home_url('/portfolio/')); ?>"
                   class="post post-project-archive">
                    <span property="name">Portfolio</span>
                </a>
                <meta property="position" content="2">
            </span>/
            <span property="itemListElement" typeof="ListItem">
                        <span property="name">Archive</span>
                <meta property="position" content="2">
                    </span>
        </div>

        <div class="wide-1440 pt-80 pb50">

            <div class="subpageTitle">

                <h1 class="subPage tac pb50"><span>Archive</span></h1>
            </div>

            <div class="portfolioTabs tac mb-80" id="Container">

                <ul class="pb50">

                    <li class="tab_all portfolioTabsActive uppercase ls-02 portfolioTabsHover">

                        <div class="filter" data-filter="all">All</div>

                    </li>
                    <?php foreach ($categories as $category): ?>

                        <li class="uppercase ls-02 portfolioTabsHover">

                            <div class="filter" data-filter=".<?php echo $category['slug'] ?>"><?php echo $category['name'] ?></div>

                        </li>

                    <?php endforeach; ?>

                    <li class="year_button">Year <i class="fa fa-caret-down" aria-hidden="true"></i>

                        <ul class="sub_menu">

                            <?php

                            foreach ($years as $year) :

                                ?>

                                <li class="year_item">

                                    <div class="filter" data-filter=".<?php echo $year; ?>"><?php echo $year; ?></div>

                                </li>

                            <?php endforeach; ?>

                        </ul>

                    </li>

                </ul>

                <?php foreach ($projects_list as $project): ?>

                    <div class="outerColProject col-33-projects mix <?php echo $project['category_slug']; ?> <?php echo $project['year']; ?>">

                        <figure class="thumbCaption">

                            <img class="fullImage" src="<?php echo $project['image']['url']; ?>" alt="<?php echo $project['image']['alt'] ?>"
                                 title="<?php echo $project['image']['title'] ?>">

                        </figure>

                        <div class="archive_content">

                            <div class="year">
                                <h4><?php echo $project['year']; ?></h4>
                            </div>
                            <div class="title">
                                <h3><?php echo $project['title']; ?> <span><br> <?php echo $project['country']; ?></span></h3>
                            </div>
                            <div class="title_mobile">
                                <h3><?php echo trim_title($project['title'], 25); ?> <span><br> <?php echo $project['country']; ?></span>
                                </h3>
                            </div>
                            <div class="content_text">
                                <?php echo $project['description']; ?>
                            </div>

                            <?php if (trim($project['website']) !== ''): ?>

                                <div class="visit_website">
                                    <a href="<?php echo $project['website']; ?>" target="_blank">Visit website</a>
                                </div>

                            <?php endif; ?>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>
    </div>

    <script>

        $(document).ready(function () {

            $(function () {

                $('#Container').mixItUp({

                    animation: {
                        enable: false
                    }

                });

            });

        });

    </script>

<?php
get_footer();
