<?php
	$class = $block['className'] ?? null;
	$rows = get_field('rows');
	$style = get_field('style');
?>



<div class="VERTICAL-SCROLLER <?=$class?>" data-style="<?=$style?>" data-active="0" <?=empty($rows) ? 'data-empty' : null?>>
	<div class="fixed">
		<?php foreach ($rows as $row): ?>
			<div class="image">
				<?=image(['id' => $row['image'], 'fit' => 'contain', 'size' => 'large'])?>
			</div>
		<?php endforeach ?>
	</div>

	<div class="rows">
		<?php foreach ($rows as $row): ?>
			<div class="row">
				<div class="image">
					<?=image(['id' => $row['image'], 'fit' => 'contain', 'size' => 'medium'])?>
				</div>
				<div class="content">
					<?=$row['content']?>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>
