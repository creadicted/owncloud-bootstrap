<?php if(count($_["breadcrumb"])):?>	
<br />
<ul class="breadcrumb">
	<?php if(count($_["breadcrumb"])):?>	
    <li><a href="<?php print_unescaped($_['baseURL']); ?>"><i class="icon-home"></i>Home</a> <span class="divider">/</span></li>
<?php endif;?>
<?php for($i=0; $i<count($_["breadcrumb"]); $i++):
	$crumb = $_["breadcrumb"][$i];
	$dir = str_replace('+', '%20', urlencode($crumb["dir"]));
	$dir = str_replace('%2F', '/', $dir); ?>	
	<li class="<?php if($i == count($_["breadcrumb"])-1) p('last');?>"><a href="<?php p($_['baseURL'].$dir); ?>"><?php p($crumb["name"]); ?></a> <span class="divider">/</span></li>
<?php endfor;?>
</ul>
<?php endif;?>