<html>
<head>Second PHP Page<br></head>
<title>PHP-pg.2</title>
<Style type="text/CSS">
	.t{color : Blue;}
</Style>
<body class=t>
<?php
if (isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_text']))
{
	$contact_name=$_POST['contact_name'];
	$contact_email=$_POST['contact_email'];
	$contact_text=$_POST['contact_text'];
	if(!empty($contact_name) && !empty($contact_email) && !empty($contact_text))
	{
		if(strlen($contact_name)>25 || strlen($contact_email)>50 || strlen($contact_text)>1000)
		{
			echo "Sorry, maxlength for some field has been exceeded.";
		}
		else
		{
			$to="xyz@gmail.com";
			$subject="Contact Form Submitted";
			$body=$contact_name."\n".$contact_text;
			$headers="From: ".$contact_email;
			if(@mail($to,$subject,$body,$headers))
			{
				echo "Thanks for contacting us. W\'ll be in touch soon.";
			}
			else
			{
				echo "Sorry an error occured. Please try again later";
			}
			
		}
	}
	else
	{
		echo "All fields are required.";
	}
}
?>
<form action="new 2.php" method="POST">
	Name:<br><input type="text" name="contact_name"><br><br>
	Email Address:<br><input type="text" name="contact_email"><br><br>
	Message:<br><textarea name="contact_text" rows="6" cols="30"></textarea><br><br>
	<input type="submit" value="Send">
</form>
</body>
</html>
