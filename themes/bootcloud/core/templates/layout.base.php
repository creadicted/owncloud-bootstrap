<!DOCTYPE html>
<!--[if lt IE 7]><html class="ng-csp ie ie6 lte9 lte8 lte7"><![endif]-->
<!--[if IE 7]><html class="ng-csp ie ie7 lte9 lte8 lte7"><![endif]-->
<!--[if IE 8]><html class="ng-csp ie ie8 lte9 lte8"><![endif]-->
<!--[if IE 9]><html class="ng-csp ie ie9 lte9"><![endif]-->
<!--[if gt IE 9]><html class="ng-csp ie"><![endif]-->
<!--[if !IE]><!--><html class="ng-csp"><!--<![endif]-->
	<head>
		<title>ownCloud</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php $themepath = OC::$WEBROOT.'/themes/'.OC_Util::getTheme() ?>
		 
		<link media="screen" type="text/css" href="<?php print_unescaped($themepath.'/core/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link media="screen" type="text/css" href="<?php print_unescaped($themepath.'/core/css/bootstrap-responsive.css') ?>" rel="stylesheet">
		<link media="screen" type="text/css" href="<?php print_unescaped($themepath.'/core/css/style.css') ?>" rel="stylesheet">

	    <script src="<?php print_unescaped($themepath.'/core/js/jquery-2.0.1.min.js') ?>"></script>
    	<script type="text/javascript" src="<?php print_unescaped(OC::$WEBROOT.'/themes/'.OC_Util::getTheme().'/core/js/bootstrap.min.js') ?>"></script>
    
		<link rel="shortcut icon" href="<?php print_unescaped(image_path('', 'favicon.png')); ?>" />
		<link rel="apple-touch-icon-precomposed" href="<?php print_unescaped(image_path('', 'favicon-touch.png')); ?>" />
		<?php foreach ($_['cssfiles'] as $cssfile): ?>
			<link rel="stylesheet" href="<?php print_unescaped($cssfile); ?>" type="text/css" media="screen" />
		<?php endforeach; ?>
		<?php foreach ($_['jsfiles'] as $jsfile): ?>
			<script type="text/javascript" src="<?php print_unescaped($jsfile); ?>"></script>
		<?php endforeach; ?>
		<?php foreach ($_['headers'] as $header): ?>
			<?php
				print_unescaped('<'.$header['tag'].' ');
				foreach ($header['attributes'] as $name => $value) {
					print_unescaped("$name='$value' ");
				};
				print_unescaped('/>');
			?>
		<?php endforeach; ?>
	</head>

	<body>
		<?php print_unescaped($_['content']); ?>
	</body>
</html>
