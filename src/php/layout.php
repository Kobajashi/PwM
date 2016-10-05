<?php
if(file_exists('../layout/'.$_REQUEST['file']))
{
	$ext = explode('.', $_REQUEST['file']);
	switch(array_pop($ext))
	{
		case 'css':
			header('Content-Type: text/css');
			break;

	}

	echo file_get_contents('../layout/'.$_REQUEST['file']);
}