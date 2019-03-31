<?

// Function that shows one product with name, price, add-to-cart-button etc.
function ShowProduct($number, $size = 'Full')
{
	global $arrProducts;
	
	?>
	<div class="Product Product<?=$size?>">
    <div class="top<?=$size?>">
		</div>
<!--		<h6>
			<span class="ProductNumber"><? //= $arrProducts[$number]['number'] ?></span>
			<? //=$arrProducts[$number]['name']?>
		</h6>-->
		<p>
			<? ShowProductImage($arrProducts[$number]['number']) ?>
            <?=$arrProducts[$number]['number']?>
			<?=nl2br(htmlentities($arrProducts[$number]['description'], ENT_QUOTES))?>
			<!--<span class="ProductPrice">Pris: <? //=$arrProducts[$number]['price']?> kr</span>-->
		</p>
		<form action="" method="post">
			<input type="hidden" name="AddProductId" value="<?=$arrProducts[$number]['number']?>" />
			<button type="submit" name="Submit" value="+ K�P" class="Button">+ K�P (<?=$arrProducts[$number]['price']?> kr)</button>
		</form>
        <div class="bottom<?=$size?>">
		</div>
	</div>
	<?
}


function ShowProductImage($number)
{
	$file = '';
	
	
	if ($number == 3012) $file = 'pr_olja_afton.jpg';
	//else if ($number == 3013) $file = 'pr_olja_morgon.jpg';
	else if ($number == 3011) $file = 'pr_olja_morgon.jpg';
	else if ($number == 3010) $file = 'pr_olja_neutral.jpg';
	else if ($number == 3017) $file = 'pr_olja_neutral_stor.jpg';
	else if ($number == 3021) $file = 'pr_olja_ansikts.jpg';
	else if ($number == 3023) $file = 'pr_ullsalva.jpg';
	else if ($number == 3024) $file = 'pr_ulltacke.jpg';
	
/*	else if ($number == 3025) $file = 'pr_tofflor.jpg';
	else if ($number == 3026) $file = 'pr_tofflor.jpg';
	else if ($number == 3027) $file = 'pr_tofflor.jpg';*/
	
	else if ($number == 3032) $file = 'pr_massagebank.jpg';
	else if ($number == 3033) $file = 'dekal.jpg';
	else if ($number == 3093) $file = 'pr_massagestol.jpg';
	
	else if ($number == 3034) $file = 'pr_vaska.jpg';
	
	else if ($number == 3031) $file = 'pr_varmehund.jpg';
	else if ($number == 3035) $file = 'pr_varmenalle.jpg';
	else if ($number == 3030) $file = 'pr_varmeflaska.jpg';
	else if ($number == 3037) $file = 'pr_varmelamm.jpg';
	
	else if ($number == 3046) $file = 'pr_cd_taktilatoner.jpg';
	else if ($number == 3040) $file = 'pr_cd_dreams.jpg';
	else if ($number == 3041) $file = 'pr_cd_stunder.jpg';
	else if ($number == 3047) $file = 'pr_cd_eden.jpg';
	else if ($number == 3043) $file = 'pr_cd_piano.jpg';
	else if ($number == 3042) $file = 'pr_cd_clearstillness.jpg';
	else if ($number == 3044) $file = 'pr_cd_einekleine.jpg';
	else if ($number == 3049) $file = 'pr_cd_ilugnochro.jpg';
	else if ($number == 3048) $file = 'pr_cd_echoes.jpg';	
	
	else if ($number == 3060) $file = 'pr_litt_mjukmassage.jpg';
	else if ($number == 3061) $file = 'pr_litt_orden.jpg';
	else if ($number == 3062) $file = 'pr_litt_kost.jpg';
	else if ($number == 3063) $file = 'pr_litt_karleken.jpg';
	else if ($number == 3064) $file = 'pr_litt_varforkanner.jpg';
	else if ($number == 3065) $file = 'pr_litt_touching.jpg';
	else if ($number == 3066) $file = 'pr_litt_beroring.jpg';	
	
	else if ($number == 3067) $file = 'pr_handduk.jpg';
	else if ($number == 3068) $file = 'pr_litt_dokumentera.jpg';
	else if ($number == 3069) $file = 'pr_litt_arstaholmar.jpg';
	else if ($number == 3070) $file = 'pr_stud_anknytning.jpg';
	else if ($number == 3071) $file = 'pr_stud_demens.jpg';
	else if ($number == 3072) $file = 'pr_stud_anknytning_dvd.jpg';
	
	else if ($number == 3083) $file = 'pr_startpaket.jpg';
	else if ($number == 3082) $file = 'pr_startpaket_2.jpg';
	
	
	if (strlen($file) > 0)
	{
		?><img src="media/images/<?= $file ?>" class="ProductImage" /><?
	}
}


// Function that writes a div tag used at the end of a group of products
function ShowProductClearing()
{
	?><div class="ProductClearing">&nbsp;</div><?
}

?>