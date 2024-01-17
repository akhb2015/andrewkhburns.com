<?php
	$class = $block['className'] ?? null;
	$post =  get_field('post') ?: reset(get_posts(['post_type' => 'resource', 'posts_per_page' => 1, 'tax_query' => ['relation' => 'AND', [
		'taxonomy' => 'resource_type',
		'field' => 'slug',
		'terms' => 'case-study',
		'operator' => 'IN',
	]]]))->ID;

	$title =  get_field('title') ?: get_the_title($post);
	
	if(get_field('image')){
		$image =  get_field('image');
	} else {
		if(get_post_thumbnail_id($post)){
			$image = get_post_thumbnail_id($post);
		} else {
			$image = get_post_thumbnail_id(4501);
		}
	}
	
	$style = get_field('style');

	$GLOBALS['excluded_posts'][] = $post;
	$target = get_field('url', $post) ? 'target="_blank"' : null;
	$taxonomy = get_post_type() == 'post' ? 'category' : 'resource_type';
	$taxonomy = array_map(fn($v) => $v->name, get_the_terms($post, $taxonomy) ?: []);
?>



<div class="CASESTUDY <?=$class?>" data-style="<?=$style?>">
	<div class="b-columns alt-middle">
		<div class="b-column" data-width="5">
			<div class="content">
				<div class="meta">
					<?php if (!empty($taxonomy)): ?>
						<div class="taxonomy"><?=implode(', ', $taxonomy)?></div>
					<?php endif ?>
				</div>
				<h4><a href="<?=get_the_permalink($post)?>" <?=$target?>><?=$title?></a></h4>
			</div>
			<div class="buttons">
				<span class="b-button alt-text alt-arrow" role="button" tabindex="0"><?=get_theme_option('misc_labels', 'read')?></span>
			</div>
		</div>
		<div class="b-column" data-width="7">
			<div class="image">
				<?=image(['id' => $image, 'ratio' => '16/9', 'size' => 'large'])?>
			</div>
		</div>
	</div>
</div>

