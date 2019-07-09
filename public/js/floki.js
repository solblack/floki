// Collapse every time dropdown is shown
$('.dropdown-collapse').on('show.bs.dropdown', function (event) {
  var collapse = $(this).find($(this).data('accordion'));
  collapse.find('.panel-collapse.in').collapse('hide');
});

// Prevent dropdown to be closed when we click on an collapse link
$('.dropdown-collapse').on('click', 'a[data-toggle="collapse"]', function (event) {
  event.preventDefault();
  event.stopPropagation();
  $($(this).data('parent')).find('.panel-collapse.in').collapse('hide');
  $($(this).attr('href')).collapse('show');
})

// Tool tip formularios
$(document).ready(function() {
$("#lefttip").tooltip({
    placement: "left"
});
});
