<?

// Function that shows one product with name, price, add-to-cart-button etc.
function ShowProduct($number, $size = 'Full')
{
	global $arrProducts;
	
	?>
	<div class="Product Product<?=$size?>">
		<h6>
			<span class="ProductNumber"><?=$arrProducts[$number]['number']?></span>
			<?=$arrProducts[$number]['name']?>
		</h6>
		<p>
			<?=nl2br(htmlentities($arrProducts[$number]['description'], ENT_QUOTES))?>
			<span class="ProductPrice">Pris: <?=$arrProducts[$number]['price']?> kr</span>
		</p>
		<form action="" method="post">
			<input type="hidden" name="AddProduct" value="<?=$arrProducts[$number]['number']?>" />
			<input type="submit" name="Submit" value="+ Lägg i varukorg" class="Button" />
		</form>
	</div>
	<?
}


// Function that writes a div tag used at the end of a group of products
function ShowProductClearing()
{
	?><div class="ProductClearing">&nbsp;</div><?
}

?>