<?php 
/*
 *	NamelessMC | Custom Wikipedia System
 *  Created by Lucy | https://github.com/LucyDevv
 *
 *  License: Open Source (MIT)
 */

// Index page
$page = 'wiki'; // for navbar
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The wiki homepage for the <?php echo $sitename; ?> community">
    <meta name="author" content="<?php echo $sitename; ?>">
    <meta name="theme-color" content="#454545" />
    <title>Home &bull; Wiki &bull; <?php echo $sitename; ?></title>
	<?php if(isset($custom_meta)){ echo $custom_meta; } ?>
	
	<?php
	// Generate header and navbar content
	// Page title
	$title = $navbar_language['home'];
	
	require('core/includes/template/generate.php');
	?>
	
	<!-- Custom style -->
	<style>
	html {
		overflow-y: scroll;
	}
	.wiki-body {
	    padding-left: 40px;
	    padding-right: 40px;
	}
	</style>
	
  </head>
  <body>
	<?php
	// Load navbar
	$smarty->display('styles/templates/' . $template . '/navbar.tpl');
	
	// Generate code for page
	$smarty->assign('SITENAME', $sitename);
	$smarty->assign('NEWS', $general_language['news']);
	$smarty->assign('SOCIAL', $general_language['social']);
	
	// HTML Purifier
	require_once('core/includes/htmlpurifier/HTMLPurifier.standalone.php');
	$config = HTMLPurifier_Config::createDefault();
	$config->set('HTML.Doctype', 'XHTML 1.0 Transitional');
	$config->set('URI.DisableExternalResources', false);
	$config->set('URI.DisableResources', false);
	$config->set('CSS.Trusted', true);
	$config->set('HTML.Allowed', 'u,p,b,i,a,small,blockquote,span[style],span[class],p,strong,em,li,ul,ol,div[align],br,img');
	$config->set('CSS.AllowedProperties', array('position', 'padding-bottom', 'padding-top', 'top', 'left', 'height', 'width', 'overflow', 'text-align', 'float', 'color','background-color', 'background', 'font-size', 'font-family', 'text-decoration', 'font-weight', 'font-style', 'font-size'));
	$config->set('HTML.AllowedAttributes', 'target, href, src, height, width, alt, class, *.style');
	$config->set('Attr.AllowedFrameTargets', array('_blank', '_self', '_parent', '_top'));
	$config->set('HTML.SafeIframe', true);
	$config->set('URI.SafeIframeRegexp', '%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%');
	$purifier = new HTMLPurifier($config);
	
	?>
	
	<!-- Title --><div class="wiki-body">
	<br><center><h2><?php echo $sitename; ?> Wiki - Home</h2></center>
	
	<!-- Grid to set the navigation away from the content -->
	<div class="row">
	    <!-- Column inside the grid for navigation -->
	    <div class="col-md-3">
	        
	        <div class="list-group">
  <a href="index.php" class="list-group-item">
    <h4 class="list-group-item-heading">Home</h4>
    <p class="list-group-item-text">Index page, contains the overview for the wiki and some wiki infomation.</p>
  </a>
  <a href="categories/ranks.php" class="list-group-item active">
    <h4 class="list-group-item-heading">Ranks</h4>
    <p class="list-group-item-text">Infomation on the various Mythix Ranks, normal, donator and staff!</p>
  </a>
</div>

	        </div>
	    <!-- Column inside the grid for content -->
	    <div class="col-md-9">
	        <h1>Welcome</h1>
	        <p>Heyo! Welcome to the official <?php echo $sitename; ?> Wiki!<br>Here you will find infomation on many things, such as infomation on our ranks and perks,<br>kits, boosters and more!</p>
	        </div>
	</div><!-- END --> </div>
	<br>
	
	<?php
	// Footer
	require('core/includes/template/footer.php');
	$smarty->display('styles/templates/' . $template . '/footer.tpl');
	
	// Scripts 
	require('core/includes/template/scripts.php');
	?>
	
  </body>
</html>
