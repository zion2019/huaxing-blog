<?php
/*
Plugin Name: 文章浏览
Plugin URI: https://blog.wpjam.com/project/wpjam-basic/
Description: 统计文章阅读数，激活该扩展，请不要再激活 WP-Postviews 插件。
Version: 1.0
*/
if(!function_exists('the_views')){
	//显示浏览次数
	function the_views(){
		$views = wpjam_get_post_views(get_the_ID()) ?: 0;
		echo '<span class="view">浏览：'.$views.'</span>';
	}

	add_action('wp_head',function(){
		if(is_single()){
			wpjam_update_post_views(get_queried_object_id());
		}
	});
}

add_action('init',function(){
	global $wp_rewrite;
	add_rewrite_rule($wp_rewrite->root.'postviews/([0-9]+)\.png?$', 'index.php?module=postviews&p=$matches[1]', 'top');
});

add_filter('wpjam_template', function($wpjam_template, $module, $action){
	if(($module == 'postviews') && (!is_file($wpjam_template))) {
		return WPJAM_BASIC_PLUGIN_DIR.'template/postviews.php';
	}
	return $wpjam_template;
}, 10, 3);


add_action('pre_get_posts', function($wp_query){
	$module = get_query_var('module');
	if($module == 'postviews'){	// 不指定 post_type ，默认查询 post，这样custom post type 的文章页面就会显示 404
		$wp_query->set('post_type', 'any');
	}
});

function wpjam_get_post_total_views($post_id){
	return wpjam_get_post_views($post_id);
}

add_filter('the_content', function($content){
	if(is_feed()){
		$content	.= "\n".'<p><img src="'.home_url('postviews/'.get_the_ID().'.png').'" /></p>'."\n";
	}

	return $content;
}, 999);