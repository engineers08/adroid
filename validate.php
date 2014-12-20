<?php
//Number only
function fnValidateNumber($value)
{
	#is_ double($value); //เหมือน is_float
	#is_ float($value); //ทศนิยมเท่านั้น
	#is_ int($value);  //ตัวเลขไม่มีทศนิยทเท่านั้น
	#is_ integer($value); //เหมือน is_int
	return is_numeric($value); //ตัวเลข และ ทศนิยม
}
//String only
function fnValidateStringr($str)
	{
	#letters and space only
	return preg_match('/^[A-Za-z\s ]+$/', $str);
}
//Username
function fnValidateUsername($username){
	#alphabet, digit, @, _ and . are allow. Minimum 6 character. Maximum 50 characters (email address may be more)
	return preg_match('/^[a-zA-Z\d_@.]{6,50}$/i', $username);
}
//Strong password
function fnValidatePassword($password){
	#must contain 8 characters, 1 uppercase, 1 lowercase and 1 number
	return preg_match('/^(?=^.{8,}$)((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.*$/', $password);
}
//Email
function isValidEmail($email){
	return eregi('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$', $email);
}
//Date 
function fnValidateDate($date){
	#05/12/2109
	#05-12-0009
	#05.12.9909
	#05.12.99
	return preg_match('/^((0?[1-9]|1[012])[- /.](0?[1-9]|[12][0-9]|3[01])[- /.][0-9]?[0-9]?[0-9]{2})*$/', $date);
}
//Url
function fnValidateUrl($url){
	return preg_match('/^(http(s?):\/\/|ftp:\/\/{1})((\w+\.){1,})\w{2,}$/i', $url);
}
//IP
function fnValidateIP($IP){
	return preg_match('/^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/',$IP);
}
//Credit card
function fnValidateCreditCard($cc){
	#eg. 718486746312031
	return preg_match('/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|3(?:0[0-5]|[68][0-9])[0-9]{11}|3[47][0-9]{13})$/', $cc);
}
//Color
function fnValidateColor($color){
	#CCC
	#CCCCC
	#FFFFF
	return preg_match('/^#(?:(?:[a-f0-9]{3}){1,2})$/i', $color);
}
//Query safe
function query_clean($str){
	return is_array($str) ? array_map('_clean', $str) : str_replace('\\', '\\\\', htmlspecialchars((get_magic_quotes_gpc() ? stripslashes($str) : $str), ENT_QUOTES));
}
//usage call it somewhere in beginning of your script
//_clean($_POST);
//_clean($_GET);
//_clean($_REQUEST);// and so on..

//Data safe
function data_clean($str){
	return is_array($str) ? array_map('_clean', $str) : str_replace('\\', '\\\\', strip_tags(trim(htmlspecialchars((get_magic_quotes_gpc() ? stripslashes($str) : $str), ENT_QUOTES))));
}

//usage call it somewhere in beginning of your script
//_clean($_POST);
//_clean($_GET);
//_clean($_REQUEST);// and so on..
?>