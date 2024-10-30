<?php
		/*
		Plugin Name:MJ+ PostKiller
		Plugin URI: http://www.brandsms.ir
		Version: v0.0.0.1
		Author:<a href="http://www.brandsms.ir">M.Shahbazi</a>
		Description:این پلاگین پست هایی که یک کلمه خاص توش باشه رو منهدم میکنه -  :D
	*/
	
	
	
function show_mj_setting() {
	add_menu_page('mjmenu', 'فیلترینگ MJ+', 10, 'mjmenu', 'mj_admin');
	add_submenu_page('mjmenu', 'تنظیمات', 'تنظیمات', 10, 'mj_admin', 'mj_admin');
}

function mj_admin() { 
	include('mj_admin_setting.php');
}


function findme($keyword,$content) { 
	$poss=strpos($content,$keyword);
	if($poss === false ) 
	{ 
			return false;
			
	} else { 
			return true;
	}
}
function fetch_keywords() { 
	$keyv=explode(',',get_option('mj_keyword_list'));
	foreach ($keyv as $keyn) { 
		$keywords[]=$keyn;
	}
	return $keywords;
}

function check_post($post_id,$post) { 
	$ptitle=get_the_title($post_id);
	$getkeywords=fetch_keywords();
	foreach($getkeywords as $keyw) {
		if(findme($keyw,$ptitle)) { 
			wp_delete_post($post_id);//move to trash
			wp_redirect(home_url().'/admin/edit.php');
		}
	}

}
add_action('admin_menu','show_mj_setting');
add_action('publish_post','check_post');
?>