<?php
	$class = $block['className'] ?? null;
	$solutions = get_field('solutions') ?: [];
	$n = count($solutions); 
	$image_size = ($n == 3) ? 'medium' : 'medium_large';
?>



<div class="SOLUTIONS <?=$class?>" <?=empty($solutions) ? 'data-empty' : null?>>
	<div class="b-columns">
		<?php foreach ($solutions as $solution): ?>
			<div class="b-column" data-width="1/<?=$n?>" data-animate>
				<a href="<?=$solution['link']['url']?>">
					<div class="container">
						<div class="image">
							<?=image(['id' => $solution['image'], 'ratio' => '1/1', 'size' => $image_size])?>
						</div>
						<?php if ($solution['link']): ?>
							<div class="link">
								<span class="b-button alt-text alt-arrow"><?=$solution['link']['title']?></span>
							</div>
						<?php endif ?>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>
