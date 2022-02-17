/**
 * Javascript to show/hide Movie Form
 *
 * @author      Andy Burns
 * @copyright   2021
 */

var $=jQuery.noConflict();

$(document).ready(function(){
    $("#formButton").click(function() {
    $("#project-form").fadeToggle();
    $("h2#project-submitted-msg").hide();
  });
});

$(document).ready(function() {

  $('#basicExampleModal').on('hidden.bs.modal', function () {
      const $modal = $(this);
      delete mymovieid;
      // remove the bs.modal data attribute from it
      $(this).removeData('bs.modal');
});

  $('#basicExampleModal').on('show.bs.modal', function(e) {

          const $modal = $(this);
          delete mymovieid;
          mymovieid = e.relatedTarget.dataset.movieid;
          let mymoviename = e.relatedTarget.dataset.moviename[0].toUpperCase() + e.relatedTarget.dataset.moviename.substr(1);

          $modal.find('.edit-content').html('Move ' + mymoviename + ' to your watched list?');

          $("#btn-confirm").click(function(e) {
            $.ajax({
              cache: false,
              url: '/delete-movie/?mymovieid=' + mymovieid,
              data: mymoviename,
              beforeSend: function () { $("#imgSpinner1").show();
              },
              type: 'POST',
              success: function(html) {
                $("#imgSpinner1").hide();
                window.location.replace( '/list-movies/?movie-deleted&title=' +  mymoviename );
                delete mymovieid;
              }
          });
        });
    });

    $("#project-deleted").show("slow").delay(2500).hide("slow");
});

$(document).ready(function () {
    toggleFields(); 
    $("#genre").change(function () {
        toggleFields();
    });

});

// toggles the visibility of other input
function toggleFields() {
    if ($("#genre").val() === "other") {
      $("#genre_other").show()
      $("input#genre_other").prop("required", true);
    } else {
      $("#genre_other").hide();
    }  
}


$(document).ready(function() {

  $('.my-rating').starRating({
      initialRating: 0,
      strokeColor: '#894A00',
      strokeWidth: 10,
      starSize: 18,
      disableAfterRate: false,
      callback: function(currentRating, $el){
        $.post('/save-movie-rating/', {rating: currentRating, movieid: $el[0].id });
      }
  });

});