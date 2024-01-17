<?php
	$class = $block['className'] ?? null;
	$images = get_field('images') ?: [];
	$style = get_field('style');
	$carousel = ($style=='carousel') ? 'alt-flickity' : null;
	$size = ($style=='carousel') ? 'extra_large' : 'medium_large';
	$num_cols = get_field('num_cols') ?: min(4, count($images));
?>



<div class="GALLERY <?=$class?>" data-style="<?=$style?>" <?=empty($images) ? 'data-empty' : null?>>
	<div class="b-columns <?=$carousel?>">
		<?php foreach ($images as $image): ?>
			<div class="b-column" data-width="1/<?=$num_cols?>">
				<div class="container">
					<div class="image">
						<?=image(['id' => $image, 'ratio' => '4/3', 'size' => $size])?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
