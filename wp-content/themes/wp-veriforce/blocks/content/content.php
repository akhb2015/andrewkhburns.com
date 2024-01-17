<?php
	$class = $block['className'] ?? null;
	$content = get_field('content');
	$style = get_field('style');
	$width = get_field('width');
	$centered = get_field('centered');
?>



<div class="CONTENT <?=$class?>" data-style="<?=$style?>" data-width="<?=$width?>" <?=empty($content) ? 'data-empty' : null?>>
	<div class="container <?=$style == 'heading' ? 'b-text-large' : null?> <?=$centered ? 'alt-centered' : null?>">
		<?=$content?>
	</div>
</div>
