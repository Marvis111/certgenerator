<?php


if (count($errorArr) > 0) {
	echo " <div class='alert alert-danger' style='width:98% !important;margin:0 auto !important;padding-bottom:0 !important;margin-bottom:10px !important;display:flex !important;text-align:center !important;a'> ";
	foreach ($errorArr  as $error) {
		echo "<strong>".$error."</strong>";
}
echo "</div>";
}

