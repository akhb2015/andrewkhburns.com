<?php
	$class = $block['className'] ?? null;
	$testimonials = get_field('testimonials') ?: [];
	$style = get_field('style');
?>



<div class="TESTIMONIALS <?=$class?>" data-style="<?=$style?>" <?=empty($testimonials) ? 'data-empty' : null?>>
	<div class="b-columns <?=(count($testimonials) > 1) ? 'alt-flickity' : '' ?>">
		<?php foreach ($testimonials as $testimonial): ?>
			<div class="b-column" data-width="12">
				<div class="testimonial">
					<div class="deco"></div>
					<div class="content">
						<p><?=$testimonial['content']?></p>
					</div>
					<div class="name-container">
						<p class="name">
							<strong><?=$testimonial['name']?></strong>
							
							<?php if($testimonial['role']): ?>
							<br><strong><?=$testimonial['role']?></strong>
							<?php endif; ?>
							
							<?php if($testimonial['company']): ?>
							<br><?=$testimonial['company']?>
							<?php endif; ?>
						</p>
					</div>
					<?php if($testimonial['image']): ?>
						<div class="image">
							<?=image(['id' => $testimonial['image'], 'size' => 'medium'])?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>


