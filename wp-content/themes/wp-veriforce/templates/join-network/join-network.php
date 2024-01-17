<?php
	/* Template Name: Join our Network */
	get_header();
	$clients = get_posts(['post_type' => 'client', 'posts_per_page' => -1, 'orderby' => 'name', 'order' => 'ASC']);
?>




<section class="b-section JOIN-NETWORK" data-bg-left-deco="center">
	<div class="b-frame">
		<ul class="clients">
			<?php foreach ($clients as $client): ?>
				<?php $product = array_map(fn($v) => $v->name, get_the_terms($client->ID, 'client_product') ?: []) ?>
				<?php $pricing = array_map(fn($v) => $v->name, get_the_terms($client->ID, 'client_pricing') ?: []) ?>
				<li data-name="<?=$client->post_title?>" data-product="<?=implode(', ', $product)?>" data-pricing="<?=implode(', ', $pricing)?>">
					<?=$client->post_title?>
				</li>
			<?php endforeach ?>
		</ul>

		<div class="b-columns alt-loose">
			<div class="b-column" data-width="1/2">
				<?=get_field('heading')?>
			</div>
			<div class="b-column" data-width="1/2">
				<div class="by-hiring-client">
					<?php $hiring_client = get_field('hiring_client') ?>
					<div class="head">
						<?=$hiring_client['heading']?>
					</div>
					<div class="form">
						<?=gravity_form(9, false, false, false)?>
					</div>
					<div class="foot">
						<?=$hiring_client['foot']?>
						<button id="by-product" class="b-button alt-text alt-underlined alt-arrow"><?=$hiring_client['label']?></button>
					</div>
				</div>

				<div class="by-product">
					<?php $product = get_field('product') ?>
					<div class="head">
						<?=$product['heading']?>
					</div>
					<div class="form">
						<label for="product"><?=$product['label']?></label>
						<select id="product" class="b-select">
							<?php foreach ($product['options'] as $option): ?>
								<?php if (!$option['url']): ?>
									<option disabled selected><?=$option['text']?></option>
								<?php else: ?>
									<option value="<?=$option['url']?>"><?=$option['text']?></option>
								<?php endif ?>
							<?php endforeach ?>
						</select>
						<div class="error"><?=$product['error_label']?></div>
						<button class="b-button"><?=$product['continue_label']?></button>
					</div>
					<div class="foot">
						<?=$product['foot']?>
						<button id="by-hiring-client" class="b-button alt-text alt-underlined alt-arrow"><?=$product['toggle_label']?></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<?php get_footer(); ?>
