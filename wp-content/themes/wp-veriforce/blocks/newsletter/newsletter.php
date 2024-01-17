<?php
	$class = $block['className'] ?? null;
	$content = get_field('content');
	$image = get_field('image');
	$style = get_field('style');
	$is_hidden = apply_filters('wpml_current_language', null) != 'en';
?>



<div class="NEWSLETTER <?=$class?>" data-hidden="<?=$is_hidden ? 'true' : 'false'?>">
	<div class="b-columns">
		<div class="b-column" data-width="6">
			<div class="content">
				<?=$content?>
			</div>
			<div class="image">
				<?=image(['id' => $image, 'ratio' => '3/2.5', 'size' => 'large', 'fit' => 'cover',])?>
			</div>
		</div>
		<div class="b-column" data-width="6">
			<div class="form">
				<!-- <iframe src="https://go.veriforce.com/l/961922/2023-08-31/5qwn8k" loading="lazy" style="height: 701px;"></iframe> -->
				<iframe src="https://go.veriforce.com/l/961922/2022-02-18/ynr" loading="lazy" style="height: 701px;"></iframe>
			</div>
		</div>
	</div>
</div>
