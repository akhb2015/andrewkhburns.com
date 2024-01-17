<?php
	$class = $block['className'] ?? null;
	$image = get_field('image');
	$content = get_field('content');
	$style = get_field('style');
?>



<section class="b-section CTA <?=$class?>" data-style="<?=$style?>" data-inverted="true">
	<div class="b-frame">
		<div class="b-columns alt-middle">
			<div class="b-column" data-width="7">
				<div class="image">
					<?=image(['id' => $image, 'size' => 'large', 'ratio'=> '320/413'])?>
				</div>
			</div>
			<div class="b-column" data-width="5">
				<div class="content">
					<?=$content?>
				</div>
			</div>
		</div>
	</div>
</section>
