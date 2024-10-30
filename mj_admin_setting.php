<?php
	
	if(isset($_POST['mj_kill_keyword'])) { 
		update_option('mj_keyword_list',$_POST['mj_kill_keyword']);
		echo 'تنظیمات ذخیره شد ';
	}
	
	
	?>
<form method="post">
<table>
	<tr><td>لیست کلمات : </td><td>
	<textarea name="mj_kill_keyword" cols="90" rows="10"><?php echo get_option('mj_keyword_list'); ?></textarea><br />
	نکته : کلمات را با کاما , از هم جدا کنید
	</td></tr>
	<tr><td><input type="submit"  value="ذخیره">
</table>
</form>