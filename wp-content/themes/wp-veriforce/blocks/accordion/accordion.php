<?php
	$class = $block['className'] ?? null;
	$rows = get_field('rows') ?: [];
	$style = get_field('style');
	$singular = get_field('singular') || $style == 'image';
?>



<div class="ACCORDION <?=$class?>" data-style="<?=$style?>" <?=empty($rows) ? 'data-empty' : null?>>
	<div class="rows <?=$singular ? 'alt-singular' : null?>">
		<?php foreach ($rows as $i => $row): ?>
			<div class="row <?=$singular && $i == 0 ? 'alt-active' : '' ?>">
				<div class="heading">
					<h4><?=$row['heading']?></h4>
					<button class="toggle">Expand</button>
				</div>
				<div class="container">
					<div class="content">
						<?=$row['content']?>
					</div>
					<?php if ($row['image']): ?>
						<div class="image">
							<?=image(['id' => $row['image'], 'size' => 'medium_large', 'ratio' => '4/3'])?>
						</div>
					<?php endif ?>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>
