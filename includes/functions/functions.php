<?php

// Showing 'Default' As Title For Pages Without The '$title' Variable

function get_title()
{	
	global $title;

	if(isset($title))
	{
		echo $title;
	}
	else
	{
		echo "Default";
	}
}

// Redirecting The User To The 'Login' Page

function redirect_login($message, $time = 3)
{
	echo $message;
	echo "</br>";
	echo "</br>";
	echo "<div class='message-redirect alert alert-success'>
	You'll Be Redirected To The Login Page After $time Seconds</div>";

	header("refresh: $time; url=login.php");
	exit();
}