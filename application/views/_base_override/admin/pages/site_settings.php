<?php echo text_output($header, 'h1', 'page-head');?>

<p class="bold"><?php echo anchor('site/usersettings', img($images['gear']) .' '. $label['manageuser']);?></p>

<div id="tabs">
	<ul>
		<li><a href="#one"><span><?php echo $label['general'];?></span></a></li>
		<li><a href="#two"><span><?php echo $label['system'];?></span></a></li>
		<li><a href="#three"><span><?php echo $label['appearance'];?></span></a></li>

		<?php if (isset($user)): ?>
			<li><a href="#four"><span><?php echo $label['user'];?></span></a></li>
		<?php endif; ?>

		<li><a href="#mibbit"><span><?php echo $label['mibbit'];?></span></a></li>
	</ul>

	<div id="one">
		<?php echo form_open('site/settings');?>
			<?php echo text_output($label['header_gen'], 'h2', 'page-subhead');?>

			<div class="indent-left">
				<p>
					<kbd><?php echo $label['name'];?></kbd>
					<?php echo form_input($inputs['sim_name']);?>
				</p>
				<p>
					<kbd><?php echo $label['year'];?></kbd>
					<?php echo form_input($inputs['sim_year']);?>
				</p>
				<p>
					<kbd>
						<?php echo $label['type'];?>
						&nbsp;
						<?php echo anchor('site/simtypes', '['. $label['edit'] .']', array('class' => 'fontTiny'));?>
					</kbd>
					<?php echo form_dropdown('sim_type', $values['sim_type'], $default['sim_type']);?>
					<?php echo form_hidden('old_sim_type', $default['sim_type']);?>
				</p>
			</div>

			<br />
			<p><?php echo form_button($button_submit);?></p>
		<?php echo form_close();?>
	</div>

	<div id="two">
		<?php echo form_open('site/settings/1');?>
			<?php echo text_output($label['header_system'], 'h2', 'page-subhead');?>

			<div class="indent-left">
				<p>
					<kbd><?php echo $label['maint'];?></kbd>
					<?php echo form_radio($inputs['maintenance_on']) .' '. form_label($label['on'], 'maintenance_on');?>
					<?php echo form_radio($inputs['maintenance_off']) .' '. form_label($label['off'], 'maintenance_off');?>
				</p>
				<p>
					<kbd><?php echo $label['updates'];?></kbd>
					<?php echo form_dropdown('updates', $values['updates'], $default['updates']);?>
				</p><br />

				<p>
					<kbd><?php echo $label['date'];?></kbd>
					<?php echo form_dropdown('date_format', $values['date_format'], $default['date_format']);?>
				</p>
				<p>
					<kbd><?php echo $label['timezone'];?></kbd>
					<?php echo timezone_menu($this->timezone, '', 'timezone');?>
				</p>
				<p>
					<kbd><?php echo $label['dst'];?></kbd>
					<?php echo form_radio($inputs['dst_y']) .' '. form_label($label['yes'], 'dst_y');?>
					<?php echo form_radio($inputs['dst_n']) .' '. form_label($label['no'], 'dst_n');?>
				</p><br />

				<p>
					<kbd><?php echo $label['allowed_chars'];?></kbd>
					<?php echo form_input($inputs['allowed_playing_chars']);?>
				</p>
				<p>
					<kbd><?php echo $label['allowed_npcs'];?></kbd>
					<?php echo form_input($inputs['allowed_npcs']);?>
				</p><br />

				<p>
					<kbd>
						<?php echo $label['online'];?>&nbsp;
						<a href="#" rel="tooltip" class="fontTiny image" tooltip="<?php echo $label['tt_online_timespan'];?>"><?php echo img($images['help']);?></a>
					</kbd>
					<?php echo form_input($inputs['online_timespan']);?>
					<span class="gray"><?php echo $label['minutes'];?>
				</p>
				<p>
					<kbd>
						<?php echo $label['requirement'];?>&nbsp;
						<a href="#" rel="tooltip" class="fontTiny image" tooltip="<?php echo $label['tt_posting_requirement'];?>"><?php echo img($images['help']);?></a>
					</kbd>
					<?php echo form_input($inputs['posting_req']);?>
					<span class="gray"><?php echo $label['days'];?>
				</p>
			</div><br />

			<?php echo text_output($label['header_email'], 'h2', 'page-subhead');?>

			<div class="indent-left">
				<p>
					<kbd><?php echo $label['sysemail'];?></kbd>
					<?php echo form_radio($inputs['sys_email_on']) .' '. form_label($label['on'], 'sys_email_on');?>
					<?php echo form_radio($inputs['sys_email_off']) .' '. form_label($label['off'], 'sys_email_off');?>
				</p>
				<p>
					<kbd><?php echo $label['emailsubject'];?></kbd>
					<?php echo form_input($inputs['email_subject']);?>
				</p>
				<p>
					<kbd><?php echo $label['emailname'];?></kbd>
					<?php echo form_input($inputs['email_name']);?>
				</p>
				<p>
					<kbd><?php echo $label['emailaddress'];?></kbd>
					<?php echo form_input($inputs['email_address']);?>
				</p>
			</div>

			<br />
			<p><?php echo form_button($button_submit);?></p>
		<?php echo form_close();?>
	</div>

	<div id="three">
		<?php echo form_open('site/settings/2');?>
			<?php echo text_output($label['header_skins'], 'h2', 'page-subhead');?>

			<div class="indent-left">
				<p>
					<kbd><?php echo $label['skin_main'];?></kbd>
					<?php echo form_dropdown('skin_main', $themes['main'], $default['skin_main'], 'class="skins" myType="main"');?>
					&nbsp;<a href="#" class="image cb preview-main"><?php echo img($images['view']);?></a>
				</p>
				<p>
					<kbd><?php echo $label['skin_login'];?></kbd>
					<?php echo form_dropdown('skin_login', $themes['login'], $default['skin_login'], 'class="skins" myType="login"');?>
					&nbsp;<a href="#" class="image cb preview-login"><?php echo img($images['view']);?></a>
				</p>
				<p>
					<kbd><?php echo $label['skin_wiki'];?></kbd>
					<?php echo form_dropdown('skin_wiki', $themes['wiki'], $default['skin_wiki'], 'class="skins" myType="wiki"');?>
					&nbsp;<a href="#" class="image cb preview-wiki"><?php echo img($images['view']);?></a>
				</p>
			</div><br />

			<?php echo text_output($label['header_options'], 'h2', 'page-subhead');?>

			<div class="indent-left">
				<p>
					<kbd><?php echo $label['rank'];?></kbd>
					<?php echo form_dropdown('display_rank', $values['ranks'], $this->options['display_rank'], 'id="rank"');?>
					&nbsp; <span id="loading_rank" class="hidden fontSmall gray"><?php echo img($images['loading']);?></span>
					<p id="rank_img" class="fontSmall gray"><?php echo img($inputs['rank']);?></p>
				</p><br />

				<p>
					<kbd><?php echo $label['posts_num'];?></kbd>
					<?php echo form_input($inputs['list_posts_num']);?>
				</p>
				<p>
					<kbd><?php echo $label['logs_num'];?></kbd>
					<?php echo form_input($inputs['list_logs_num']);?>
				</p>
				<p>
					<kbd><?php echo $label['news_show'];?></kbd>
					<?php echo form_radio($inputs['show_news_y']);?>
					<?php echo form_label($label['yes'], 'show_news_y');?>

					<?php echo form_radio($inputs['show_news_n']);?>
					<?php echo form_label($label['no'], 'show_news_n');?>
				</p>
				<p>
					<kbd><?php echo $label['use_notes'];?></kbd>
					<?php echo form_radio($inputs['use_mission_notes_y']);?>
					<?php echo form_label($label['yes'], 'use_mission_notes_y');?>

					<?php echo form_radio($inputs['use_mission_notes_n']);?>
					<?php echo form_label($label['no'], 'use_mission_notes_n');?>
				</p>
				<p>
					<kbd><?php echo $label['sample_post'];?></kbd>
					<?php echo form_radio($inputs['use_sample_post_y']);?>
					<?php echo form_label($label['yes'], 'use_sample_post_y');?>

					<?php echo form_radio($inputs['use_sample_post_n']);?>
					<?php echo form_label($label['no'], 'use_sample_post_n');?>
				</p>
				<p>
					<kbd>
						<?php echo $label['count_format'];?>&nbsp;
						<a href="#" rel="tooltip" class="fontTiny image" tooltip="<?php echo $label['tt_post_count'];?>"><?php echo img($images['help']);?></a>
					</kbd>
					<?php echo form_radio($inputs['post_count_multi']);?>
					<?php echo form_label($label['count_multiple'], 'post_count_multi');?>

					<?php echo form_radio($inputs['post_count_single']);?>
					<?php echo form_label($label['count_single'], 'post_count_single');?>
				</p>
				<p>
					<kbd><?php echo $label['manifest'];?></kbd>
					<?php echo form_dropdown('manifest_defaults', $values['manifest'], $default['manifest']);?>
				</p>
			</div>

			<br />
			<p><?php echo form_button($button_submit);?></p>
		<?php echo form_close();?>
	</div>

	<?php if (isset($user)): ?>
		<div id="four">
			<?php echo form_open('site/settings/3');?>
				<?php echo text_output($label['header_user'], 'h2', 'page-subhead');?>

				<?php foreach ($user as $u): ?>
					<p>
						<kbd><?php echo $u['label'];?></kbd>
						<?php echo form_input($u['key'], $u['value']);?>
					</p>
				<?php endforeach; ?>

				<br />
				<p><?php echo form_button($button_submit);?></p>
			<?php echo form_close();?>
		</div>
	<?php endif; ?>

	<div id="mibbit">
		<?php echo form_open('site/settings/4');?>
			<?php echo text_output($label['header_chat'], 'h2', 'page-subhead');?>

			<div class="indent-left">
				<p>
					<kbd><?php echo $label['mserver_name'];?></kbd>
					<?php echo form_input($mchat['server_name']);?>
				</p>
				<p>
					<kbd><?php echo $label['mserver_address'];?></kbd>
					<?php echo form_input($mchat['server_address']);?>
				</p>
				<p>
					<kbd><?php echo $label['mserver_channel'];?></kbd>
					<?php echo form_input($mchat['server_channel']);?>
				</p>
				<p>
					<kbd><?php echo $label['mserver_guest'];?></kbd>
					<?php echo form_input($mchat['server_guest']);?>
				</p>
				<p>
					<kbd><?php echo $label['mserver_widget'];?></kbd>
					<?php echo form_input($mchat['server_widget']);?>
				</p>
				<p>
					<kbd><?php echo $label['mserver_stats_url'];?></kbd>
					<?php echo form_input($mchat['server_stats_url']);?>
				</p>
				<p>
					<kbd><?php echo $label['mserver_height'];?></kbd>
					<?php echo form_input($mchat['server_height']);?>
				</p>
				<p>
					<kbd><?php echo $label['mserver_width'];?></kbd>
					<?php echo form_input($mchat['server_width']);?>
				</p>
			</div>

			<br />
			<p><?php echo form_button($button_submit_mibbit);?></p>
		<?php echo form_close();?>
	</div>
</div>