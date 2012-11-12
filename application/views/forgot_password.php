<? extend('base_template') ?>

	<? startblock('content') ?>
		<h1>Forgot Password</h1>
		<p>Insert your username and your email to retrieve back your password.</p>
		<?=@$info?>
		<div class="form_settings">
		  <?=form_open()?>
            <p><span><label for="user">Username : </label></span>
			<?=form_input(array('name' => 'username', 'value' => set_value('username'), 'maxlength' => '12', 'size' => '12', 'id' => 'user'))?>
			<br /><?=form_error('username')?>
			</p>

            <p><span><label for="pass">Email : </label></span>
			<?=form_input(array('name' => 'email', 'value' => set_value('email'), 'maxlength' => '50', 'size' => '20', 'id' => 'pass'))?>
			<br /><?=form_error('email')?>
			</p>
            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('for_pass', 'Send Password', 'class="submit"')?></p>
		<?=form_close()?>
		</div>

	<? endblock() ?>

<? end_extend() ?>