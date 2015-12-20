<?php	
include_once('../lib/config.php');

if (isset($_FILES['image']))
{
	//(3)--go to next form [image upload form]
	include_once('worker/push/file_insert.php');
} 
else 
if (isset($_POST['submit'])) 
{
	include_once('worker/push/lot_insert.php');
	//(2)--go to next form [image upload form]
	include_once('bricks/img_form.html');
} 
else 
{
	//(1)--else, if no form has been submitted [new strain form]
	include_once('bricks/lot_form.html');
}
?>