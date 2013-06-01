<!DOCTYPE html>
<!--[if lt IE 7]><html class="ng-csp ie ie6 lte9 lte8 lte7"><![endif]-->
<!--[if IE 7]><html class="ng-csp ie ie7 lte9 lte8 lte7"><![endif]-->
<!--[if IE 8]><html class="ng-csp ie ie8 lte9 lte8"><![endif]-->
<!--[if IE 9]><html class="ng-csp ie ie9 lte9"><![endif]-->
<!--[if gt IE 9]><html class="ng-csp ie"><![endif]-->
<!--[if !IE]><!--><html class="ng-csp"><!--<![endif]-->
	<head data-user="<?php p($_['user_uid']); ?>" data-requesttoken="<?php p($_['requesttoken']); ?>">
		<title><?php p(!empty($_['application'])?$_['application'].' | ':'') ?>ownCloud
			<?php p(trim($_['user_displayname']) != '' ?' ('.$_['user_displayname'].') ':'') ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="apple-itunes-app" content="app-id=543672169">
		<link rel="shortcut icon" href="<?php print_unescaped(image_path('', 'favicon.png')); ?>" />
		<link rel="apple-touch-icon-precomposed" href="<?php print_unescaped(image_path('', 'favicon-touch.png')); ?>" />
		<?php foreach($_['cssfiles'] as $cssfile): ?>
			<link rel="stylesheet" href="<?php print_unescaped($cssfile); ?>" type="text/css" media="screen" />
		<?php endforeach; ?>
		<?php foreach($_['jsfiles'] as $jsfile): ?>
			<script type="text/javascript" src="<?php print_unescaped($jsfile); ?>"></script>
		<?php endforeach; ?>
		<?php foreach($_['headers'] as $header): ?>
			<?php
				print_unescaped('<'.$header['tag'].' ');
				foreach($header['attributes'] as $name=>$value) {
					print_unescaped("$name='$value' ");
				};
				print_unescaped('/>');
			?>
		<?php endforeach; ?>
		
		<!-- Include bootstrap css-->
		<link media="screen" type="text/css" href="<?php print_unescaped(BC_CUSTOM::getThisTheme("css").'/bootstrap.min.css') ?>" rel="stylesheet">
		<link media="screen" type="text/css" href="<?php print_unescaped(BC_CUSTOM::getThisTheme("css").'/bootstrap-responsive.css') ?>" rel="stylesheet">
		<!-- Include custom theme css-->
		<link media="screen" type="text/css" href="<?php print_unescaped(BC_CUSTOM::getThisTheme("css").'/style.css') ?>" rel="stylesheet">
		<!-- Include bootstrap .js
			Has to be reincluded. currently the whole thing is loaded and not everything is needed in here-->			
    	<script type="text/javascript" src="<?php print_unescaped(BC_CUSTOM::getThisTheme("js").'/bootstrap.min.js') ?>"></script>
    	
    	<!-- Including the fontawesome font
    	 	This is partially included in the bootstrap css -->
    	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">    	
   	</head>
   	
	<body id="<?php p($_['bodyid']);?>">
		
	<div id="notification-container">
		<div id="notification" class="alert" ></div>
	</div>
	<header>
		<div style="position: static;" class="navbar  navbar-fixed-top navbar-inverse">
              <div class="navbar-inner">
              	 <!-- responsive toggle -->
                 <div class="container">
              	   <a data-target=".navbar-inverse-collapse" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                 </a>
                 <!-- /responsive toggle  -->
                 <!-- logo -->
                  <a href="<?php print_unescaped(link_to('', 'index.php')); ?>" class="brand">
                  	<img class="svg" style="fill:black; height: 20px; color:#000000;" src="<?php print_unescaped(image_path('', 'logo-wide.svg')); ?>" alt="ownCloud" />     	
                  </a>                  
                 <!-- /logo -->
                  <div class="nav-collapse collapse navbar-inverse-collapse">
					<!-- main menu -->            
					<ul class="nav">
						<?php foreach($_['navigation'] as $entry):?>
						<li <?php if( $entry['active'] ): ?> class="active"<?php endif; ?> data-id="<?php p($entry['id']); ?>">
							<a href="<?php print_unescaped($entry['href']); ?>" title=""> 
								<i class="icon <?php print_unescaped('icon-'.BC_CUSTOM::getNavIcons($entry["id"])); ?>"></i>
								<span> <?php p($entry['name']); ?> </span>
							</a>
						</li>
						<?php endforeach; ?>
						<li class="divider-vertical"></li>
					</ul>
                    <!-- /main menu -->
                                       
  					<!-- searchbar -->
					<form action="#" class="navbar-search pull-left searchbox" method="post">
						<input id="searchbox" class="svg search-query span2" type="search" name="query"
						value="<?php if(isset($_POST['query'])) {p($_POST['query']);};?>" placeholder="Search"
						autocomplete="off" x-webkit-speech />
					</form>
					<!-- /searchbar -->
                    
                    <!-- user menu -->	                   
               		<ul class="nav pull-right">
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#"> <?php  p(trim($_['user_displayname']) != '' ? $_['user_displayname'] : $_['user_uid'])
							?>
							<b class="caret"></b> </a>
							<ul class="dropdown-menu">
								<?php foreach($_['settingsnavigation'] as $entry):
								?>
								
								<li>
									<a href="<?php print_unescaped($entry['href']); ?>" title=""
									<?php if( $entry["active"] ): ?> class="active"<?php endif; ?>>
										<i class="icon-fixed-width <?php print_unescaped('icon-'.BC_CUSTOM::getSetNavIcons($entry["id"])); ?>"></i> 
										<?php p($entry['name'])?>
									</a>
									
								</li>
								<?php endforeach;
								?>
								<li class="divider"></li>
								<li>
									<a id="logout" href="<?php print_unescaped(link_to('', 'index.php')); ?>?logout=true"> <i class="icon-fixed-width icon-off"></i> <?php p($l->t('Log out'));
									?></a>
								</li>
							</ul>
							
							
						</li>
					</ul>
					
              		<!-- /user menu -->
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div>    
	</header>

	<div id="content-wrapper" class="container">
		<div id="content">
			<?php print_unescaped($_['content']); ?>
		</div>		        
	</div>
	</body>
</html>
