<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Taktiform</title>
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="media/styles-190428.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="jQuery.js"></script>
<script type="text/javascript">

jQuery(document).ready(function() {	

	jQuery("#order_form").submit(function() {
		
		var message = "";
		
		if($("#name").val() == "" || $("#phone").val() == "" || $("#email").val() == "" || $("#address").val() == "" || $("#street").val() == "" || $("#zip").val() == "" || $("#city").val() == "") {
			
			if($("#name").val() == "") {
				message += "Du glömde fylla i ditt namn!";
			}
			else if($("#phone").val() == "") {
				message += "Du glömde fylla i ditt telefonnummer!";
			}
			else if($("#email").val() == "") {
				message += "Du glömde fylla i din epost!";
			}
			else if($("#del_name").val() == "") {
				message += "Du glömde fylla i ditt namn för leverans!";
			}
			else if($("#street").val() == "") {
				message += "Du glömde fylla i din adress!";
			}
			else if($("#zip").val() == "") {
				message += "Du glömde fylla i ditt postnummer!";
			}
			else if($("#city").val() == "") {
				message += "Du glömde fylla i din postort!";
			}
			
		alert(message);
		return false;			
		
		}
		
	});
	
});
</script>
</head>
<body <?php if ($bodyFront) { ?>class="BodyFront"<?php } ?>>

<div class="StructureOuter">
<?php
function curPageName() 
{
	return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

$current_page = curPageName();

?>

<div class="StructureTop">
<?php if ($bodyFront) { ?>

<!--<style type="text/css">

div.StructureContent {
	border: none;
	background: transparent;
}

div.StructureContentInner {
	padding: 0px;
	background: transparent;
}

div.StructureMenu {
	margin: 90px 22px 20px 0px;
}

div.content_top, div.content_bottom {
	display: none;
}



</style>-->
			
<?php } else { ?>

<!--<style type="text/css">

div.StructureTop {
	margin: 0px 0px 20px 0px;
	height: 45px;
}

</style>-->

<?php } ?>

<div class="leftTop">
<p class="taktiform"><span class="taktiform taktiform-thick">takti</span>form<span class="taktiform taktiform-reg">®</span></p>
<!--<img src="media/images/logo.png" alt="Ambosantus" />-->
</div>

<div class="rightTop">
<p class="top_p">
För friskvård och omsorg
</p>
</div>



</div>
	
<div class="content-wrap">
<div class="StructureMenu">
<!--
<div class="menu_bg_top">
</div>
-->
<ul>
<li><a href="index.php" class="<?php if($current_page == 'index.php') echo 'current'; ?> start_link">Start</a></li>
                
<li><a href="pr_hudvard.php" class="<?php if($current_page == 'pr_hudvard.php') echo 'current'; ?> startpaket_link">Hudv&aring;rd, oljor, startpaket</a></li>

<li><a href="pr_ulltofflortacke.php" class="<?php if($current_page == 'pr_ulltofflortacke.php') echo 'current'; ?> varme_link">V&auml;rme <span class="and">och</span> mjukdjur</a></li>

<li><a href="pr_litteratur.php" class="<?php if($current_page == 'pr_litteratur.php') echo 'current'; ?> bocker_link">LITTERATUR</a></li>

<li><a href="pr_musik.php" class="<?php if($current_page == 'pr_musik.php') echo 'current'; ?> musik_link">Musik</a></li>

<li><a href="pr_laromedel.php" class="<?php if($current_page == 'pr_laromedel.php') echo 'current'; ?> musik_link">l&auml;romedel</a></li>

<li><a href="pr_trojvaska.php" class="<?php if($current_page == 'pr_trojvaska.php') echo 'current'; ?> trojor_link">ARBETSUTRUSTNING</a></li>
                
<li><a href="pr_startpaket.php" class="<?php if($current_page == 'pr_startpaket.php') echo 'current'; ?> musik_link">massageb&auml;nk</a></li>
                                
                
<li><a href="om_villkor.php"  class="<?php if($current_page == 'om_villkor.php') echo 'current'; ?> musik_link"><span class="and">Kontakt/F&ouml;rs&auml;ljningsvillkor</span></a></li>
</ul>
  
<!--
<div class="menu_bg_bottom">
</div>   
-->
</div><!--StructureMenu-->
<?php ShowCartMini(); ?>
<div class="StructureContent">
<!--
<div class="content_top">
</div>
-->
<div class="StructureContentInner">



		