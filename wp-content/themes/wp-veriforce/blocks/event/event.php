<?php
	$class = $block['className'] ?? null;
	$post_id = get_the_ID();
	$content = get_field('content');
	$link = get_field('link');
	$contact_email = get_field('contact_email');
	$style = get_field('style');

	$start_date = DateTime::createFromFormat('Y-m-d H:i:s', get_field('start_date', $post_id, false));
	$end_date = DateTime::createFromFormat('Y-m-d H:i:s', get_field('end_date', $post_id, false));
	$registration_deadline = DateTime::createFromFormat('Y-m-d H:i:s', get_field('registration_deadline', $post_id, false));
	$timezone = get_field('timezone', $post_id);
	$excerpt = get_the_excerpt($post_id);

	$location = match (get_post_type()) {
		'event', => 'event_location',
		'training', => 'training_location',
		default => false,
	};
	$location = array_map(fn($v) => $v->name, get_the_terms(get_the_ID(), $location) ?: []);

	if ($registration_deadline) {
		$now = new DateTime();
		$registration_closed = $registration_deadline < $now;
	} else {
		$registration_closed = false;
	}
?>



<article class="EVENT <?=$class?>" data-style="<?=$style?>" <?=empty($content) ? 'data-empty' : null?>>
	<div class="b-columns">
		<div class="b-column" data-width="6">
			<div class="content">
				<h1><?=get_the_title()?></h1>
				<?=$content?>
			</div>
		</div>
		<div class="b-column" data-width="6">
			<div class="info">
				<h3>Event Information</h3>
				<?=$excerpt ? "<p>{$excerpt}</p>" : null?>
				<?=$contact_email ? "<p><strong>{$contact_email}</strong></p>" : null?>
				<ul>
					<?php if ($start_date): ?>
						<li class="date">
							<?=$start_date->format('F j, Y')?>
							<?=$end_date && $start_date->format('F j, Y') != $end_date->format('F j, Y') ? ' to ' . $end_date->format('F j, Y') : null?>
						</li>
						<?php if ($start_date->format('g:i a') != '12:00 am'): ?>
							<li class="time">
								<?=$start_date->format('g:i a')?>
								<?=$end_date && $start_date->format('g:i a') != $end_date->format('g:i a') ? ' - ' . $end_date->format('g:i a') : null?>
								<?=$timezone?>
							</li>
						<?php endif ?>
					<?php endif ?>
					<li class="location">
						<?=implode(', ', $location)?>
					</li>
				</ul>
				<?php if ($link && !$registration_closed): ?>
					<div class="link">
						<a class="b-button alt-outline alt-arrow" href="<?=$link['url']?>" target="<?=$link['url']?>"><?=$link['title']?></a>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</article>
