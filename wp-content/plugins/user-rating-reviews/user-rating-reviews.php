<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              Nilesh Dudakiya
 * @since             1.0.0
 * @package           User_Rating_Reviews
 *
 * @wordpress-plugin
 * Plugin Name:       user-rating-reviews
 * Plugin URI:        store.multidots.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Nilesh Dudakiya
 * Author URI:        Nilesh Dudakiya
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       user-rating-reviews
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-user-rating-reviews-activator.php
 */
function activate_user_rating_reviews() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-user-rating-reviews-activator.php';
    User_Rating_Reviews_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-user-rating-reviews-deactivator.php
 */
function deactivate_user_rating_reviews() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-user-rating-reviews-deactivator.php';
    User_Rating_Reviews_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_user_rating_reviews');
register_deactivation_hook(__FILE__, 'deactivate_user_rating_reviews');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-user-rating-reviews.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_user_rating_reviews() {

    $plugin = new User_Rating_Reviews();
    $plugin->run();
}

run_user_rating_reviews();

function user_rating_review() {
    if (is_page('review')) {
        $dir = plugin_dir_path(__FILE__);
        include($dir . "display-user-information.php");
        die();
    }
}

add_action('wp', 'user_rating_review');
?>
<?php
//////create user shortcode here...//////////////////
add_shortcode("user_shortcode", "user_shortcode_func");

function user_shortcode_func($atts) {
    $atts = shortcode_atts(array(
        'author' => 'no author',
            ), $atts, 'user_shortcode');

    $author = explode(',', $atts['author']);
    $args = array(
        'post_id' => 1,
        'comment_type' => 'author',
        'user_id' => $author,
    );
    $comments = get_comments($args);
    ?>
    <div class = "comments">
        <h2 class = "woocommerce-Reviews-title">1 review for <span>lenovo G-580</span></h2>
        <ol class = "commentlist" style = "list-style:none;">
            <li class = "comment byuser comment-author-admin bypostauthor even thread-even depth-1" id = "li-comment-33">
                <?php
                $count = 1;
                foreach ($comments as $comment) :
                    $ratings = get_comment_meta($comment->comment_ID, 'rating', TRUE);
                    ?>
                    <div id = "comment-33" class = "comment_container" style="width: 100%; float: left; margin: 5px;">
                        <?php echo get_avatar($comment->comment_author_email, 50); ?>
                        <div class = "comment-text" style = "width: 90%; float: right; padding:8px; border: 1px solid;  border: 1px solid #00aadc; border-radius: 10px">
                            <div class = "star-rating" style = "float:right;">
                                <span style = "width:80%">
                                    <fieldset class = "rating">
                                        <input type = "radio" id = "star5" name = "rating<?php echo $count; ?>" value = "<?php echo $ratings; ?>" <?php if ($ratings == 5) echo checked; ?>  /><label class = "full" for = "star5" title = "Awesome - 5 stars"></label>
                                        <input type = "radio" id = "star4" name = "rating<?php echo $count; ?>" value = "<?php echo $ratings; ?>" <?php if ($ratings == 4) echo checked; ?> /><label class = "full" for = "star4" title = "Pretty good - 4 stars"></label>
                                        <input type = "radio" id = "star3" name = "rating<?php echo $count; ?>" value = "<?php echo $ratings; ?>" <?php if ($ratings == 3) echo checked; ?> /><label class = "full" for = "star3" title = "Meh - 3 stars"></label>
                                        <input type = "radio" id = "star2" name = "rating<?php echo $count; ?>" value = "<?php echo $ratings; ?>" <?php if ($ratings == 2) echo checked; ?> /><label class = "full" for = "star2" title = "Kinda bad - 2 stars"></label>
                                        <input type = "radio" id = "star1" name = "rating<?php echo $count; ?>" value = "<?php echo $ratings; ?>" <?php if ($ratings == 1) echo checked; ?> /><label class = "full" for = "star1" title = "Sucks big time - 1 star"></label>
                                    </fieldset>
                                    <strong></strong>
                                </span>
                            </div>
                            <p class = "meta">
                                <strong style = "flot:left;" class = "woocommerce-review__author" itemprop = "author" ><?php echo $comment->comment_author; ?></strong>
                                <span class = "woocommerce-review__dash">-</span>
                                <time class = "woocommerce-review__published-date" itemprop = "datePublished" datetime = "2017-05-26T06:54:02+00:00"><?php echo $comment->post_date; ?></time>
                            </p>
                            <div class = "description">
                                <p><?php echo $comment->comment_content; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count++;
                endforeach;
                ?>
            </li>
        </ol>
    </div>
    <?php
}
