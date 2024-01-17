<?php
	$acf_blocks = get_acf_blocks();
	$disallowed_blocks = ['acf/section', 'acf/pfa', 'acf/cta'];
	$allowed_blocks = array_values(array_diff($acf_blocks, $disallowed_blocks));

	$class = $block['className'] ?? null;
	$id = get_field('alternateid') ? 'id="'.get_field('alternateid').'"' : null;
	$style = get_field('style');
	$bg_color = get_field('bg_color');
	$inner_bg_color = get_field('inner_bg_color');

	$bg_left_deco = get_field('bg_left_deco') ? 'data-bg-left-deco="'.get_field('bg_left_deco').'"' : '';
	$bg_right_deco = get_field('bg_right_deco') ? 'data-bg-right-deco="'.get_field('bg_right_deco').'"' : '';

	$notoppadding = get_field('notoppadding') ? 'notoppadding' : '';
	$nobottompadding = get_field('nobottompadding') ? 'nobottompadding' : '';
	
	$inverted = ($bg_color == 'dark-blue' || $inner_bg_color == 'dark-blue') ? 'true' : 'false';

	$page_id = ( get_the_ID() );
	$slug = get_page_template_slug( $page_id );

	$section_style = '';
	$frame_style = '';

	if( isset( $slug ) && $slug == 'landing-page-template.php' ) {
		$section_style = 'landing-section-style';
		$frame_style = 'landing-frame-style';
	}

?>

<section class="b-section <?=$class?> <?=$notoppadding?> <?=$nobottompadding?> <?=$section_style?>" data-inverted="<?=$inverted?>"  data-style="<?=$style?>" data-bg-color="<?=$bg_color?>" data-inner-bg-color="<?=$inner_bg_color?>" <?=$bg_left_deco?> <?=$bg_right_deco?> <?=$id?> >

	<div class="b-frame <?=$frame_style?>" >
		<?php if( isset( $slug ) && $slug == 'landing-page-template.php' ): ?>
			<img class="header-logo-landing" src="<?=get_template_directory_uri()?>/assets/images/veriforce-dark.svg" alt="Veriforce" style="width:140rem; height: 50rem;">
		<?php endif; ?>
		<InnerBlocks allowedBlocks="<?=esc_attr(wp_json_encode($allowed_blocks))?>" />
	</div>

</section>
