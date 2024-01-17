<?php
	$class = $block['className'] ?? null;
	$included = get_field('posts') ?: [];
	$excluded = $GLOBALS['excluded_posts'];
	$query = get_field('query');
	$style = get_field('style');
	$alm = get_field('alm') && function_exists('alm_render') && !$is_preview;
	$primary = get_field('primary_posts_block');
	$display_filter = get_field('display_filter') && $primary;
	$num_posts = get_field('num_posts') ?: count($included);
	$queried_obeject = get_queried_object();

	$custom_taxonomies = [
		'resource_category' => null,
		'resource_industry' => null,
		'resource_type' => null,
	];



	$posts_query = [
		'post_type' => $query && $query['post_type'] ? $query['post_type'] : ['post', 'resource', 'course'],
		'posts_per_page' => $num_posts ?: get_option('posts_per_page'),
		'post__in' => $included ?: null,
		'post__not_in' => $excluded ?: null,
		'orderby' => $included ? 'post__in' : null,
		's' => $query['search'] ?? get_search_query(),
		'category_name' => $query['category']->slug ?? null,
	];

	foreach ($custom_taxonomies as $key => $value) {
		$custom_taxonomies[$key] = $query[$key]->slug ?? null;
	}



	if ($primary) {
		$posts_query = array_merge($posts_query, [
			'paged' => get_query_var('paged'),
			's' => $_GET['_search'] ?? $posts_query['s'],
			'category_name' => $_GET['_category'] ?? $posts_query['category_name'],
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



	if ($posts_query['post_type'] == 'course') {
		$posts_query['order'] = 'ASC';
		$posts_query['orderby'] = 'title';
		$posts_query['posts_per_page'] = 30;
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
			'category' => $posts_query['category_name'],
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

		$alm_query = array_merge($alm_options, $posts_query);
	}
?>



<div class="POSTS <?=$class?>" data-style="<?=$style?>" data-filter="<?=$display_filter ? 'true' : 'false'?>">
	<?php if ($display_filter): ?>
		<div class="filter">
			<form id="results" action="<?=get_page_path()?>#results" <?=$alm ? 'data-alm' : null?>>
				<?php if ($alm): ?>
					<input type="hidden" name="_target" value="<?=$block['id']?>-form">
				<?php endif ?>

				<div class="b-columns">
					<?php $categories = get_categories(); ?>
					<?php if ($categories && (!$posts_query['post_type'] || $posts_query['post_type'] == 'post') && !is_category()): ?>
						<div class="b-column" data-width="1/4">
							<label>
								<span><?=get_theme_option('misc_labels', 'category')?></span>
								<select class="b-select" name="_category" role="switch" aria-label="Categories">
									<option value=""><?=get_theme_option('misc_labels', 'all_categories')?></option>
									<?php foreach ($categories as $category): ?>
										<option value="<?=$category->slug?>" <?=$posts_query['category_name'] == $category->slug ? 'selected' : null?>>
											<?=$category->name?></option>
									<?php endforeach ?>
								</select>
							</label>
						</div>
					<?php endif ?>

					<?php foreach ($custom_taxonomies as $key => $value): ?>
						<?php $terms = get_terms(['taxonomy' => $key]); ?>
						<?php $labels = match(get_taxonomy($key)->label){
							'Categories' => [get_theme_option('misc_labels', 'category'), get_theme_option('misc_labels', 'all_categories')],
							'Industries' => [get_theme_option('misc_labels', 'industry'), get_theme_option('misc_labels', 'all_industries')],
							'Types' => [get_theme_option('misc_labels', 'type'), get_theme_option('misc_labels', 'all_types')],
							default => [null, null],
						} ?>
						<?php $show = $terms && !is_tax($key) && $posts_query['post_type'] == 'resource' && ($key == 'resource_type' || $key == 'resource_industry' || $key == 'resource_category') ?>
						<?php
							$case_studies_page = apply_filters('wpml_object_id', 4594, 'page', true);
							if (is_page($case_studies_page) && $key == 'resource_type') $show = false;
						?>
						<div class="b-column <?=!$show ? 'b-hidden' : null?>" data-width="1/4">
							<label>
								<span><?=$labels[0]?></span>
								<select class="b-select" name="__<?=$key?>" role="switch" aria-label="Types">
									<option value=""><?=$labels[1]?></option>
									<?php foreach ($terms as $term): ?>
										<option value="<?=$term->slug?>" <?=$value == $term->slug ? 'selected' : null?>>
											<?=$term->parent ? '-' : null?> <?=$term->name?></option>
									<?php endforeach ?>
								</select>
							</label>
						</div>
					<?php endforeach ?>

					<div class="b-column" data-width="1/4">
						<div class="search">
							<label>
								<span>&nbsp;</span>
								<input class="b-input" type="text" name="_search" placeholder="<?=get_theme_option('misc_labels', 'search')?>" value="<?=$posts_query['s']?>" autocomplete="off" role="search" aria-label="search input">
							</label>
							<input type="submit" id="addButton" value="Add" style="display: none;">
						</div>
					</div>
				</div>
			</form>
		</div>
	<?php endif ?>

	<?php if ($alm): ?>
		<div class="posts <?=!$primary ? 'alt-hide-button' : null?>">
			<?php alm_render($alm_query) ?>
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
									<?php if($post_type == 'course'): ?>
										<span class="b-button alt-text" role="button" tabindex="0"><?=get_theme_option('misc_labels', 'learn')?><svg viewBox="0 0 24 12" style="width:24rem; height:12rem;"><path d="M19.5147 5.00007L16.2929 1.77823L17.7071 0.364014L23.4142 6.07111L17.7071 11.7782L16.2929 10.364L19.6568 7.00007L0 7.00008V5.00008L19.5147 5.00007Z"/></svg></span>
									<?php else: ?>
										<span class="b-button alt-text" role="button" tabindex="0"><?=get_theme_option('misc_labels', 'read')?><svg viewBox="0 0 24 12" style="width:24rem; height:12rem;"><path d="M19.5147 5.00007L16.2929 1.77823L17.7071 0.364014L23.4142 6.07111L17.7071 11.7782L16.2929 10.364L19.6568 7.00007L0 7.00008V5.00008L19.5147 5.00007Z"/></svg></span>
									<?php endif ?>
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

		<?php if ($GLOBALS['wp_query']->max_num_pages > 1 && $primary): ?>
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
