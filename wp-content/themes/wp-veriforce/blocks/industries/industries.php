<?php
	$class = $block['className'] ?? null;
	$industries = get_field('industries') ?: [];
?>



<div class="INDUSTRIES <?=$class?>" <?=empty($industries) ? 'data-empty' : null?>>
	<div class="b-columns <?=$alts?>">
		<?php foreach ($industries as $industry): ?>
			<div class="b-column" data-width="1/3">
				<div class="container">
					<?php if ($industry['icon']): ?>
						<div class="image">
							<?=image(['id' => $industry['icon'], 'ratio' => '1/1', 'size' => 'small'])?>
						</div>
					<?php endif; ?>
					<div class="content">
						<?=$industry['content']?>
					</div>
					<div class="button">
						<a class="b-button" href="<?=$industry['link']['url']?>"><?=$industry['link']['title']?></a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
