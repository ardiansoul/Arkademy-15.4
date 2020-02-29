<?php 
function is_username_valid($username)
{
	if (!preg_match("/[a-z]{3,6}[0-9]{2}/", $username))
	{
		return FALSE;
	} else {
		return TRUE;
	}

}

function is_password($password)	
{
	if (!preg_match("/[a-z]{3,5}[-]{1}[0-9]{3,5}/", $password)) {
		return FALSE;
	} else {
		return TRUE;
	}
}

var_dump(is_username_valid("ardian2"));
var_dump(is_password("ars-532"));








 ?>