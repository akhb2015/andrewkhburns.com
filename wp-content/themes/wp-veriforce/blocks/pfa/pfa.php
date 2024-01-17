<?php
	$class = $block['className'] ?? null;
	$image = get_field('image');
	$content = get_field('content');
?>



<section class="b-section PFA <?=$class?>">
	<div class="b-frame">
		<div class="b-columns alt-middle">
			<div class="b-column" data-width="6">
				<div class="content b-text-large">
					<?=$content?>
				</div>
			</div>
			<div class="b-column" data-width="6">
				<div class="image">
					<?=image(['id' => $image, 'size' => 'medium_large', 'fit' => 'contain', 'loading' => 'eager'])?>
				</div>
			</div>
		</div>
	</div>
</section>
