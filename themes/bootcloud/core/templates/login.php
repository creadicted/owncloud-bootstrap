<!--[if IE 8]><style>input[type="checkbox"]{padding:0;}</style><![endif]-->
<div id="loginbackground">
	<ul>
		<?php if (isset($_['invalidcookie']) && ($_['invalidcookie'])): ?>
		<div class="alert centered">
	    <button type="button" class="close" data-dismiss="alert">&times;</button>
	    <strong><?php p($l->t('Automatic logon rejected!')); ?><br></strong> 
	   		 <?php p($l->t('If you did not change your password recently, your account may be compromised!')); ?>
	   		 <br />
	   		 <?php p($l->t('Please change your password to secure your account again.')); ?>
	    </div>				
		<?php endif; ?>
		<?php if (isset($_['invalidpassword']) && ($_['invalidpassword'])): ?>
			<a href="<?php print_unescaped(OC_Helper::linkToRoute('core_lostpassword_index')) ?>">				   
				<div class="alert alert-error">
			    	<?php p($l->t('Lost your password?')); ?>
				</div>
			</a>
		<?php endif; ?>
	</ul>

	<form class="form-horizontal" method="post">
		<fieldset>
			
		<?php if (!empty($_['redirect_url'])) {
			print_unescaped('<input type="hidden" name="redirect_url" value="' . OC_Util::sanitizeHTML($_['redirect_url']) . '" />');
		} ?>
		
			
			<div class="control-group">
				<label class="control-label"for="user"><?php p($l->t('Username')); ?>:</label>
				<div class="controls">
				<input type="text" name="user" id="user" placeholder="<?php p($l->t('Username')); ?>"
					   value="<?php p($_['username']); ?>"<?php p($_['user_autofocus'] ? ' autofocus' : ''); ?>
					   autocomplete="on" required/>
				</div>
			</div>
				
			<div class="control-group">
				<label class="control-label" for="password"><?php p($l->t('Password')); ?>:</label>
				<div class="controls">
					<input type="password" name="password" id="password" value="" data-typetoggle="#show" placeholder="<?php p($l->t('Password')); ?>" required<?php p($_['user_autofocus'] ? '' : ' autofocus'); ?> />
				</div>
			</div>
				
			<div class="control-group">
				<div class="controls">
					<label class="checkbox">
					<input type="checkbox" name="remember_login" value="1" id="remember_login"> <?php p($l->t('remember')); ?> </label>
					<input type="hidden" name="timezone-offset" id="timezone-offset"/>		
				</div>
				<div class="controls">
				  	<button type="submit" id="submit" class="btn btn-primary">
				 		<i class="icon-arrow-right icon icon-white"></i> <?php p($l->t('Log in')); ?>
					</button>
				</div>
			</div>
		</fieldset>
	</form>
	
	<?php if (!empty($_['alt_login'])) { ?>
	<form id="alternative-logins">
		<fieldset>
			<legend><?php p($l->t('Alternative Logins')) ?></legend>
			<ul>
				<?php foreach($_['alt_login'] as $login): ?>
					<li><a class="button" href="<?php print_unescaped($login['href']); ?>" ><?php p($login['name']); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</fieldset>
	</form>
</div>
<?php } ?>

<?php
OCP\Util::addscript('core', 'visitortimezone');