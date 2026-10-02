<?php
	include "ajax_config.php";
	
	$id_city = (isset($_POST['id_city']) && $_POST['id_city'] > 0) ? htmlspecialchars($_POST['id_city']) : 0;
	$wards = null;
	if($id_city) $wards = $d->rawQuery("select ten, id from #_wards where id_city = ? order by id asc",array($id_city));

	if($wards)
	{ ?>  
		<option value=""><?=phuongxa?></option>
		<?php for($i=0;$i<count($wards);$i++) { ?>
			<option value="<?=$wards[$i]['id']?>"><?=$wards[$i]['ten']?></option>
		<?php }
	}
	else
	{ ?>
		<option value=""><?=phuongxa?></option>
	<?php }
?>