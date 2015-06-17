<?php if($colors[0]['color'] !== '#ffffff' or $fonts): ?>
	<section id="style_info" class="card m-all t-1of2 d-1of3">
		<a href="<?php echo get_edit_post_link(); ?>#meta_site_styles" class="edit-link">e</a>
		<h2>Styles</h2>

		<?php if($colors): ?>
			<?php foreach ($colors as $color):
			$colorBrightness = new Color(str_replace("#","",$color['color']));
			if($colorBrightness->isLight()){
				$style = "dark";
			} else {
				$style = "";
			}
				?>
				<span class="color" style="background-color: <?php echo $color['color']; ?>">
					<?php if(isset($color['label'])): ?>
						<span class="label <?php echo $style ?>"><?php echo $color['label']; ?> Color</span>
					<?php endif; ?>
					<span class="hex <?php echo $style ?>"><?php echo $color['color']; ?></span><br>
					<?php if(isset($color['notes']) && $color['notes'] != ''): ?>
						<p class="notes" style="color: <?php echo color_inverse($color['color']); ?>"><?php echo nl2br($color['notes'],true); ?></p>
					<?php endif; ?>
				</span>
			<?php endforeach; ?>
		<?php endif; ?>

		<?php if($fonts): ?>
			<h3 class="section-head">Fonts</h3>
			<?php foreach ($fonts as $font):?>
				<span class="font">
					<h4 class="family"><?php echo $font['font']; ?><small> - <?php echo $font['label']; ?></small></h4>
					<?php if($font['notes'] != ''): ?>
						<p class="notes"><?php echo nl2br($font['notes'],true); ?></p>
					<?php endif; ?>
				</span>
			<?php endforeach; ?>
		<?php endif; ?>
	</section>
<?php else: ?>
	<section id="style_info" class="card m-all t-1of2 d-1of3">
		<h2 class="add-info"><a href="<?php echo get_edit_post_link(); ?>#meta_site_styles">Add Styles</a></h2>
	</section>
<?php endif; ?>