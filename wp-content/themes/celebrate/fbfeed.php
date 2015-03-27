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
            $i = 10;
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
        

<?php
ob_flush();
?>

<?php get_footer(); ?>