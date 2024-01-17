<?php
	$class = $block['className'] ?? null;
	$tabs = get_field('tabs') ?: [];
	$style = get_field('style');
?>


<?php if($style != 'style2'){ ?>

<div class="TABS <?=$class?>" data-style="<?=$style?>" <?=empty($tabs) ? 'data-empty' : null?>>
	<div class="b-columns alt-loose alt-middle">
		<div class="b-column" data-width="6">
			<div class="nav">
				<?php foreach ($tabs as $tab): ?>
					<button>
						<?=$tab['heading']?>
					</button>
				<?php endforeach; ?>
			</div>
			<div class="contents">
				<?php foreach ($tabs as $tab): ?>
					<div class="content">
						<?=$tab['content']?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="b-column" data-width="6">
			<div class="images">
				<?php foreach ($tabs as $tab): ?>
					<div class="image">
						<?=image(['id' => $tab['image'], 'size' => 'medium_large'])?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

<?php } else { ?>

<div class="TABS2 <?=$class?>" data-style="<?=$style?>" <?=empty($tabs) ? 'data-empty' : null?>>
	<div class="nav">
		<?php foreach ($tabs as $tab): ?>
			<button>
				<?=$tab['heading']?>
			</button>
		<?php endforeach; ?>
	</div>
	<div class="tabs">
	<?php foreach ($tabs as $tab): ?>
		<div class="tab">
			<div class="b-columns alt-loose">
				<?php foreach ($tab['callouts'] as $callout): ?>
				<div class="b-column" data-width="6">
					<div class="container">
						<div class="image" data-animate>
							<?=image(['id' => $callout['icon'], 'size' => 'medium'])?>
						</div>
						<div class="content">
							<?=$callout['content']?>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
</div>

<?php } ?>


