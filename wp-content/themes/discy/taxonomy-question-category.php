<?php get_header();
	$category_des         = discy_options('question_category_description');
	$category_rss         = discy_options("question_category_rss");
	$category_description = category_description();
	$category_id          = (int)get_query_var('discy_term_id');
	if ($category_des == "on" && !empty($category_description)) {?>
		<div class="question-category post-section category-description">
			<h4><?php echo esc_html__("Category","discy")." : ".esc_attr(single_cat_title("",false));?></h4>
			<?php if ($category_rss == "on") {?>
				<a class="category-rss-i tooltip-n" title="<?php esc_attr_e("Category feed","discy")?>" href="<?php echo esc_url(get_term_feed_link($category_id,"question-category"))?>"><i class="icon-rss"></i></a>
			<?php }
			echo ($category_description);?>
		</div><!-- End post -->
	<?php }
	$its_question  = "question";
	$paged         = (get_query_var("paged") != ""?(int)get_query_var("paged"):(get_query_var("page") != ""?(int)get_query_var("page"):1));
	$active_sticky = true;
	$custom_args   = array('tax_query' => array(array('taxonomy' => 'question-category','field' => 'id','terms' => $category_id)));
	$show_sticky   = true;
	include locate_template("theme-parts/loop.php");
get_footer();?>