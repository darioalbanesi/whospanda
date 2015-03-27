<?php
/*
Template Name: FB Feed
*/
?>

<?php
get_header();
?>

<?php
ob_start();
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/smoothscroll.js'> </script>
<div class="whospandaonepage">

<div class="container">
<section id="news" class="anchors">
<h2 class="sectiontitle">Whats on</h2>
<div class="container">
    <div class="col-md-12">
        <?php query_posts('category_name=news-intro&post_status=future,publish&posts_per_page=1'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <div class="col-md-12">
                <div class="entry">
                    <?php the_content(); ?>
                </div>
            </div>
        <div class="clearfix"></div>
    </div>
    <?php endwhile; ?>
    <?php else : ?>
    <h2>No Content</h2>
    <?php endif; ?>
    </div>
<?php
    // include the facebook sdk
    require_once('fbfeed/resources/facebook-php-sdk-master/src/facebook.php');

    // connect to app
    $config = array();
    $config['appId'] = '210616022448431';
    $config['secret'] = 'f1b448255b08674f2217c12b7d5ceb36';
    $config['fileUpload'] = false; // optional

    // instantiate
    $facebook = new Facebook($config);

    // set page id
    $pageid = "156628057650";

    // now we can access various parts of the graph, starting with the feed
    $pagefeed = $facebook->api("/" . $pageid . "/feed");
?>
<?php
            echo "<div id=\"packer\" class=\"fb-feed\">";
            // set counter to 0, because we only want to display 10 posts
            $i = 0;
            foreach($pagefeed['data'] as $post) {
                if ($post['type'] == 'status' && (empty($post['comments']) === true) && ($post['name'] === 'WHO\'S PANDA') || $post['type'] == 'link' && (empty($post['picture']) === false)|| $post['type'] == 'photo' || $post['type'] == 'video') {
                    // open up an fb-update div
                    echo "<div class=\"fb-update item\">";
                        // post the time
                        // check if post type is a status
                        if ($post['type'] == 'status') {
                            echo "<h2>Status updated: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
                            if (empty($post['story']) === false ) {
                                echo "<p>" . $post['story'] . "</p>";
                            } elseif (empty($post['message']) === false) {
                                echo "<p>" . $post['message'] . "</p>";
                            }
                        }

                        // check if post type is a link
                        if ($post['type'] == 'link' &&(strpos($post['link'],'bandsintown') !== false)) {
                            echo "<h2>Link posted on: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
                            echo "<p>" . $post['name'] . "</p>";
                           echo "<a href=" . $post['link'] . " target='_blank'><img src='http://www.whospanda.com/wp-content/themes/celebrate/fbfeed/img/bandsintown_logo.jpg' /></a>";
                            echo "<p><a href=\"" . $post['link'] . "\" target=\"_blank\"> View Link &rarr;</a></p>";
                        }
                        elseif ($post['type'] == 'link' && (empty($post['picture']) === false))   {
                            echo "<h2>Link posted on: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
                            echo "<p>" . $post['name'] . "</p>";
                            echo "<p><a href=\"" . $post['link'] . "\" target=\"_blank\"> View Link &rarr;</a></p>";
                        }
                        // check if post type is a photo
                        if ($post['type'] == 'photo') {
                                $pictureis = array("v/t1.0-9/s130x130/", "v/t1.0-9/p130x130");
                                $rplstrp = str_replace($pictureis, "" , $post['picture']);
                            echo "<a href=\"" . $post['link'] . "\" target=\"_blank\"><img src=" . $rplstrp . " /></a>";
                            echo "<h2>Photo posted on: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
                            if (empty($post['story']) === false) {
                                echo "<p>" . $post['story'] . "</p>";
                            } elseif (empty($post['message']) === false) {
                                echo "<p>" . $post['message'] . "</p>";
                            }
                        }
                      // check if post type is a video
                        if ($post['type'] == 'video' &&(strpos($post['source'],'youtube') !== false) ) {
                                $videois = array("http://www.youtube.com/v", "?autohide=1&version=3&autoplay=1");
                                $videoreplace = array("http://img.youtube.com/vi", "/0.jpg");
                                $rplstrv = str_replace($videois, $videoreplace , $post['source']);
                                echo "<a href=". $post['link'] . " target='_blank'><img src=" . $rplstrv . " /></a>";
                                echo "<h2>Video posted on: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
                                if (empty($post['story']) === false) {
                                echo "<p>" . $post['story'] . "</p>";
                            } elseif (empty($post['message']) === false) {
                                echo "<p>" . $post['message'] . "</p>";
                            }
                            }
                        elseif ($post['type'] == 'video') {
                            echo "<iframe src=". $post['source'] . "></iframe>";

                            echo "<h2>Video posted on: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
                            if (empty($post['story']) === false) {
                                echo "<p>" . $post['story'] . "</p>";
                            } elseif (empty($post['message']) === false) {
                                echo "<p>" . $post['message'] . "</p>";
                            }

                        }
                    echo "</div>"; // close fb-update div
                    $i++; // add 1 to the counter if our condition for $post['type'] is met
                }
                //  break out of the loop if counter has reached 10
                if ($i == 10) {
                    break;
                }
            } // end the foreach statement
            echo "</div>";
        ?>
</section>
</div>  <!-- close container -->

<div class="clearfix"></div>

<div class="eventsbackground">
    <div class="container">
        <section id="events" class="row anchors">
        <h2 class="eventstitle">UPCOMING GIGS</h2>
            <div class="col-md-12">
                <?php query_posts('category_name=events&post_status=future,publish&posts_per_page=1'); ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <div class="col-md-12">
                        <div class="entry">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <div class="clearfix"></div>
            </div>
            <?php endwhile; ?>
            <?php else : ?>
            <h2>No Content</h2>
            <?php endif; ?>
            </div>
        </section> <!-- close events -->
    </div> <!-- close container -->
</div>
<div class="clearfix"></div>
<div class="container">
    <section id="media" class="row anchors">
    <h2 class="sectiontitle">Media</h2>
        <div class="col-md-12">
            <?php query_posts('category_name=media&post_status=future,publish&posts_per_page=1'); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <div class="col-md-12">
                    <div class="entry">
                        <?php the_content(); ?>
                    </div>
                </div>
            <div class="clearfix"></div>
        </div>
        <?php endwhile; ?>
        <?php else : ?>
        <h2>No Content</h2>
        <?php endif; ?>
        </div>
    </section> <!-- close media -->
</div> <!-- close container -->
<div class="clearfix"></div>
    <div class="container">
        <section id="contact" class="row anchors">
        <h2 class="sectiontitle">Contact</h2>
            <div class="col-md-12">
                <?php query_posts('category_name=contact&post_status=future,publish&posts_per_page=1'); ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <div class="col-md-12">
                        <div class="entry">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <div class="clearfix"></div>
            </div>
            <?php endwhile; ?>
            <?php else : ?>
            <h2>No Content</h2>
            <?php endif; ?>
            </div>
        </section> <!-- close contact -->
</div> <!-- close container -->
</div>


<?php
ob_flush();
?>

<?php get_footer(); ?>
