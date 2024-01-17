<?php
	$class = $block['className'] ?? null;
	$logos = get_field('logos') ?: [];
	$style = get_field('style');
	$carousel = get_field('style') == 'carousel' ? 'alt-flickity' : null;
	$hassecondrow = get_field('hassecondrow') ? 'hassecondrow' : '';
?>



<div class="LOGOS <?=$class?> <?=$hassecondrow?>" data-style="<?=$style?>" <?=empty($logos) ? 'data-empty' : null?>>
	<?php if ($style == 'marquee'): ?>
		<div class="breakout">
			<div class="slide">
				<div class="wrapper">
					<div class="items">
						<?php foreach ($logos as $logo): ?>
							<div class="item">
								<div class="image">
									<?=image(['id' => $logo, 'ratio' => '2.22/1', 'size' => 'small', 'fit' => 'contain', 'loading' => 'eager'])?>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
		
	<?php else: ?>

		<div class="container">
			<div class="b-columns alt-center alt-middle <?=$carousel?>">
				<?php foreach ($logos as $logo): ?>
					<div class="b-column" data-width="2">
						<div class="image">
							<?=image(['id' => $logo, 'ratio' => '2.22/1', 'size' => 'small', 'fit' => 'contain'])?>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>

	<?php endif ?>
</div>
