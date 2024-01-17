	</main>



	<footer class="b-page-foot">
		<div class="FOOTER">
			<div class="b-frame">
				<div class="b-columns">
					<div class="b-column" data-width="4">
						<a class="logo" href="<?=home_url()?>"><img src="<?=get_template_directory_uri()?>/assets/images/veriforce-dark.svg" alt="Veriforce" style="width:291rem; height: 78rem;"></a>
					</div>
					<div class="b-column" data-width="8">
						<div class="buttons">
							<?php $join_page = apply_filters('wpml_object_id', 3750, 'page', true) ?>
							<a class="b-button alt-outline" href="<?=get_the_permalink($join_page)?>"><?=get_the_title($join_page)?></a>
							<?php $sales_page = apply_filters('wpml_object_id', 3754, 'page', true) ?>
							<a class="b-button" href="<?=get_the_permalink($sales_page)?>"><?=get_the_title($sales_page)?></a>
						</div>
					</div>
					<div class="b-column" data-width="3/5">
						<?php $solutions_page = apply_filters('wpml_object_id', 1409, 'page', true) ?>
						<h5><?=get_the_title($solutions_page)?></h5>
						<div class="groups alt-solutions">
							<?php $solutions_nav_item = apply_filters('wpml_object_id', 4788, 'nav_menu_item', true) ?>
							<?php foreach (build_nav_tree(wp_get_nav_menu_items('footer')) as $item): ?>
								<?php if ($item->ID == $solutions_nav_item): ?>
									<?php foreach ($item->children ?: [] as $child): ?>
										<div class="group">
											<h6><a href="<?=$child->url?>"><?=$child->title?></a></h6>
											<ul>
												<?php foreach ($child->children ?: [] as $grandchild): ?>
													<li><a href="<?=$grandchild->url?>"><?=$grandchild->title?></a></li>
												<?php endforeach ?>
											</ul>
										</div>
									<?php endforeach ?>
								<?php endif ?>
							<?php endforeach ?>
						</div>
					</div>
					<div class="b-column" data-width="2/5">
						<div class="groups">
							<?php $solutions_nav_item = apply_filters('wpml_object_id', 4788, 'nav_menu_item', true) ?>
							<?php foreach (build_nav_tree(wp_get_nav_menu_items('footer')) as $item): ?>
								<?php if ($item->ID != $solutions_nav_item): ?>
									<div class="group">
										<h5><?=$item->title?></h5>
										<ul>
											<?php foreach ($item->children ?: [] as $child): ?>
												<li><a href="<?=$child->url?>" target="<?=$child->target?>"><?=$child->title?></a></li>
											<?php endforeach ?>
										</ul>
									</div>
								<?php endif ?>
							<?php endforeach ?>
						</div>
					</div>
				</div>

				<?php $logos = get_theme_option('misc_labels', 'footer_logos'); if ($logos): ?>
					<div class="b-columns alt-center alt-tight">
						<?php foreach($logos as $logo): ?>
							<div class="b-column" data-width="2">							
								<div class="logos">
									<?=image(['id' => $logo, 'ratio' => '2.22/1', 'size' => 'small', 'fit' => 'contain'])?>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				<?php endif ?>
			</div>

			<div class="bottombar">
				<div class="b-frame">
					<div class="container">
						<div class="copyright">
							©<?=date('Y')?> Veriforce®
						</div>
						<div class="legal">
							<?php $privacy_page = apply_filters('wpml_object_id', 3, 'page', true) ?>
							<a href="<?=get_the_permalink($privacy_page)?>"><?=get_the_title($privacy_page)?></a>
							&nbsp; | &nbsp;
							<?php $subprocessor_page = apply_filters('wpml_object_id', 4894, 'page', true) ?>
							<a href="<?=get_the_permalink($subprocessor_page)?>"><?=get_the_title($subprocessor_page)?></a>
							&nbsp; | &nbsp;
							<?php $eula_page = apply_filters('wpml_object_id', 16430, 'page', true) ?>
							<a href="<?=get_the_permalink($eula_page)?>">EULA</a>
						</div>
						<div class="login">
							<select class="b-language-select" data-select role="switch" aria-label="languages dropdown">
								<?php $languages = apply_filters('wpml_active_languages', null, 'skip_missing=0') ?>
								<?php foreach($languages as $language): ?>
									<option <?=$language['active'] ? 'selected' : null?> value="<?=$language['url']?>"><?=$language['native_name']?></option>
								<?php endforeach ?>
							</select>
							<a href="https://veriforceone.com/identity/Account/Login" taret="_blank"><?=get_theme_option('misc_labels', 'login')?></a>
						</div>
						<div class="social">
							<a href="https://www.linkedin.com/company/veriforce-llc/" target="_blank" aria-label="LinkedIn (opens in a new tab)">
								<span>LinkedIn</span>
								<svg viewBox="0 0 24 24" style="width:24rem; height:24rem;"><path d="M22.2283 0H1.77167C1.30179 0 0.851161 0.186657 0.518909 0.518909C0.186657 0.851161 0 1.30179 0 1.77167V22.2283C0 22.6982 0.186657 23.1488 0.518909 23.4811C0.851161 23.8133 1.30179 24 1.77167 24H22.2283C22.6982 24 23.1488 23.8133 23.4811 23.4811C23.8133 23.1488 24 22.6982 24 22.2283V1.77167C24 1.30179 23.8133 0.851161 23.4811 0.518909C23.1488 0.186657 22.6982 0 22.2283 0ZM7.15333 20.445H3.545V8.98333H7.15333V20.445ZM5.34667 7.395C4.93736 7.3927 4.53792 7.2692 4.19873 7.04009C3.85955 6.81098 3.59584 6.48653 3.44088 6.10769C3.28591 5.72885 3.24665 5.31259 3.32803 4.91145C3.40941 4.51032 3.6078 4.14228 3.89816 3.85378C4.18851 3.56529 4.55781 3.36927 4.95947 3.29046C5.36112 3.21165 5.77711 3.25359 6.15495 3.41099C6.53279 3.56838 6.85554 3.83417 7.08247 4.17481C7.30939 4.51546 7.43032 4.91569 7.43 5.325C7.43386 5.59903 7.38251 5.87104 7.27901 6.1248C7.17551 6.37857 7.02198 6.6089 6.82757 6.80207C6.63316 6.99523 6.40185 7.14728 6.14742 7.24915C5.893 7.35102 5.62067 7.40062 5.34667 7.395ZM20.4533 20.455H16.8467V14.1933C16.8467 12.3467 16.0617 11.7767 15.0483 11.7767C13.9783 11.7767 12.9283 12.5833 12.9283 14.24V20.455H9.32V8.99167H12.79V10.58H12.8367C13.185 9.875 14.405 8.67 16.2667 8.67C18.28 8.67 20.455 9.865 20.455 13.365L20.4533 20.455Z"/></svg>
							</a>
							<a href="https://www.facebook.com/Veriforce" target="_blank" aria-label="Facebook (opens in a new tab)">
								<span>Facebook</span>
								<svg viewBox="0 0 24 24" style="width:24rem; height:24rem;"><path d="M24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 17.9895 4.3882 22.954 10.125 23.8542V15.4688H7.07812V12H10.125V9.35625C10.125 6.34875 11.9166 4.6875 14.6576 4.6875C15.9701 4.6875 17.3438 4.92188 17.3438 4.92188V7.875H15.8306C14.34 7.875 13.875 8.80008 13.875 9.75V12H17.2031L16.6711 15.4688H13.875V23.8542C19.6118 22.954 24 17.9895 24 12Z"/></svg>
							</a>
							<a href="https://twitter.com/Veriforcellc" target="_blank" aria-label="Twitter (opens in a new tab)">
								<span>Twitter</span>
								<svg viewBox="0 0 24 24" style="width:24rem; height:24rem;"><path d="M9.69242 13.5314L2.61924 22H4.29536L10.437 14.6468L15.3423 22H21L13.5822 10.8807L21 2H19.3238L12.8381 9.76522L7.65769 2H2L9.69283 13.5314H9.69242ZM11.9882 10.7827L12.7398 11.8899L18.7198 20.7003H16.1453L11.3193 13.5901L10.5677 12.4828L4.29457 3.24057H6.86913L11.9882 10.7823V10.7827Z"/></svg>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>



<div class="b-nav" style="display:none;">
	<div class="b-nav-overlay"></div>
	<div class="b-nav-content">
		<div class="NAV" data-inverted="true">
			<nav>
				<input id="toggle-nav-0" type="radio" name="toggle-nav-0">
				<ul>
					<?php $solutions_nav_item = apply_filters('wpml_object_id', 4329, 'nav_menu_item', true) ?>
					<?php foreach (build_nav_tree(wp_get_nav_menu_items('primary')) as $item): ?>
						<li>
							<?php if ($item->children): ?>
								<input id="toggle-nav-<?=$item->ID?>" type="checkbox">
								<label class="a" for="toggle-nav-<?=$item->ID?>"><?=$item->title?></label>
								<ul>
									<?php foreach ($item->children as $child): ?>
										<?php if ($item->ID == $solutions_nav_item): ?>
											<li class="solutions">
												<input id="toggle-nav-<?=$item->ID?>-<?=$child->ID?>" type="radio" name="toggle-nav-0">
												<label class="a" for="toggle-nav-<?=$item->ID?>-<?=$child->ID?>">
													<?php $icon = get_field('image', $child->ID) ?>
													<?php if ($icon): ?>
														<span class="icon">
															<?=image(['id' => $icon, 'ratio' => '1/1', 'size' => 'thumbnail', 'contain' => true])?>
														</span>
													<?php endif ?>
													<?=$child->title?>
												</label>



<div class="sub-panel">
	<div class="back">
		<label for="toggle-nav-0"><?=get_theme_option('misc_labels', 'back')?></label>
	</div>
	<div class="container">
		<div class="heading">
			<a href='<?=$child->url?>'>
				<span class="title"><?=$child->title?><svg tabindex="-1" viewBox="0 0 24 12" style="width:24rem; height:12rem;"><path d="M19.5147 5.00007L16.2929 1.77823L17.7071 0.364014L23.4142 6.07111L17.7071 11.7782L16.2929 10.364L19.6568 7.00007L0 7.00008V5.00008L19.5147 5.00007Z"/></svg></span>
				<?php if ($child->description): ?>
					<span class="description"><?=$child->description?></span>
				<?php endif ?>
			</a>
		</div>
		<div class="links">
			<?php foreach ($child->children as $grandchild): ?>
				<?php if ($grandchild->children): ?>
					<?=$grandchild->title != '--' ? "<h6>{$grandchild->title}</h6>" : null?>
					<?php foreach ($grandchild->children as $greatgrandchild): ?>
						<div class="link"><a href="<?=$greatgrandchild->url?>"><?=$greatgrandchild->title?></a></div>
					<?php endforeach ?>
				<?php else: ?>
					<div class="link">
						<a href="<?=$grandchild->url?>">
							<?php $icon = get_field('image', $grandchild->ID) ?>
							<?php if ($icon): ?>
								<span class="icon">
									<?=image(['id' => $icon, 'ratio' => '1/1', 'size' => 'thumbnail', 'contain' => true])?>
								</span>
							<?php endif ?>
							<?=$grandchild->title?>
						</a>
					</div>
				<?php endif ?>
			<?php endforeach ?>
		</div>
	</div>
</div>



											</li>
										<?php else: ?>
											<li><a href="<?=$child->url?>"><?=$child->title?></a></li>
										<?php endif ?>
									<?php endforeach ?>
								</ul>
							<?php else: ?>
								<a href="<?=$item->url?>"><?=$item->title?></a>
							<?php endif ?>
						</li>
					<?php endforeach ?>
					<li>
						<?php $join_page = apply_filters('wpml_object_id', 3750, 'page', true) ?>
						<a class="b-button alt-outline" href="<?=get_the_permalink($join_page)?>"><?=get_the_title($join_page)?></a>
					</li>
					<li>
						<?php $sales_page = apply_filters('wpml_object_id', 3754, 'page', true) ?>
						<a class="b-button" href="<?=get_the_permalink($sales_page)?>"><?=get_the_title($sales_page)?></a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>



<?php wp_footer(); ?>

<!-- Pardot Insights -->
<script>
	piAId = '962922';
	piCId = '2198';
	piHostname = 'go.veriforce.com';

	(function() {
	function async_load(){
	var s = document.createElement('script'); s.type = 'text/javascript';
	s.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + piHostname + '/pd.js';
	var c = document.getElementsByTagName('script')[0]; c.parentNode.insertBefore(s, c);
	}
	if(window.attachEvent) { window.attachEvent('onload', async_load); }
	else { window.addEventListener('load', async_load, false); }
	})();
</script>

</body>
</html>
