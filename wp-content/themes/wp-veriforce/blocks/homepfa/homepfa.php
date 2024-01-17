<?php
	$class = $block['className'] ?? null;
	$images = get_field('images');
	$content = get_field('content');
?>



<section class="b-section HOMEPFA <?=$class?>">
	<div class="b-frame">
		<div class="b-columns alt-middle">
			<div class="b-column" data-width="6">
				<div class="content b-text-large">
					<?=$content?>
				</div>
			</div>
			<div class="b-column" data-width="6">
				<div class="images alt-flickity">
					<?php foreach($images as $image): ?>
						<div class="image">
							<?=image(['id' => $image, 'size' => 'large', 'ratio'=> '58/75', 'loading' => 'eager'])?>
						</div>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
