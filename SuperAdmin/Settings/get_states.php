<?php
require_once('../../includes/functions.php');
$country_id = $con->real_escape_string($_POST['country_id']);;
if($country_id!='')
{
	$states_result = $con->query('select * from settings_subtype where setting_type_id='.$country_id.' ');
	$options = "<option value=''>Chose Type</option>";
	while($row = $states_result->fetch_assoc()) {
	$options .= "<option value='".$row['id']."'>".$row['sub_name']."</option>";
	}
	echo $options;
}

?>