<?

$PRICE_POST = 120;

function CartProductAdd($productId)
{
	if (isset($_SESSION['Cart'][$productId]))
	{
		$_SESSION['Cart'][$productId]++;
	}
	else
	{
		$_SESSION['Cart'][$productId] = 1;
	}
}

function CartProductRemove($productId)
{
	if (isset($_SESSION['Cart'][$productId]) && $_SESSION['Cart'][$productId] > 1)
	{
		$_SESSION['Cart'][$productId]--;
	}
	else
	{
		unset($_SESSION['Cart'][$productId]);
	}
	
	// Check if cart is completely empty
	$i = 0;
	foreach ($_SESSION['Cart'] as $key => $value) $i++;
	if ($i == 0) CartEmpty();
}

function CartEmpty()
{
	unset($_SESSION['Cart']);
}

function CartGetEmailText()
{
	global $arrProducts;
	global $PRICE_POST;
	
	if (isset($_SESSION['Cart']))
	{
		$total = 0;
		$pricePost = $PRICE_POST;
		$message = '';
		
		foreach ($_SESSION['Cart'] as $key => $value)
		{
			$total = $total + ($arrProducts[$key]['price'] * $value);
			if ($arrProducts[$key]['price_post'] > $pricePost) $pricePost = $arrProducts[$key]['price_post'];
			
			$message .= "----------------------------------------\r\n";
			$message .= "Art. nr: " . $arrProducts[$key]['number'] . "\r\n";
			$message .= "Antal: " . $value." st\r\n";
			$message .= "Produktnamn: " . $arrProducts[$key]['name'] . "\r\n";
			$message .= "Styckepris: " . $arrProducts[$key]['price'] . " kr\r\n";
			$message .= "----------------------------------------";
		}
		
		$message .= "\r\nSUMMA inkl moms och frakt: "  .($total + $pricePost) . " kr\r\n";
		$message .= "----------------------------------------\r\n";
		
		return $message;
	}
	else
	{
		return 'Varukorgen är tom';
	}
}

function ShowCart()
{
	global $arrProducts;
	global $PRICE_POST;
	
	if (isset($_SESSION['Cart']))
	{
		$total = 0;
		$pricePost = $PRICE_POST;
		?>
		<table border=0 cellspacing=0 cellpadding=0 class="CartTable">
			<tr>
				<th class="Name">Produkt</th>
				<th class="Price">Pris</th>
				<th class="Count">Antal</th>
				<th class="Count2">&nbsp;</th>
			</tr>
			<? foreach ($_SESSION['Cart'] as $key => $value) { ?>
				<?
				$total = $total + ($arrProducts[$key]['price'] * $value);
				if ($arrProducts[$key]['price_post'] > $pricePost) $pricePost = $arrProducts[$key]['price_post'];
				?>
				<tr>
					<td class="Name"><?= $arrProducts[$key]['name'] ?> <span class="Number">(Art. <?= $key ?>)</span></td>
					<td class="Price">á <?= $arrProducts[$key]['price'] ?> kr</td>
					<td class="Count"><?= $value ?> st</td>
					<td class="Count2">
						<form action="" method="post">
							<input type="hidden" name="AddProductId" value="<?=$arrProducts[$key]['number']?>" />
							<input type="submit" name="Submit" value="+" class="Button" />
						</form>
						<form action="" method="post">
							<input type="hidden" name="RemProductId" value="<?=$arrProducts[$key]['number']?>" />
							<input type="submit" name="Submit" value="-" class="Button" />
						</form>
					</td>
				</tr>
			<? } ?>
			<tr class="Rebate">
				<td class="Name">Fraktavgift</td>
				<td class="Price"><?= $pricePost ?> kr</td>
				<td class="Count">&nbsp;</td>
				<td class="Count2">&nbsp;</td>
			</tr>
			<tr class="Total">
				<td class="Name">Summa inkl. moms och frakt</td>
				<td class="Price"><?= $total + $pricePost ?> kr</td>
				<td class="Count">&nbsp;</td>
				<td class="Count2">&nbsp;</td>
			</tr>
		</table>
		<?
	}
	else
	{
		?><p style="width: 570px; float: left; font-size: 12px;"><strong>Varukorgen är tom.</strong></p><?
	}
}

function ShowCartMini()
{
	global $arrProducts;
	
	if (isset($_SESSION['Cart']))
	{
		$total = 0;
		?>
		<div class="CartMini">
        <div class="menu_bg_top">
		</div>
        <div class="cart-mini-bg">
			<h5>Varukorg</h5>
			<ul>
				<? foreach ($_SESSION['Cart'] as $key => $value) { ?>
					<? $total = $total + ($arrProducts[$key]['price'] * $value); ?>
					<li><?= $value ?> x <?= substr($arrProducts[$key]['name'], 0, 20) ?><br />
                    
                    á <?= $arrProducts[$key]['price'] ?> kr</li>
                    
				<? } ?>
                
				<li><strong>Summa: <?= $total ?> kr</strong></li>

				<li><a href="bestall.php?noform=noform">Ändra i varukorgen &gt;&gt;</a></li>
                
				<li><strong><a href="bestall.php">Beställ &gt;&gt;</a></strong></li>
			</ul>
            </div>
            <div class="menu_bg_bottom">
</div>
		</div>
		<?
	}
}

?>