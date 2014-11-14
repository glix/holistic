<?php 
/*
Template Name: Schedule Page
*/
 ?>
 <style type="text/css">
#faq input[type=text],
#faq input[type=email],
#faq textarea{ border:1px solid #dcdcdc; color: #000; font: 12px 'Droid Sans', Arial, Helvetica, "Trebuchet MS", sans-serif; outline:none; }
#faq input[type=text]:focus,
#faq input[type=email]:focus,
#faq textarea:focus{ color:#adadad; border-color: #66afe9; box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(102, 175, 233, 0.6); }
#faq input[type=text],
#faq input[type=email]{ width:215px; border-radius:0px; -moz-border-radius:0px; -webkit-border-radius:0px; box-shadow:none; -moz-box-shadow:none; -webbox-shadow:none;}
#faq textarea{ width:400px; padding:5px; margin-bottom:15px; box-shadow:none; }
.form-cell{ width:305px; margin:0px 0px 15px;  max-width: 100% !important;}
.form-cell .name
{
	background-repeat: no-repeat;
	background-position: 5px 50%;
	padding-left: 40px;
}
.form-cell .email
{
	background-repeat: no-repeat;
	background-position: 5px 50%;
	padding-left: 40px;	
}
.form-cell .phone
{
	background-repeat: no-repeat;
	background-position: 5px 50%;
	padding-left: 40px;	
}
.form-cell .call
{
	background-repeat: no-repeat;
	background-position: 5px 50%;
	padding-left: 40px;	
}
.form-cell .budget
{
	background-repeat: no-repeat;
	background-position: 5px 50%;
	padding-left: 40px;	
}
.form-cell .conditions
{
	padding-left: 10px !important;
}
.page-head
{
	font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
	text-align: center;
}
.page-head h1
{
	font-weight: 300;
	margin-top: 0px;
	margin: 15px auto;
	font-size: 25px;
}
.page-head .logo {
	filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale"); /* Firefox 3.5+ */
    filter: gray; /* IE6-9 */
    -webkit-filter: grayscale(100%); /* Chrome 19+ & Safari 6+ */
    opacity: 0.5;
    width: 180px;
    margin: 15px auto;
}
.submit, .cancel {
	box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
	font-size: 14px;
	line-height: 20px;
}
input.readmore
{
	background-color: #006dcc;
    background-image: linear-gradient(to bottom, #0088cc, #0044cc);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    color: #ffffff;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
	height: 33px; 
	padding: 0px 25px; 
	margin-top: 5px;
	border-radius: 5px;
}
.readmore:hover { background-color: #0044cc; background-image: none; }
.readmore:hover,
.readmore:focus
{
	/*background-position: 0 -15px;*/
	cursor: pointer;
	text-decoration: none;
	-webkit-transition: background-position 0.1s linear 0s;
	-moz-transition: background-position 0.1s linear 0s;
	-o-transition: background-position 0.1s linear 0s;
	transition: background-position 0.1s linear 0s;

}
.alignright{ text-align: center; margin-top: 8px; }
</style>
<?php
	$name = isset($_POST['myName']) ? $_POST['myName'] : '';		            
	$phone = isset($_POST['myPhone']) ? $_POST['myPhone'] : '';
	$email = isset($_POST['myMail']) ? $_POST['myMail'] : '';
	$call = isset($_POST['myCall']) ? $_POST['myCall'] : '';
	$budget = isset($_POST['myBudget']) ? $_POST['myBudget'] : '';
	$conditions = isset($_POST['myCondition']) ? $_POST['myCondition'] : '';
	$page = isset($_POST['page']) ? $_POST['page'] : '';
	$address = get_bloginfo('admin_email');
    $headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: $name $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n";									
	$e_subject = 'You have received a Schedule from : '. $name;
				$e_body =  "<table style='border:2px solid #000;color:#000000; margin:auto; width:500px;'>
								<tr>
								     <td cellspacing='0' cellpadding='0' style='background: #fff;height:75px;padding-top:3px;font-family:arial,sans-serif;font-size:13px;border-bottom:1px solid #000;text-align:center;'>
								     	<img src='http://qbpn.com/holistic/wp-content/themes/holistic/images/logo.png' alt='Holistic Vibration' />
								     </td>
								</tr>
								<tr>
									<td  cellspacing='0' cellpadding='0'  style='padding-left:15px;padding-right:15px;padding-top:10px;padding-bottom:10px;color:#000000;'>
										<p style='font-family:arial,sans-serif;font-size:13px;color:#000000;margin:0;padding-top:5px;padding-bottom:5px;padding-left:2px;padding-right:2px;'><b>Hello Admin,</b></p>
										<p style='font-family:arial,sans-serif;font-size:13px;color:#000000;margin:0;padding-top:5px;padding-bottom:5px;padding-left:2px;padding-right:2px;'>One of the visitor sent you a scheduling. Following are the details:</p>
										<table style='color:#000000;font-size:13px;font-family:arial,sans-serif;'>
											<tr>
												<td style='vertical-align:top;padding:5px 0;width:175px;' cellspacing='0' cellpadding='0'><b>Name :</b></td><td style='vertical-align:top;padding:5px 0;'> $name</td>
											</tr>
											<tr>
												<td style='vertical-align:top;padding:5px 0;width:175px;' cellspacing='0' cellpadding='0'><b>Phone :</b></td><td style='vertical-align:top;padding:5px 0;'> $phone</td>
											</tr>
											<tr>
												<td style='vertical-align:top;padding:5px 0;width:175px;' cellspacing='0' cellpadding='0'><b>Email :</b></td><td style='vertical-align:top;padding:5px 0;'> $email</td>
											</tr>
											<tr>
												<td style='vertical-align:top;padding:5px 0;width:175px;' cellspacing='0' cellpadding='0'><b>Best hours to call :</b></td><td style='vertical-align:top;padding:5px 0;'> $call</td>
											</tr>
											<tr>
												<td style='vertical-align:top;padding:5px 0;width:175px;' cellspacing='0' cellpadding='0'><b>Budget :</b></td><td style='vertical-align:top;padding:5px 0;'> $budget</td>
											</tr>
											<tr>
												<td style='vertical-align:top;padding:5px 0;width:175px;' cellspacing='0' cellpadding='0'><b>Conditions/Health Goals :</b></td><td style='vertical-align:top;padding:5px 0;'> $conditions</td>
											</tr>
											<tr>
												<td style='vertical-align:top;padding:5px 0;width:175px;' cellspacing='0' cellpadding='0'><b>Page URI :</b></td><td style='vertical-align:top;padding:5px 0;'> $page</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td cellspacing='0' cellpadding='0' style='background:#104796;padding-top:15px;padding-bottom:15px;padding-left:18px;padding-right:18px;font-family:arial,sans-serif;font-size:13px;color:#fff;border-top:1px solid #000'> &copy; 2014 Holistic Vibration</td>
								</tr>
							</table>";
				$msg = $e_body;
				if(!empty($email)) {
					if(mail($address, $e_subject, $msg, $headers))
					{
						$mymsg = "<span style='color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6; border-radius: 4px; padding: 5px;'>Your request has been submitted successfully! </span>";
					}
				}
?>
<form action="" id="faq-app" method="post">
	<div id="faq">
		<hgroup class="page-head" style="max-width: 100%;">
			<img class="logo" src="http://qbpn.com/holistic/wp-content/themes/holistic/images/logo.png">
	  		<h1 style="color:#819093">Schedule a Free Consultation</h1>
		</hgroup>
		<?php
			if(!empty($email))
			{
				echo '<p style="color: #f56734; font-family: Open Sans,Arial,Helvetica,sans-serif; font-size: 15px; text-align: center;">' . $mymsg . "</p>";
			}
			?>
		<div class="form-cell" style="width: 400px; margin-left:0px; max-width: 100%;">
			<?php
				$background = get_bloginfo('template_directory').'/images/user.png';
			?>
			<input type="text" placeholder="Name" class="name" name="myName" required style="width:400px; height: 35px; max-width: 100%; background-image: url(<?php echo $background; ?>) ;"/>
		</div>
		<div class="form-cell" style="width: 400px; margin-left:0px; max-width: 100%;">
			<?php
				$background = get_bloginfo('template_directory').'/images/contact.png';
			?>
			<input type="text" placeholder="Phone number" class="phone" name="myPhone" required maxlength="12" onkeypress="return formatPhone(event,this)" onkeydown="return getKey(event,this)" style="width:400px; height: 35px; max-width: 100%;  background-image: url(<?php echo $background; ?>);"/>
		</div>
		<div class="form-cell" style="width: 400px; margin-left:0px; max-width: 100%;">
			<?php
				$background = get_bloginfo('template_directory').'/images/mail.png';
			?>
			<input type="email" placeholder="Email" class="email" name="myMail" required style="width:400px; height: 35px; max-width: 100%;  background-image: url(<?php echo $background; ?>);"/>
		</div>
		<div class="form-cell" style="width: 400px; margin-left:0px; max-width: 100%;">
			<?php
				$background = get_bloginfo('template_directory').'/images/time.png';
			?>
			<input type="text" placeholder="Best hours to call (include timezone)" class="call" name="myCall" style="width:400px; height: 35px; max-width: 100%;  background-image: url(<?php echo $background; ?>) ;"/>
		</div>
		<div class="form-cell" style="width: 400px; margin-left:0px; max-width: 100%;">
			<?php
				$background = get_bloginfo('template_directory').'/images/dollar.png';
			?>
			<input type="text" placeholder="Budget" class="budget" name="myBudget" style="width:400px; height: 35px; max-width: 100%;  background-image: url(<?php echo $background; ?>);"/>
		</div>
		<div class="form-cell" style="width: 400px; margin-bottom:0px; max-width: 100%;">
			<textarea cols="47" rows="4" class="conditions" name="myCondition" placeholder="Conditions/Health Goals" style="max-width: 100%;"></textarea>
		</div>
		<div class="alignright">
			<?php
				$URI=$_SERVER['HTTP_REFERER'];
			?>
			<input type="hidden" name="page" value="<?php echo $URI; ?>">
			<input type="submit" name="submit" value="Submit" class="submit readmore"/>
			<input type="submit" name="cancel" value="Cancel" class="cancel readmore" onClick="parent.jQuery.fancybox.close();"/>
		</div>
	</div>
</form>
<script type="text/javascript" language="javascript">
	function getKey(e) {
		var kC = e.keyCode ? e.keyCode : e.which ? e.which : null;
		if (kC && (kC == 37 || kC == 39)) return false; //arrow keys
	}
	function formatPhone(e, field) {
		var kC = e.keyCode ? e.keyCode : e.which ? e.which : null;
		if (kC) {
		if (kC == 8) return true; //backspace
		var keyChar = String.fromCharCode(kC);
		if (!/\d/.test(keyChar)) return false; //numbers only
		if (field.value.length == 0 && keyChar == '0') //no area codes begin with zero
		return false;
		if (field.value.length == 3) field.value += '-';
		if (field.value.length == 7)  field.value += '-';
		}
		return true;
	}
</script>