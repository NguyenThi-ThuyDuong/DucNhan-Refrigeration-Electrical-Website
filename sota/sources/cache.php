<?php	
	if(!defined('SOURCES')) die("Error");

	switch($act)
	{
		case "delete":
			deleteCache();
			break;
			
		case "sitemap":
			updateSite();
			break;

		default:
			$template = "404";
	}

	/* Delete cache */
	function deleteCache()
	{
		global $func, $cache;

		if($cache->DeleteCache()) $func->transfer("Xóa cache thành công", "index.php");
		else $func->transfer("Xóa cache thất bại", "index.php", false);
	}
	function updateSite()
	{
		global $func;

		$func->transfer("Cập nhật sitemap thành công", "index.php");
	}
?>