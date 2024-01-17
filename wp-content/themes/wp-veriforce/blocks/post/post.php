<?php
	$GLOBALS['excluded_posts'][] = get_the_ID();

	$class = $block['className'] ?? null;
	$content = get_field('content');
	$style = get_field('style');

	$hide_featured_image = get_field('hide_featured_image', get_the_ID());
	$taxonomy = get_post_type() == 'post' ? 'category' : 'resource_type';
	$taxonomy = array_map(fn($v) => $v->name, get_the_terms(get_the_ID(), $taxonomy) ?: []);
	$excerpt = get_the_excerpt(get_the_ID());
?>



<article class="POST <?=$class?>" data-style="<?=$style?>" <?=empty($content) ? 'data-empty' : null?>>
	<div class="container">
		<div class="share">
			<span>Share:</span>
			<a href="https://www.linkedin.com/cws/share?url=<?=get_the_permalink()?>" target="_blank" aria-label="LinkedIn (opens in a new tab)">
				<span>LinkedIn</span>
				<svg viewBox="0 0 24 24" style="width:24rem; height:24rem;"><path d="M22.2283 0H1.77167C1.30179 0 0.851161 0.186657 0.518909 0.518909C0.186657 0.851161 0 1.30179 0 1.77167V22.2283C0 22.6982 0.186657 23.1488 0.518909 23.4811C0.851161 23.8133 1.30179 24 1.77167 24H22.2283C22.6982 24 23.1488 23.8133 23.4811 23.4811C23.8133 23.1488 24 22.6982 24 22.2283V1.77167C24 1.30179 23.8133 0.851161 23.4811 0.518909C23.1488 0.186657 22.6982 0 22.2283 0ZM7.15333 20.445H3.545V8.98333H7.15333V20.445ZM5.34667 7.395C4.93736 7.3927 4.53792 7.2692 4.19873 7.04009C3.85955 6.81098 3.59584 6.48653 3.44088 6.10769C3.28591 5.72885 3.24665 5.31259 3.32803 4.91145C3.40941 4.51032 3.6078 4.14228 3.89816 3.85378C4.18851 3.56529 4.55781 3.36927 4.95947 3.29046C5.36112 3.21165 5.77711 3.25359 6.15495 3.41099C6.53279 3.56838 6.85554 3.83417 7.08247 4.17481C7.30939 4.51546 7.43032 4.91569 7.43 5.325C7.43386 5.59903 7.38251 5.87104 7.27901 6.1248C7.17551 6.37857 7.02198 6.6089 6.82757 6.80207C6.63316 6.99523 6.40185 7.14728 6.14742 7.24915C5.893 7.35102 5.62067 7.40062 5.34667 7.395ZM20.4533 20.455H16.8467V14.1933C16.8467 12.3467 16.0617 11.7767 15.0483 11.7767C13.9783 11.7767 12.9283 12.5833 12.9283 14.24V20.455H9.32V8.99167H12.79V10.58H12.8367C13.185 9.875 14.405 8.67 16.2667 8.67C18.28 8.67 20.455 9.865 20.455 13.365L20.4533 20.455Z"/></svg>
			</a>
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?=get_the_permalink()?>" target="_blank" aria-label="Facebook (opens in a new tab)">
				<span>Facebook</span>
				<svg viewBox="0 0 24 24" style="width:24rem; height:24rem;"><path d="M24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 17.9895 4.3882 22.954 10.125 23.8542V15.4688H7.07812V12H10.125V9.35625C10.125 6.34875 11.9166 4.6875 14.6576 4.6875C15.9701 4.6875 17.3438 4.92188 17.3438 4.92188V7.875H15.8306C14.34 7.875 13.875 8.80008 13.875 9.75V12H17.2031L16.6711 15.4688H13.875V23.8542C19.6118 22.954 24 17.9895 24 12Z"/></svg>
			</a>
			<a href="https://twitter.com/intent/tweet?text=<?=get_the_permalink()?>" target="_blank" aria-label="Twitter (opens in a new tab)">
				<span>Twitter</span>
				<svg viewBox="0 0 24 24" style="width:24rem; height:24rem;"><path d="M9.69242 13.5314L2.61924 22H4.29536L10.437 14.6468L15.3423 22H21L13.5822 10.8807L21 2H19.3238L12.8381 9.76522L7.65769 2H2L9.69283 13.5314H9.69242ZM11.9882 10.7827L12.7398 11.8899L18.7198 20.7003H16.1453L11.3193 13.5901L10.5677 12.4828L4.29457 3.24057H6.86913L11.9882 10.7823V10.7827Z"/></svg>
			</a>
		</div>

		<div class="meta">
			<?php if (!empty($taxonomy)): ?>
				<div class="taxonomy"><?=implode(', ', $taxonomy)?></div>
			<?php else: ?>
				<div class="taxonomy"><?=ucfirst(get_post_type())?></div>
			<?php endif ?>
			<?php if (get_post_type() == 'post'): ?>
				<div class="date"><?=get_the_date()?></div>
			<?php endif ?>
		</div>

		<div class="title">
			<h1 class="b-h2"><?=get_the_title()?></h1>
			<?=$excerpt ? "<p>{$excerpt}</p>" : null?>
		</div>

		<?php if (has_post_thumbnail() && !$hide_featured_image): ?>
			<div class="image">
				<?php if(get_post_thumbnail_id()):?>
					<?=image(['id' => get_post_thumbnail_id(), 'ratio' => '16/9', 'size' => 'medium_large'])?>
				<?php else: ?>
					<?=image(['id' => get_post_thumbnail_id(4501), 'ratio' => '16/9', 'size' => 'medium_large'])?>
				<?php endif; ?>
			</div>
		<?php endif ?>

		<div class="content">
			<?=$content?>
		</div>
	</div>
</article>



<style>
	.b-page	{overflow: initial;}
</style>
