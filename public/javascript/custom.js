console.log("JS Attached");
let table = new DataTable('#myTable');
let table2 = new DataTable('#myTable2');
$(document).ready(function () {

  var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
    removeItemButton: true,
    maxItemCount: 10,
    searchResultLimit: 5,
    renderChoiceLimit: 10
  });


});

$('#show_password').on('click', function () {
  $('#input_password').attr('type', (_, type) => type == 'password' ? 'text' : 'password')
});
$('#show_confirm_password').on('click', function () {
  $('#input_confirm_password').attr('type', (_, type) => type == 'password' ? 'text' : 'password')
});
