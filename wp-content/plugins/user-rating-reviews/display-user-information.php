<?php
get_header();

if (is_user_logged_in()) {
    $user_id = get_current_user_id();
    $userinfo = get_userdata($user_id);
    $username = $userinfo->user_login;
    $email = $userinfo->user_email;
}
?>
<!--User form here....--->
<div id="content" class="site-content">
    <div id="container">
        <div id="content" role="main">
            <form name="review" method="post">
                <label>Username : </label>
                <input type="text" name="username" <?php if (isset($username)) echo "readonly"; ?> value="<?php if (isset($username)) echo $username; ?>"><br>
                <label>Email : </label>
                <input type="text" name="email" readonly="readonly" value="<?php if (isset($email)) echo $email; ?>"><br>
                <label>Review Content :</label>
                <textarea rows="3" name="reviews"></textarea> <br>
                <label>Ratings :</label>
                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                </fieldset>
                <div style="float:right">
                    <input type="submit" name="submit" value="Add Rateing" />
                </div>
            </form>
        </div>
        <div id="comments" style="border: solid 1px; width: 100%; float: right; padding: 10px 15px 20px 15px;;">
            <div id="content" role="main">
                <h2>1 review for <span>Formal Shirt</span></h2>

                <ol class="commentlist">
                    <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-2" style="list-style: none"> 
                        <?php
                        $args = array(
                            'post_id' => '',
                            'comment_type' => ''
                        );
                        $comments = get_comments($args);
                        $counter = 1;
                        foreach ($comments as $comment) :
                            $ratings = get_comment_meta($comment->comment_ID, 'rating', TRUE);
                            ?>
                        <div id="comment-2" class="comment_container" style="width: 100%;float: left; margin: 10px">
                                <?php echo get_avatar($comment->comment_author_email, 50); ?>
                                <div class="comment-text" style="border: solid 1px #e4e1e3; border-radius: 4px; width: 95%; float: right; padding: 20px 0px 0px 15px;"  >
                                    <div class="star-rating" style="float: right;">
                                        <span style="width:100%">
                                            <fieldset class="rating">
                                                <input type="radio" id="star5" name="rating<?php echo $counter; ?>" value="5" <?php if ($ratings == 5) echo 'checked'; ?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                                <input type="radio" id="star4half" name="rating<?php echo $counter; ?>" value="4 and a half" <?php if ($ratings == 4) echo 'checked'; ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                <input type="radio" id="star4" name="rating<?php echo $counter; ?>" value="4" <?php if ($ratings == 4) echo 'checked'; ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                                <input type="radio" id="star3half" name="rating<?php echo $counter; ?>" value="3 and a half" <?php if ($ratings == 3) echo 'checked'; ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                <input type="radio" id="star3" name="rating<?php echo $counter; ?>" value="3" <?php if ($ratings == 3) echo 'checked'; ?> /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                                <input type="radio" id="star2half" name="rating<?php echo $counter; ?>" value="2 and a half" <?php if ($ratings == 2) echo 'checked'; ?> /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                <input type="radio" id="star2" name="rating<?php echo $counter; ?>" value="2" <?php if ($ratings == 2 ) echo 'checked'; ?> /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                                <input type="radio" id="star1half" name="rating<?php echo $counter; ?>" value="1 and a half" <?php if ($ratings == 1) echo 'checked'; ?> /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                <input type="radio" id="star1" name="rating<?php echo $counter; ?>" value="1" <?php if ($ratings == 1) echo 'checked'; ?> /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                                <input type="radio" id="starhalf" name="rating<?php echo $counter; ?>" value="half" <?php if ($ratings == 1) echo 'checked'; ?> /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                            </fieldset>
                                            <strong></strong>
                                        </span>
                                    </div>
                                    <p class="meta">
                                        <strong class="woocommerce-review__author" itemprop="author"><?php echo $comment->comment_author; ?></strong>
                                        <span class="woocommerce-review__dash">-</span>
                                        <time class="woocommerce-review__published-date" itemprop="datePublished" datetime="2017-05-26T06:50:34+00:00"><?php echo $comment->post_date; ?></time>

                                    </p>
                                    <div class="description">
                                        <p><?php echo $comment->comment_content; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $counter++;
                        endforeach;
                        ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php
//=====User insert data in database====//
if (isset($_POST["submit"])) {
    if (!empty($_POST["email"]) && !empty($_POST["username"]) && !empty($_POST["reviews"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $review = $_POST["reviews"];
        $rating = $_POST["rating"];

        $time = current_time('mysql');

        $data = array(
            'comment_post_ID' => 1,
            'comment_author' => $username,
            'comment_author_email' => $email,
            'comment_author_url' => $email,
            'comment_content' => $review,
            'comment_type' => '',
            'comment_parent' => 0,
            'user_id' => 1,
            'comment_author_IP' => '127.0.0.1',
            'comment_agent' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.10) Gecko/2009042316 Firefox/3.0.10 (.NET CLR 3.5.30729)',
            'comment_date' => $time,
            'comment_approved' => 1,
        );

        $id = wp_insert_comment($data);
        if (isset($id)) {
            update_comment_meta($id, 'rating', $rating);
        }
    } else {
        
    }
}
get_footer();

