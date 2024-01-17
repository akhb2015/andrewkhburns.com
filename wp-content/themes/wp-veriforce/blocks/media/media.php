<?php
	$class = $block['className'] ?? null;
	$media_type = get_field('media_type');
	$image = get_field('image');
	$video = get_field('video');
	$oembed = get_field('oembed');
	$style = get_field('style');
	$width = get_field('width');
	$image_size = $width == 'narrow' ? 'large' : 'extra_large';
?>



<div class="MEDIA <?=$class?>" data-style="<?=$style?>" data-width="<?=$width?>" <?=!$image && !$video && !$oembed ? 'data-empty' : null?>>
	<div class="container">
		<?php if ($media_type == 'oembed'): 

				$iframe = $oembed['url'];
				preg_match('/src="(.+?)"/', $iframe, $matches);
				$src = $matches[1];
				$params = ['autoplay' => 1];
				$new_src = add_query_arg($params, $src);
				$iframe = str_replace($src, $new_src, $iframe);
				$iframe = str_replace('src', 'data-src', $iframe);
				$ratio = $oembed['ratio'] ?: '16/9';
			?>
			<div class="oembed" style="aspect-ratio: <?=$ratio?>;">
				<?php if ($oembed['inline']): ?>
					<button class="oembed-image" data-iframe="media-<?=$block['id']?>">
						<?=image(['id' => $oembed['image'], 'size' => $image_size, 'fit' => 'contain'])?>
					</button>
					<div id="media-<?=$block['id']?>" style="display:none;">
						<?=$iframe?>
					</div>
				<?php else: ?>
					<button class="oembed-image" data-modal="media-<?=$block['id']?>">
						<?=image(['id' => $oembed['image'], 'size' => $image_size, 'ratio' => $ratio])?>
					</button>
					<div id="media-<?=$block['id']?>" style="display:none;">
						<div class="MEDIA-MODAL">
							<div class="content" style="aspect-ratio: <?=$ratio?>;">
								<?=$iframe?>
							</div>
						</div>
					</div>
				<?php endif ?>
			</div>			

		<?php else: ?>

			<?php if(wp_check_filetype($image['url'])['ext'] === "gif"){ ?>
				<div class="image alt-gif">
					<img src="<?=$image['url']?>"/>
				</div>
			<?php } else { ?>
				<div class="image"><?=image(['id' => $image['id'], 'size' => $image_size])?></div>
			<?php } ?>
			
		<?php endif; ?>
	</div>
</div>
