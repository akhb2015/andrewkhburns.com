<?php
	$class = $block['className'] ?? null;
	$image = get_field('image');
	$oembed = get_field('oembed');
	$content = get_field('content');
	$callouts = get_field('callouts');
	$left_icons = get_field('left_icons') ? 'left-icons' : '';
	$style = get_field('style');
	$media_type = get_field('media_type');
	$media_width = get_field('media_width');
	$reverse = get_field('reverse');

	if($style != 'callouts' && empty($content)){
		$empty = 'data-empty';
	} else {
		$empty = null;
	}
?>



<div class="ROW <?=$class?>" data-style="<?=$style?>" data-media="<?=$media_type?>" <?=$reverse ? 'data-reverse' : null?> <?=$empty?>>
	<div class="row">
		<div class="b-columns alt-middle alt-loose">
			<div class="b-column" data-width="<?=$media_width?>">
				<?php if ($media_type == 'oembed'): 
					$iframe = $oembed;
					preg_match('/src="(.+?)"/', $iframe, $matches);
					$src = $matches[1];
					$params = ['controls' => 1, 'autoplay' => 1];
					$new_src = add_query_arg($params, $src);
					$iframe = str_replace($src, $new_src, $iframe);
					$iframe = str_replace('src', 'data-src', $iframe);
				?>
				<button class="oembed-image" data-modal="media-<?=$block['id']?>">
					<?=image(['id' => $image, 'ratio' => 1, 'size' => $media_width > 5 ? 'large' : 'medium_large'])?>
				</button>
				<div id="media-<?=$block['id']?>" style="display:none;">
					<div class="MEDIA-MODAL">
						<div class="content">
							<?=$iframe?>
						</div>
					</div>
				</div>
				<?php else: ?>
				<div class="image">
					<?=image(['id' => $image, 'size' => $media_width > 6 ? 'large' : 'medium_large'])?>
				</div>
				<?php endif; ?>
			</div>
			<div class="b-column" data-width="<?=12-$media_width?>">
				<?php if($content): ?>
				<div class="content">
					<?=$content?>
				</div>
				<?php endif; ?>
				<?php if($style == 'callouts'): ?>
				<div class="callouts <?=$left_icons?>">
					<?php foreach($callouts as $callout): ?>
					<div class="callout">
						<div class="callout-image" data-animate>
							<?=image(['id' => $callout['icon'], 'size' => 'small', 'ratio' => '1/1'])?>
						</div>
						<div class="callout-content">
							<?=$callout['content']?>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
