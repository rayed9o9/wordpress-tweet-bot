/**
 * 1- Get your keys from your Twitter Acount
 * 2- place this code in functions.php in your theme folder
 * 3- add the TwtterOauth lib in the same folder
 * 4- modify based on your website
 * 
 */

// Feel free to give me any advice , I'm new to php and wordpress
// Twitter: @rayed9o9


/*
*
* DO NOT REPLACE YOUR functions.php FILE
*
*/

require "twiteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

function post_published_for_twitter( $ID, $post ) {
	
    $title = $post->post_title;
    $permalink = get_permalink( $ID );
	
	$post_thumbnail_id = get_post_thumbnail_id( $post );
    if ( ! $post_thumbnail_id ) {
        $image_post = "";
    }
    
	
	$image_arr = wp_get_attachment_image_src(get_post_thumbnail_id($post_array->ID), 'full');
    $image_post = $image_arr[0];
	
	//Add your keys here
	$consumer_key='';
	$consumer_secret='';
	$access_token='';
	$access_token_secret='';

	

	$connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
	$content = $connection->get("account/verify_credentials");
	
	//change the number in substr to suit your site URL TwitterOauth only work with relative links
	$result = $connection->upload('media/upload',['media'=> "/var/www/html".substr($image_post,19)]);

	$mediaID = $result->media_id;
	$parameters = array('status' => sprintf( '%s  %s', $title, $permalink ),'media_ids' => $mediaID);
	$response = $connection->post('statuses/update', $parameters);

	
}
add_action( 'publish_post', 'post_published_for_twitter', 10, 2 );
