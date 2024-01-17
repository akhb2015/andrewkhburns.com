	</main>

	<footer class="b-page-foot">
		<div class="FOOTER">
			<div class="b-frame" style="padding:20rem 32rem">
				<div class="b-columns">
					<div class="b-column" data-width="6">
						<img src="<?=get_template_directory_uri()?>/assets/images/veriforce-dark.svg" alt="Veriforce" style="width:140rem; height: 50rem;">
					</div>
					<div class="b-column" data-width="6">
						<p style="padding-top:16px;font-size:14rem;color:#636569">&copy; Copyright <?php echo date('Y'); ?> Veriforce. All Rights Reserved.</p>
					</div>
				</div>

			</div>

		</div>
	</footer>

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
