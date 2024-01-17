<?php
	$class = $block['className'] ?? null;
	$columns = get_field('columns') ?: [];
	$style = get_field('style');
	$num_cols = get_field('num_cols') ?: min(6, count($columns));
	$alts = 'alt-bottom';
	$centered = get_field('centered') ? 'alt-centered' : '';
	$post = get_field('post') ? 'alt-post' : '';
?>



<div class="COLUMNS <?=$class?>  <?=$post?>" data-style="<?=$style?>" <?=empty($columns) ? 'data-empty' : null?>>
	<div class="b-columns <?=$alts?> <?=$centered?>">
		<?php foreach ($columns as $column): ?>
			<div class="b-column" data-width="1/<?=$num_cols?>">
				<div class="container">
					<?php if ($column['icon']): ?>
						<div class="image" data-animate>
							<?=image(['id' => $column['icon'], 'ratio' => '1/1', 'size' => 'small'])?>
						</div>
					<?php endif ?>
					<div class="content <?=!$column['icon']?'no-img':null?>">
						<?=$column['content']?>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>
