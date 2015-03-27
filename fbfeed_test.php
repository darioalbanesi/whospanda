<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Whos Panda FB Feed</title>
    
    <meta name="description" content="Whos Panda FB Feed" />
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="fbfeed/css/base.css" />
    <link rel="stylesheet" href="fbfeed/css/style.css" />
    
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <script src="fbfeed/resources/jquery.isotope.js"></script>    
    
    
<script type="text/javascript">
$(document).ready(function() {
	$('#container').isotope({
	  masonry: {
		columnWidth: 341
	  }
	});
});
</script>

<script>
	$('#container').isotope({ filter: '.fb-update' }, function( $items ) {
	  var id = this.attr('id'),
		  len = $items.length;
	  console.log( 'Isotope has filtered for ' + len + ' items in #' + id );
	});
</script>


</head>



<body>


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


<div id="wrapper">


<header>
    <div class="container clearfix">
        <div id="logo">
            <a href="http://whospanda.com"><img width=200 hegiht=120 src="fbfeed/img/Logo-WP2.jpg" /></a>
        </div>
        <div id="title">
            <h1>Whos Panda FB Feed</h1>
        </div>
    </div>
</header>



<div id="main">
    <div class="container">
        
        
        
      
        
        
        
        <?php
            
            echo "<div id=\"container\" class=\"fb-feed\">";
            
            // set counter to 0, because we only want to display 10 posts
            $i = 10;
            foreach($pagefeed['data'] as $post) {
                
                
                if ($post['type'] == 'status' || $post['type'] == 'link' || $post['type'] == 'photo' || $post['type'] == 'video') {
                
                    
                    // open up an fb-update div
                    echo "<div class=\"fb-update item\">";
                        
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
                            echo "<p><a href=\"" . $post['link'] . "\" target=\"_blank\"> View Link &rarr;</a></p>";
                        }
                        
                        // check if post type is a photo
                        if ($post['type'] == 'photo') {
                            	$rplstrp = str_replace("_s", "_b" , $post['picture']);
							echo "<a href=\"" . $post['link'] . "\" target=\"_blank\"><img src=" . $rplstrp . " /></a>";
							echo "<h2>Photo posted on: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
                            if (empty($post['story']) === false) {
                                echo "<p>" . $post['story'] . "</p>";
                            } elseif (empty($post['message']) === false) {
                                echo "<p>" . $post['message'] . "</p>";
                            }
						
                          
                        }
                    
					  // check if post type is a video
                        if ($post['type'] == 'video') {
							$rplstrv = str_replace("&autoplay=1", "&autoplay=0" , $post['source']);
							echo "<iframe src=" . $rplstrv . " frameborder='0' allowfullscreen></iframe>";

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
        
        
    </div>
</div>


</div>


</body>
</html>
<?php
ob_flush();
?>