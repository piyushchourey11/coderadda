<?php

/* @author    2codeThemes
*  @package   WPQA/templates
*  @version   1.0
*/

$author_name           = esc_attr(get_query_var("author_name"));
$wpqa_user_id          = esc_attr(get_query_var(apply_filters('wpqa_user_id','wpqa_user_id')));
$author_box            = wpqa_options("author_box");
$active_points         = wpqa_options('active_points');
$user_profile_pages    = wpqa_options("user_profile_pages");
$user_stats            = wpqa_options('user_stats');
$user_stats_2          = wpqa_options('user_stats_2');
$show_point_favorite   = get_user_meta($wpqa_user_id,"show_point_favorite",true);
$ask_question_to_users = wpqa_options("ask_question_to_users");
$pay_ask               = wpqa_options("pay_ask");
if ($ask_question_to_users == "on") {
	/* asked_questions */
	$asked_questions = wpqa_count_asked_question($wpqa_user_id,"=");
}?>

<div class="wrap-tabs">
	<div class="menu-tabs">
		<ul class="menu flex">
			<li<?php echo (!wpqa_user_title()?" class='active-tab'":"")?>><a href="<?php echo esc_url(wpqa_profile_url($wpqa_user_id))?>"><?php esc_html_e("About","wpqa")?></a></li>
			<?php if (isset($user_profile_pages) && is_array($user_profile_pages) && !empty($user_profile_pages)) {
				foreach ($user_profile_pages as $key => $value) {
					if ($key == "questions" && isset($user_profile_pages["questions"]["value"]) && $user_profile_pages["questions"]["value"] == "questions") {?>
						<li<?php echo (wpqa_is_user_questions() || "questions" == wpqa_user_title()?" class='active-tab'":"")?>><a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"questions"))?>"><?php esc_html_e("Questions","wpqa")?></a></li>
					<?php }else if ($key == "best-answers" && isset($user_profile_pages["best-answers"]["value"]) && $user_profile_pages["best-answers"]["value"] == "best-answers") {?>
						<li<?php echo (wpqa_is_best_answers() || "best-answers" == wpqa_user_title()?" class='active-tab'":"")?>><a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"best_answers"))?>"><?php esc_html_e("Best Answers","wpqa")?></a></li>
					<?php }else if ($key == "polls" && isset($user_profile_pages["polls"]["value"]) && $user_profile_pages["polls"]["value"] == "polls") {?>
						<li<?php echo (wpqa_is_user_polls() || "polls" == wpqa_user_title()?" class='active-tab'":"")?>><a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"polls"))?>"><?php esc_html_e("Polls","wpqa")?></a></li>
					<?php }else if ($key == "answers" && isset($user_profile_pages["answers"]["value"]) && $user_profile_pages["answers"]["value"] == "answers") {?>
						<li<?php echo (wpqa_is_user_answers() || "answers" == wpqa_user_title()?" class='active-tab'":"")?>><a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"answers"))?>"><?php esc_html_e("Answers","wpqa")?></a></li>
					<?php }else if ($key == "asked" && isset($user_profile_pages["asked"]["value"]) && $user_profile_pages["asked"]["value"] == "asked" && $ask_question_to_users == "on") {?>
						<li<?php echo (wpqa_is_user_asked() || "asked" == wpqa_user_title()?" class='active-tab'":"")?>><a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"asked"))?>"><?php esc_html_e("Asked Questions","wpqa");?></a></li>
						<?php if (wpqa_is_user_owner()) {?>
							<li<?php echo (wpqa_is_asked_questions() || "asked-questions" == wpqa_user_title()?" class='active-tab'":"")?>><a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"asked_questions"))?>"><?php esc_html_e("Waiting Questions","wpqa");echo ($asked_questions > 0 && wpqa_is_user_owner()?"<span class='notifications-number asked-count'>".wpqa_count_number($asked_questions)."</span>":"")?></a></li>
						<?php }
					}else if ($key == "paid-questions" && isset($user_profile_pages["paid-questions"]["value"]) && $user_profile_pages["paid-questions"]["value"] == "paid-questions" && $pay_ask == "on") {?>
						<li<?php echo (wpqa_is_paid_questions() || "paid-questions" == wpqa_user_title()?" class='active-tab'":"")?>><a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"paid_questions"))?>"><?php esc_html_e("Paid Questions","wpqa")?></a></li>
					<?php }else if ($key == "favorites" && isset($user_profile_pages["favorites"]["value"]) && $user_profile_pages["favorites"]["value"] == "favorites" && ($show_point_favorite == "on" || wpqa_is_user_owner())) {?>
						<li<?php echo (wpqa_is_user_favorites() || "favorites" == wpqa_user_title()?" class='active-tab'":"")?>><a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"favorites"))?>"><?php esc_html_e("Favorite Questions","wpqa")?></a></li>
					<?php }else if ($key == "followed" && isset($user_profile_pages["followed"]["value"]) && $user_profile_pages["followed"]["value"] == "followed" && ($show_point_favorite == "on" || wpqa_is_user_owner())) {?>
						<li<?php echo (wpqa_is_user_followed() || "followed" == wpqa_user_title()?" class='active-tab'":"")?>><a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"followed"))?>"><?php esc_html_e("followed Questions","wpqa")?></a></li>
					<?php }else if ($key == "posts" && isset($user_profile_pages["posts"]["value"]) && $user_profile_pages["posts"]["value"] == "posts") {?>
						<li<?php echo (wpqa_is_user_posts() || "posts" == wpqa_user_title()?" class='active-tab'":"")?>><a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"posts"))?>"><?php esc_html_e("Posts","wpqa")?></a></li>
					<?php }else if ($key == "comments" && isset($user_profile_pages["comments"]["value"]) && $user_profile_pages["comments"]["value"] == "comments") {?>
						<li<?php echo (wpqa_is_user_comments() || "comments" == wpqa_user_title()?" class='active-tab'":"")?>><a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"comments"))?>"><?php esc_html_e("Comments","wpqa")?></a></li>
					<?php }else if ($key == "followers-questions" && isset($user_profile_pages["followers-questions"]["value"]) && $user_profile_pages["followers-questions"]["value"] == "followers-questions") {?>
						<li<?php echo (wpqa_is_followers_questions() || "followers-questions" == wpqa_user_title()?" class='active-tab'":"")?>><a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"followers_questions"))?>"><?php esc_html_e("Followers Questions","wpqa")?></a></li>
					<?php }else if ($key == "followers-answers" && isset($user_profile_pages["followers-answers"]["value"]) && $user_profile_pages["followers-answers"]["value"] == "followers-answers") {?>
						<li<?php echo (wpqa_is_followers_answers() || "followers-answers" == wpqa_user_title()?" class='active-tab'":"")?>><a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"followers_answers"))?>"><?php esc_html_e("Followers Answers","wpqa")?></a></li>
					<?php }else if ($key == "followers-posts" && isset($user_profile_pages["followers-posts"]["value"]) && $user_profile_pages["followers-posts"]["value"] == "followers-posts") {?>
						<li<?php echo (wpqa_is_followers_posts() || "followers-posts" == wpqa_user_title()?" class='active-tab'":"")?>><a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"followers_posts"))?>"><?php esc_html_e("Followers Posts","wpqa")?></a></li>
					<?php }else if ($key == "followers-comments" && isset($user_profile_pages["followers-comments"]["value"]) && $user_profile_pages["followers-comments"]["value"] == "followers-comments") {?>
						<li<?php echo (wpqa_is_followers_comments() || "followers-comments" == wpqa_user_title()?" class='active-tab'":"")?>><a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"followers_comments"))?>"><?php esc_html_e("Followers Comments","wpqa")?></a></li>
					<?php }
				}
			}?>
		</ul>
	</div><!-- End menu-tabs -->
</div><!-- End wrap-tabs -->

<?php if (!wpqa_user_title()) {?>
	<div class="user-area-content">
		<?php if ($author_box == "on") {
			$cover_image = wpqa_options("cover_image");
			echo wpqa_author($wpqa_user_id,"advanced",wpqa_is_user_owner(),"","","",($cover_image == "on"?"cover":""));
		}
		
		/* questions */
		$add_questions = wpqa_count_posts_by_user($wpqa_user_id,"question");
		
		/* paid_questions */
		$paid_questions = wpqa_count_paid_question($wpqa_user_id);
		
		/* answers */
		$add_answer = count(get_comments(array("post_type" => "question","status" => "approve","user_id" => $wpqa_user_id)));
		
		/* the_best_answer */
		$the_best_answer = count(get_comments(array('user_id' => $wpqa_user_id,"status" => "approve",'post_type' => 'question',"meta_query" => array('relation' => 'AND',array("key" => "best_answer_comment","compare" => "=","value" => "best_answer_comment"),array("key" => "answer_question_user","compare" => "NOT EXISTS")))));
		
		/* points */
		$points = get_user_meta($wpqa_user_id,"points",true);
		
		/* favorites */
		$_favorites = get_user_meta($wpqa_user_id,$wpqa_user_id."_favorites");
		
		/* following_questions */
		$following_questions_user = get_user_meta($wpqa_user_id,"following_questions");
		
		/* following */
		$following_me = get_user_meta($wpqa_user_id,"following_me",true);
		$following_you = get_user_meta($wpqa_user_id,"following_you",true);
		
		/* posts */
		$add_posts = wpqa_count_posts_by_user($wpqa_user_id,"post");
		
		/* comments */
		$add_comment = count(get_comments(array("post_type" => "post","status" => "approve","user_id" => $wpqa_user_id)));
		
		/* follow (questions - answers - posts - comments) *
		$follow_questions = 0;
		$follow_answers   = 0;
		$follow_posts     = 0;
		$follow_comments  = 0;
		
		if (isset($following_me) && is_array($following_me) && !empty($following_me)) {
			foreach ($following_me as $key => $value) {
				$follow_questions += wpqa_count_posts_by_type($value,"question");
				$follow_posts     += wpqa_count_posts_by_type($value,"post");
				$follow_answers   += count(get_comments(array("post_type" => "question","status" => "approve","user_id" => $value)));
				$follow_comments  += count(get_comments(array("post_type" => "post","status" => "approve","user_id" => $value)));
			}
		}
		*/
		
		if ($active_points != "on" && isset($user_stats["points"]) && $user_stats["points"] == "points") {
			unset($user_stats["points"]);
		}
		
		if ((isset($user_stats["questions"]) && $user_stats["questions"] == "questions") || (isset($user_stats["answers"]) && $user_stats["answers"] == "answers") || (isset($user_stats["best_answers"]) && $user_stats["best_answers"] == "best_answers") || (isset($user_stats["points"]) && $user_stats["points"] == "points")) {
			if (count($user_stats) == 1) {
				$column_user = "col12";
			}else if (count($user_stats) == 2) {
				$column_user = "col6";
			}else if (count($user_stats) == 3) {
				$column_user = "col4";
			}else {
				$column_user = "col3";
			}?>
			<div class="user-stats">
				<ul class="row">
					<?php if (isset($user_stats["questions"]) && $user_stats["questions"] == "questions") {?>
						<li class="col <?php echo esc_attr($column_user)?> user-questions">
							<div>
								<a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"questions"))?>"></a>
								<i class="icon-book-open"></i>
								<div>
									<span><?php echo ($add_questions == ""?0:wpqa_count_number($add_questions))?></span>
									<h4><?php esc_html_e("Questions","wpqa")?></h4>
								</div>
							</div>
						</li>
					<?php }
					if (isset($user_stats["answers"]) && $user_stats["answers"] == "answers") {?>
						<li class="col <?php echo esc_attr($column_user)?> user-answers">
							<div>
								<a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"answers"))?>"></a>
								<i class="icon-comment"></i>
								<div>
									<span><?php echo ($add_answer == ""?0:wpqa_count_number($add_answer))?></span>
									<h4><?php esc_html_e("Answers","wpqa")?></h4>
								</div>
							</div>
						</li>
					<?php }
					if (isset($user_stats["best_answers"]) && $user_stats["best_answers"] == "best_answers") {?>
						<li class="col <?php echo esc_attr($column_user)?> user-best-answers">
							<div>
								<a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"best_answers"))?>"></a>
								<i class="icon-graduation-cap"></i>
								<div>
									<span><?php echo ($the_best_answer == ""?0:wpqa_count_number($the_best_answer))?></span>
									<h4><?php esc_html_e("Best Answers","wpqa")?></h4>
								</div>
							</div>
						</li>
					<?php }
					if (isset($user_stats["points"]) && $user_stats["points"] == "points") {?>
						<li class="col <?php echo esc_attr($column_user)?> user-points">
							<div>
								<?php if ($show_point_favorite == "on" || wpqa_is_user_owner()) {?>
									<a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"points"))?>"></a>
								<?php }?>
								<i class="icon-bucket"></i>
								<div>
									<span><?php echo ($points == ""?0:wpqa_count_number($points))?></span>
									<h4><?php esc_html_e("Points","wpqa")?></h4>
								</div>
							</div>
						</li>
					<?php }?>
				</ul>
				<?php do_action("wpqa_after_user_stats",$wpqa_user_id);?>
			</div><!-- End user-stats -->
		<?php }
		
		$size = 29;
		if ((isset($user_stats_2["followers"]) && $user_stats_2["followers"] == "followers") || (isset($user_stats_2["i_follow"]) && $user_stats_2["i_follow"] == "i_follow")) {
			if (count($user_stats_2) == 1) {
				$column_follow = "col12";
			}else {
				$column_follow = "col6";
			}?>
			<div class="user-follower">
				<ul class="row">
					<?php if (isset($user_stats_2["followers"]) && $user_stats_2["followers"] == "followers") {?>
						<li class="col <?php echo esc_attr($column_follow)?> user-followers">
							<div>
								<a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"followers"))?>"></a>
								<h4><i class="icon-users"></i><?php esc_html_e("Followers","wpqa")?></h4>
								<div>
									<?php $followers = $last_followers = 0;
									if (isset($following_you) && is_array($following_you)) {
										$followers = count($following_you);
									}
									
									if ($followers > 0) {
										$last_followers = $followers-4;
										if (isset($following_you) && is_array($following_you)) {
											$sliced_array = array_slice($following_you,0,4);
											foreach ($sliced_array as $key => $value) {
												echo wpqa_get_user_avatar(array("user_id" => $value,"size" => $size));
											}
										}
									}?>
									<span>
										<?php if ($last_followers > 0) {?>
											<span>+ <?php echo wpqa_count_number($last_followers)?></span> <?php esc_html_e("Followers","wpqa")?>
										<?php }else if ($followers == 0) {
											esc_html_e("Author doesn't follow anyone.","wpqa");
										}?>
									</span>
								</div>
							</div>
						</li>
					<?php }
					if (isset($user_stats_2["i_follow"]) && $user_stats_2["i_follow"] == "i_follow") {?>
						<li class="col <?php echo esc_attr($column_follow)?> user-following">
							<div>
								<a href="<?php echo esc_url(wpqa_get_profile_permalink($wpqa_user_id,"following"))?>"></a>
								<h4><i class="icon-users"></i><?php esc_html_e("Following","wpqa")?></h4>
								<div>
									<?php $following = $last_following = 0;
									if (isset($following_me) && is_array($following_me)) {
										$following = count($following_me);
									}
									if ($following > 0) {
										$last_following = $following-4;
										if (isset($following_me) && is_array($following_me)) {
											$sliced_array = array_slice($following_me,0,4);
											foreach ($sliced_array as $key => $value) {
												echo wpqa_get_user_avatar(array("user_id" => $value,"size" => $size));
											}
										}
									}?>
									<span>
										<?php if ($last_following > 0) {?>
											<span>+ <?php echo wpqa_count_number($last_following)?></span> <?php esc_html_e("Members","wpqa")?>
										<?php }else if ($following == 0) {
											esc_html_e("Author doesn't have any followers yet.","wpqa");
										}?>
									</span>
								</div>
							</div>
						</li>
					<?php }?>
				</ul>
			</div><!-- End user-follower -->
		<?php }?>
	</div><!-- End user-area-content -->
<?php }?>