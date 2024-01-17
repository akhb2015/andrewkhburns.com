<?php
	$class = $block['className'] ?? null;
	$included = get_field('posts') ?: [];
	$excluded = $GLOBALS['excluded_posts'];
	$query = get_field('query');
	$style = get_field('style');
	$alm = get_field('alm') && function_exists('alm_render') && !$is_preview;
	$primary = get_field('primary_events_block');
	$display_filter = get_field('display_filter') && $primary;
	$num_posts = get_field('num_posts') ?: count($included);

	$custom_taxonomies = [
		'event_type' => null,
		'event_location' => null,
		'training_type' => null,
		'training_location' => null,
	];



	$posts_query = [
		'post_type' => $query && $query['post_type'] ? $query['post_type'] : ['event', 'training'],
		'posts_per_page' => $num_posts ?: get_option('posts_per_page'),
		'post__in' => $included ?: null,
		'post__not_in' => $excluded,
		'orderby' => $included ? 'post__in' : null,
		'order' => 'ASC',
		's' => $query['search'] ?? get_search_query(),
	];

	foreach ($custom_taxonomies as $key => $value) {
		$custom_taxonomies[$key] = $query[$key]->slug ?? null;
	}



	if ($primary) {
		$posts_query = array_merge($posts_query, [
			'paged' => get_query_var('paged'),
			's' => $_GET['_search'] ?? $posts_query['s'],
		]);

		foreach ($custom_taxonomies as $key => $value) {
			if (isset($_GET['__'.$key])) $custom_taxonomies[$key] = $_GET['__'.$key];
		}
	}



	foreach ($custom_taxonomies as $key => $value) {
		if ($value) {
			$posts_query['tax_query']['relation'] = 'AND';
			$posts_query['tax_query'][] = [
				'taxonomy' => $key,
				'field' => 'slug',
				'terms' => $value,
				'operator' => 'IN',
			];
		}
	}

	if (!$included) {
		$posts_query['orderby'] = 'meta_value';
		$posts_query['meta_query'][] = [
			'key' => 'start_date',
			'compare' => '>',
			'value' => date('Y-m-d'),
			'type' => 'DATE',
		];
	}



	if ($alm) {
		$alm_options = [
			'id' => $block['id'].'-form',
			'seo' => $primary ? 'true' : 'false',
			'scroll' => 'false',
			'transition' => 'none',
			'button_label' => get_theme_option('misc_labels', 'load'),
			'button_loading_label' => get_theme_option('misc_labels', 'loading'),
		];

		$posts_query = array_merge($posts_query, [
			'post__in' => implode(',', $included),
			'post__not_in' => implode(',', $excluded),
			'search' => $posts_query['s'],
		]);

		if (!empty($posts_query['tax_query'])) {
			array_shift($posts_query['tax_query']);
			$posts_query['taxonomy'] = implode(':', array_map(
				function($element) { return $element['taxonomy']; }, $posts_query['tax_query']));
			$posts_query['taxonomy_terms'] = implode(':', array_map(
				function($element) { return $element['terms']; }, $posts_query['tax_query']));
			$posts_query['taxonomy_operator'] = implode(':', array_map(
				function($element) { return $element['operator']; }, $posts_query['tax_query']));
		}

		if (!empty($posts_query['meta_query'])) {
			$posts_query['meta_key'] = 'start_date';
			$posts_query['meta_compare'] = '>';
			$posts_query['meta_value'] = date('Y-m-d');
			$posts_query['meta_type'] = 'DATE';
		}

		$alm_query = array_merge($alm_options, $posts_query);
	}
?>



<div class="EVENTS <?=$class?>" data-style="<?=$style?>" data-type="<?=$posts_query['post_type']?>" data-filter="<?=$display_filter ? 'true' : 'false'?>">
	<?php if ($display_filter): ?>
		<div class="filter">
			<form id="results" action="<?=get_page_path()?>#results" <?=$alm ? 'data-alm' : null?>>
				<?php if ($alm): ?>
					<input type="hidden" name="_target" value="<?=$block['id']?>-form">
				<?php endif ?>

				<div class="b-columns">
					<?php foreach ($custom_taxonomies as $key => $value): ?>
						<?php $terms = build_term_tree(get_terms(['taxonomy' => $key])); ?>
						<?php $labels = match(get_taxonomy($key)->label){
							'Locations' => [get_theme_option('misc_labels', 'location'), get_theme_option('misc_labels', 'all_locations')],
							'Types' => [get_theme_option('misc_labels', 'type'), get_theme_option('misc_labels', 'all_types')],
							default => [null, null],
						} ?>
						<?php if ($terms && !is_tax($key) &&
							($posts_query['post_type'] == 'event' && ($key == 'event_type' || $key == 'event_location')) ||
							($posts_query['post_type'] == 'training' && ($key == 'training_type' || $key == 'training_location'))
						): ?>
							<div class="b-column" data-width="1/4">
								<label>
									<span><?=$labels[0]?></span>
	
									<select class="b-select" name="__<?=$key?>" role="switch" aria-label="Type">
										<option value=""><?=$labels[1]?></option>
										<?php foreach ($terms as $term): ?>
											<option value="<?=$term->slug?>" <?=$value == $term->slug ? 'selected' : null?>>
												<?=$term->name?>
											</option>
										<?php endforeach ?>
										<?php if ($term->children): ?>
											<?php foreach ($term->children as $term_child): ?>
												<option value="<?=$term_child->slug?>"> - <?= $term_child->name ?> </option>
											<?php endforeach; ?>
										<?php endif; ?>
									</select>
								</label>
							</div>
						<?php endif ?>
					<?php endforeach ?>

					<div class="b-column" data-width="1/4">
						<div class="search">
							<label>
								<span>&nbsp;</span>
								<input class="b-input" type="text" name="_search" placeholder="<?=get_theme_option('misc_labels', 'search')?>" value="<?=$posts_query['s']?>" autocomplete="off">
							</label>
							<input type="submit" id="addButton" value="Add" style="display: none;">
						</div>
					</div>
				</div>
			</form>
		</div>
	<?php endif ?>

	<?php if ($posts_query['post_type'] == 'training'): ?>
		<div class="labels">
			<div class="label">Name</div>
			<div class="label">Description</div>
			<div class="label">Date/Location</div>
		</div>
	<?php endif ?>

	<?php if ($alm): ?>
		<div class="posts <?=!$primary ? 'alt-hide-button' : null?>">
			<?php alm_render($alm_query); ?>
		</div>
	<?php else: ?>
		<?php $GLOBALS['wp_query'] = new WP_Query($posts_query); ?>
		<?php if (have_posts()): ?>

			<div class="posts">
				<div class="b-columns">
					<?php while (have_posts()): the_post(); ?>
						<?php
							$target = get_field('url', get_the_ID()) ? 'target="_blank"' : null;
							$taxonomy = match (get_post_type()) {
								'post', => 'category',
								'resource', => 'resource_type',
								'event', => 'event_type',
								'training', => 'training_type',
								default => false,
							};
							$location = match (get_post_type()) {
								'event', => 'event_location',
								'training', => 'training_location',
								default => false,
							};
							$date = match (get_post_type()) {
								'event', 'training' => DateTime::createFromFormat('Y-m-d H:i:s', get_field('start_date', get_the_ID(), false))->format('F j, Y'),
								default => false,
							};
							$taxonomy = array_map(fn($v) => $v->name, get_the_terms(get_the_ID(), $taxonomy) ?: []);
							$location = array_map(fn($v) => $v->name, get_the_terms(get_the_ID(), $location) ?: []);
							$excerpt = get_the_excerpt();
							$post_type = get_post_type();
						?>
						<div class="b-column" data-width="<?=$num_posts == 2 ? 6 : 4?>">
							<article class="post">
								<div class="image">
									<?php if(get_post_thumbnail_id()):?>
										<?=image(['id' => get_post_thumbnail_id(), 'ratio' => '16/9', 'size' => 'medium'])?>
									<?php else: ?>
										<?=image(['id' => get_post_thumbnail_id(4501), 'ratio' => '16/9', 'size' => 'medium_large'])?>
									<?php endif; ?>
								</div>
								<div class="content">
									<div class="meta">
										<?php if (!empty($taxonomy)): ?>
											<div class="taxonomy"><?=implode(', ', $taxonomy)?></div>
										<?php endif ?>
										<?php if (!empty($location)): ?>
											<div class="location"><?=implode(', ', $location)?></div>
										<?php endif ?>
										<?php if ($date): ?>
											<div class="date"><?=$date?></div>
										<?php endif ?>
									</div>
									<h4><a href="<?=get_the_permalink()?>" <?=$target?>><?=get_the_title()?></a></h4>
									<?=$excerpt ? "<p class='excerpt'>{$excerpt}</p>" : null?>
								</div>
								<div class="buttons">
									<span class="b-button alt-text" role="button" tabindex="0"><?=get_theme_option('misc_labels', 'learn')?><svg viewBox="0 0 24 12" style="width:24rem; height:12rem;"><path d="M19.5147 5.00007L16.2929 1.77823L17.7071 0.364014L23.4142 6.07111L17.7071 11.7782L16.2929 10.364L19.6568 7.00007L0 7.00008V5.00008L19.5147 5.00007Z"/></svg></span>
								</div>
							</article>
						</div>
					<?php endwhile ?>
				</div>
			</div>

		<?php else: ?>
			<div class="empty">
				<?=get_theme_option('misc_labels', 'none')?>
			</div>
		<?php endif ?>

		<?php if ($primary): ?>
			<div class="pagination">
				<?=get_the_posts_pagination([
					'mid_size' => 5,
					'prev_text' => '⇠',
					'next_text' => '⇢'
				])?>
			</div>
		<?php endif ?>

		<?php wp_reset_query() ?>
	<?php endif ?>
</div>
