<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome Email</title>
</head>

<body style="font-family: Arial, sans-serif; background:#f5f5f5; padding:20px;">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td align="center">

<table width="600" cellpadding="20" cellspacing="0" style="background:#ffffff; border-radius:8px;">

<tr>
<td>

<h3 style="margin:0;">Hello {{$mailpassword}}</h3>

<h2 style="margin-top:10px; color:#333;">{{$mailsubject}}</h2>

<hr style="margin:20px 0;">

<p style="line-height:1.6; color:#555;">
{{$mailmessage}}
</p>

<h3 style="margin-top:20px;">Here are your details:</h3>

<p style="margin:5px 0;"><b>Your Mail:</b> {{$mailmail}}</p>
<p style="margin:5px 0;"><b>Your Password:</b> {{$mailname}}</p>

<p style="margin-top:15px;">
You can now login to your account and start using our services.
</p>

<hr style="margin:20px 0;">

<p style="margin:0;">Best Regards,</p>
<p style="margin:0;"><b>Education Center</b></p>

</td>
</tr>

</table>

</td>
</tr>
</table>

</body>
</html>