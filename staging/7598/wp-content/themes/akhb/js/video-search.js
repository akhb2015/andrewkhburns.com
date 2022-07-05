/**
 * Javascript for video modal
 *
 * @author      Andy Burns
 * @copyright   2021
 */

var $=jQuery.noConflict();

$(document).ready(function() {

  $('#videoModal').on('hidden.bs.modal', function () {
      const $modal = $(this);
      delete videoid;

    //stop video when modal is closed
    $("#video").attr("src", "");

    //remove the bs.modal data attribute from it
    $(this).removeData('bs.modal');
    
  });

  $('#videoModal').on('show.bs.modal', function(e) {
        const $modal = $(this);
        delete videoid;
        videoid = e.relatedTarget.dataset.videoid;

        $modal.find('.embed-responsive-item').attr('src', 'https://www.youtube.com/embed/' + videoid + '/?autoplay=1');
    });
});
