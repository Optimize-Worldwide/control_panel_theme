<section id="tasks" class="card m-all t-1of2 d-1of3">
	<h2>Tasks</h2>
	<?php
	$tasks = get_post_meta($post->ID,'_tasks',true);
	?>
		<ul>
	<?php if($tasks):?>
		<?php foreach($tasks as $task_name => $task_stamps): ?>
			<li class="accordion task">
				<header>
					<h3><?php echo htmlspecialchars_decode($task_name, ENT_QUOTES); ?></h3>
				</header>
				<main>
				<?php
					$stamp_log = array();
					if($task_stamps):?>
						<ul class="users"><?php
						foreach($task_stamps as $stamp => $user) $stamp_log[$user][] = $stamp;$current_user_has_worked_on_task = false;
						foreach($stamp_log as $user => $stamps):$userdata = get_userdata($user);?>
							<li data-user="<?php echo $userdata->ID; ?>">
							<?php if($user == get_current_user_id()) $current_user_has_worked_on_task = true;
								$number_of_stamps = count($stamps);?>
								<h4><?php echo $userdata->first_name;?><?php if($number_of_stamps % 2 != 0):$last_stamp = end($stamps);?><small> started working at <?php echo date('H:i',$last_stamp); ?></small><?php endif; ?></h4>
								<ul class="stamps">
								<?php
									$i=0;
									$start = 0;
									$end = 0;
									$duration = 0;
									foreach($stamps as $id => $timestamp):
										if($i % 2 == 0):
											$start = $timestamp;
										else:
											$end = $timestamp;
											$duration = $end - $start;
											$duration = $duration/60;
											echo "<li class='duration'>".round($duration,2)." minutes on ".date('m-j')."<time>".date('H:i',$start)." to ".date('H:i',$end)."</time></li>";
										endif;
										$i++;
										if($i == $number_of_stamps and $user == get_current_user_id()):
											if($i % 2 != 0):
												?><button class="stop">Stop Working</button><?php
											else:
												?><button class="start">Start Working</button><?php
											endif;
										endif;
									endforeach;?>
								</ul>
							</li><?php
						endforeach;
						?></ul><?php
						if($current_user_has_worked_on_task != true):?>
							<button class="start">Start Working</button>
						<?php endif;
					else:?>
						<button class="start">Start Working</button>
					<?php endif;	?>
				</main>
			</li>
		<?php endforeach; ?>
	<?php endif; ?>
		</ul>
	<button class="create-task">Create Task</button>
</section>