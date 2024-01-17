<?php
	$class = $block['className'] ?? null;
	$heading = get_field('heading');
	$stats = get_field('stats') ?: [];
	$button = get_field('button');
	$num_cols = get_field('num_cols') ?: min(3, count($stats));
?>



<div class="STATS <?=$class?>" <?=empty($stats) ? 'data-empty' : null?>>
	<div class="b-columns alt-loose alt-<?=$num_cols?>-columns">
		<div class="b-column" data-width="5">
			<div class="globe"></div>
		</div>
		<div class="b-column" data-width="7">
			<div class="content">
				<div class="heading">
					<?=$heading?>
				</div>
				<div class="b-columns stats">
					<?php foreach ($stats as $stat): ?>
						<div class="b-column" data-width="1/<?=$num_cols?>">
							<div class="stat">
								<?=$stat['stat']?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<?php if($button): ?>
				<a class="b-button alt-outline alt-arrow" href="<?=$button['url']?>" target="<?=$button['target']?>">
					<?=$button['title']?>
				</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
