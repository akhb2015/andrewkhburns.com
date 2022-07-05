<?php
/**
 * Video modal window
 *
 * @author      Andy Burns
 * @copyright   2021, ON1
 */
?>


<!-- modal video player-->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">

				<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="fas fa-times-circle"></i>
				</button>-->

				<!-- 16:9 aspect ratio -->
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
				</div>

			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>