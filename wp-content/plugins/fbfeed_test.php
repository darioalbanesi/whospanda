<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Displaying A Custom Facebook Page Feed Using The Facebook PHP SDK</title>
    
    <meta name="description" content="In this lab, we take a look at using the Facebook PHP SDK to connect to a Facebook app, retrieve the graph data from a Facebook page, and output it in a neat, nice looking format." />
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="fbfeed/css/base.css" />
    <link rel="stylesheet" href="fbfeed/css/style.css" />

</head>



<body>


<?php
    /**
     * This is the link to my page graph
     * I've included it here so i can copy an paste for quick reference
     *
     * Copying and pasting this into the browser url bar gives you a full graph of the feed
     * which is very handy for browsing and seeing what exists in the array
     *
     * Change the values to suit your own needs, and when your script is final, remove this
     * comment block
     *
     * Typing this into the url will get you the super array (graph) to analyze
     * https://graph.facebook.com/YOUR_PAGE_ID/feed?access_token=APP_ACCESS_TOKEN
     */

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


<div id="wrapper">


<header>
    <div class="container clearfix">
        <div id="logo">
            <a href="http://callmenick.com"><img src="img/logo.png" /></a>
        </div>
        <div id="title">
            <h1>Displaying A Custom Facebook Page Feed Using The Facebook PHP SDK</h1>
        </div>
    </div>
</header>



<div id="main">
    <div class="container">
        
        
        
        <h1>Facebook Feed</h1>
        
        
        
        <?php
            
            echo "<div class=\"fb-feed\">";
            
            // set counter to 0, because we only want to display 10 posts
            $i = 0;
            foreach($pagefeed['data'] as $post) {
                
                
                if ($post['type'] == 'status' || $post['type'] == 'link' || $post['type'] == 'photo' || $post['type'] == 'video') {
                
                    
                    // open up an fb-update div
                    echo "<div class=\"fb-update\">";
                        
                        // post the time
                        
                        
                        // check if post type is a status
                        if ($post['type'] == 'status') {
                            echo "<h2>Status updated: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
                            if (empty($post['story']) === false) {
                                echo "<p>" . $post['story'] . "</p>";
                            } elseif (empty($post['message']) === false) {
                                echo "<p>" . $post['message'] . "</p>";
                            }
                        }
                        
                        // check if post type is a link
                        if ($post['type'] == 'link') {
                            echo "<h2>Link posted on: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
                            echo "<p>" . $post['name'] . "</p>";
                            echo "<p><a href=\"" . $post['link'] . "\" target=\"_blank\">" . $post['link'] . "</a></p>";
                        }
                        
                        // check if post type is a photo
                        if ($post['type'] == 'photo') {
                            echo "<h2>Photo posted on: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
                            if (empty($post['story']) === false) {
                                echo "<p>" . $post['story'] . "</p>";
                            } elseif (empty($post['message']) === false) {
                                echo "<p>" . $post['message'] . "</p>";
                            }
							echo "<p><img src=" . $post['picture']. " /></p>";
                            echo "<p><a href=\"" . $post['link'] . "\" target=\"_blank\">View photo &rarr;</a></p>";
                        }
                    
					  // check if post type is a video
                        if ($post['type'] == 'video') {
                            echo "<h2>Video posted on: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
                            if (empty($post['story']) === false) {
                                echo "<p>" . $post['story'] . "</p>";
                            } elseif (empty($post['message']) === false) {
                                echo "<p>" . $post['message'] . "</p>";
                            }
							
							echo  
							"<p><iframe width='560' height='315' src=" . $post['source']. " frameborder='0' allowfullscreen></iframe></p>";
							str_replace("&autoplay=1", "", "&autoplay=0");
							
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
        
        
    </div>
</div>


<footer>
    <div class="container">
        <a href="http://www.callmenick.com/labs/styling-blockquotes-with-css-pseudo-classes">&larr; Back to the article</a>
    </div>
</footer>



</div>


</body>
</html>
<?php
ob_flush();
?>