<?
	include("php/init.php");
	
	// Process order
	if (isset($_SESSION['Cart']) && isset($_POST['orderSubmit']))
	{	
		$mailMessage = CartGetEmailText();
		
		$mailMessage .= "Beställare\r\n";
		$mailMessage .= "Namn: ".$_POST['txtName']."\r\n";
		$mailMessage .= "Mobiltelefon: ".$_POST['txtPhone']."\r\n";
		$mailMessage .= "E-post: ".$_POST['txtEmail']."\r\n";
		$mailMessage .= "----------------------------------------\r\n";
		$mailMessage .= "Leveransadress\r\n";
		$mailMessage .= "Namn: ".$_POST['txtDelName']."\r\n";
		$mailMessage .= "Adress: ".$_POST['txtDelStreet']."\r\n";
		$mailMessage .= "Postnr: ".$_POST['txtDelPostal']."\r\n";
		$mailMessage .= "Postort: ".$_POST['txtDelCity']."\r\n";
		$mailMessage .= "----------------------------------------\r\n";
		
		if($_POST['sameAddress'] == 'yes')
		{
   			$mailMessage .= "Fakturaadress\r\n";
			$mailMessage .= "Samma som leveransadress\r\n";
			
			$mailMessage .= "----------------------------------------\r\n";
		}
		else
		{
   			$mailMessage .= "Fakturaadress\r\n";
			$mailMessage .= "Namn: ".$_POST['txtBilName']."\r\n";
			$mailMessage .= "Adress: ".$_POST['txtBilStreet']."\r\n";
			$mailMessage .= "Postnr: ".$_POST['txtBilPostal']."\r\n";
			$mailMessage .= "Postort: ".$_POST['txtBilCity']."\r\n";
		
			$mailMessage .= "----------------------------------------\r\n";
		}  
		
		
		
		$mailSubject = "Ny beställning Ambosantus";
		$mailTo = "info@ambosantus.se";
		//$mailTo = "andreas@andreasengelkes.com"; // TEST
		$mailFrom = "From: order@taktil.se";
		
		if (!mail($mailTo, $mailSubject, $mailMessage, $mailFrom, '-forder@taktil.se'))
		{
			header("Location: http://www.taktiform.se/taktiform/12/bestall_klar.php?fail=email");
		}
		else
		{
			header("Location: http://www.taktiform.se/taktiform/12/bestall_klar.php");
			session_destroy();
		}
		
		echo $mailMessage;
	}
	
	include("php/html_top_new.php");
?>


<h1>
	Din varukorg
</h1>

<? ShowCart(); ?>


<? if (isset($_SESSION['Cart']) && $_GET['noform'] != 'noform') { ?>

	<p>
		Samtliga priser inklusive moms. Eventuella rabatter dras av i samband med fakturering.<br />
		<br />
		Om du handlar för första gången hos oss kan postförskottsavgift tillkomma, f.n. 55&nbsp;kr.<br />
		&nbsp;
	</p>

	<h1>
		Beställ
	</h1>
	
	<p>
		Alla fält markerade med * är obligatoriska.
	</p>
	
	<form method="post" class="OrderForm" id="order_form">
		
		<h4>Beställare</h4>
		<table border=0 cellspacing=0 cellpadding=0>
			<tr>
				<th>Namn <i>*</i></th>
				<td><input type="text" name="txtName" id="name" value="<?= $_POST['txtName'] ?>" /></td>
			</tr>
			<tr>
				<th>Mobiltelefon <i>*</i></th>
				<td><input type="text" name="txtPhone" id="phone" value="<?= $_POST['txtPhone'] ?>" /></td>
			</tr>
			<tr>
				<th>Epost <i>*</i></th>
				<td><input type="text" name="txtEmail" id="email" value="<?= $_POST['txtEmail'] ?>" /></td>
			</tr>
		</table>
		
		<h4>Leveransadress</h4>
		<table border=0 cellspacing=0 cellpadding=0>
			<tr>
				<th>Namn <i>*</i></th>
				<td><input type="text" name="txtDelName" id="del_name" value="<?= $_POST['txtDelName'] ?>" /></td>
			</tr>
			<tr>
				<th>Adress <i>*</i></th>
				<td><input type="text" name="txtDelStreet" id="street" value="<?= $_POST['txtDelStreet'] ?>" /></td>
			</tr>
			<tr>
				<th>Postnummer <i>*</i></th>
				<td><input type="text" name="txtDelPostal" id="zip" value="<?= $_POST['txtDelPostal'] ?>" class="Small" /></td>
			</tr>
			<tr>
				<th>Postort <i>*</i></th>
				<td><input type="text" name="txtDelCity" id="city" value="<?= $_POST['txtDelCity'] ?>" /></td>
			</tr>
		</table>
		
		<h4>Fakturaadress</h4>
        <p><input type="checkbox" name="sameAddress" value="yes" class="billingAddress" />Samma som leveransadress</p>
        
		<table border=0 cellspacing=0 cellpadding=0>
			<tr>
				<th>Namn <i>*</i></th>
				<td><input type="text" name="txtBilName" value="<?= $_POST['txtBilName'] ?>" /></td>
			</tr>
			<tr>
				<th>Adress <i>*</i></th>
				<td><input type="text" name="txtBilStreet" value="<?= $_POST['txtBilStreet'] ?>" /></td>
			</tr>
			<tr>
				<th>Postnummer <i>*</i></th>
				<td><input type="text" name="txtBilPostal" value="<?= $_POST['txtBilPostal'] ?>" class="Small" /></td>
			</tr>
			<tr>
				<th>Postort <i>*</i></th>
				<td><input type="text" name="txtBilCity" value="<?= $_POST['txtBilCity'] ?>" /></td>
			</tr>
		</table>
		
		<table border=0 cellspacing=0 cellpadding=0 class="Button">
			<tr>
				<th>&nbsp;</th>
				<td>
					&nbsp;<br />
					Beställningen är bindande.<br />
					Läs noga igenom <a href="om_villkor.php">försäljningsvillkoren</a> innan du beställer.<br />
					<br />
					<input type="hidden" name="orderSubmit" value="orderSubmit" />
					<input type="submit" name="submit" value="Skicka beställning &gt;&gt;" class="Button" />
				</td>
			</tr>
		</table>
		
		
	</form>

<? } else { ?>
	
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />

<? } ?>


<?
	include("php/html_bot_new.php");
?>
