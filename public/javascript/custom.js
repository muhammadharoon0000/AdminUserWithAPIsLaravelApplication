console.log("JS Attached");

let table = new DataTable('#myTable');
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

function updateUserUi() {
  $('#myTable2').dataTable({
    ajax: 'http://localhost/api/users',
    "columns": [
      { "data": "name" },
      { "data": "user_id" },
      { "data": "email" },
      {
        "data": null,
        "mRender": function (data, type, row) {
          return `<button class="btn btn-primary m-1"  onclick="deleteUser(${data.id})">Delete</button><button class="btn btn-success m-1"  onclick="editUser(${data.id})">Edit</button>`;
        }
      },
    ]
  });
}

$('#show_all_users').on('click', updateUserUi())
var modal = $('#exampleModalCenter');

function deleteUser(id) {
  $.ajax({
    type: 'delete',
    url: `http://localhost/api/users/${id}`,
    success: function (data) {
      console.log(data);
      $('#myTable2').dataTable().fnClearTable();
      $('#myTable2').dataTable().fnDraw();
      $('#myTable2').dataTable().fnDestroy();
      updateUserUi();
    }
  })
}

function editUser(id) {
  $.ajax({
    type: 'get',
    url: `http://localhost/api/users/${id}/edit`,
    success: function (data) {
      $("#current_user_id").val(data.user.id)
      $("#user_name").val(data.user.name);
      $("#email").val(data.user.email);
      for (const key in data.roles) {
        $('#select_role').append(`<option value="${key}" ${key == data.user.user_id ? "selected" : ""} >${data.roles[key]}</option>`)
      }
      $('#user_modal').modal('toggle');
    }
  })
  $('#select_role').empty();
}

$("#edit_form").on('submit', function (event) {
  event.preventDefault();
  var values = {
    name: $("#user_name").val(),
    user_id: $('#select_role').val(),
    email: $("#email").val(),
    password: $("#input_password").val()
  }
  $.ajax({
    type: "put",
    url: `http://localhost/api/users/${values.user_id}`,
    data: values,
    dataType: "json",
    success: function (response) {
      console.log(response);
      $("#edit_form").resetForm();
      $('#user_modal').modal('toggle');
      $('#myTable2').dataTable().fnClearTable();
      $('#myTable2').dataTable().fnDraw();
      $('#myTable2').dataTable().fnDestroy();
      updateUserUi();
    }
  });
})

$('#add_new_user').on('click', function () {
  $.ajax({
    type: "get",
    url: "http://localhost/api/users/create",
    success: function (data) {
      for (const key in data.roles) {
        $('#new_select_role').append(`<option value="${key}"} >${data.roles[key]}</option>`)
      }
      console.log(data.roles);
      $('#add_new_user_modal').modal('toggle');
    }
  });
})

$("#add_form").on('submit', function (event) {
  event.preventDefault();
  var values = {
    name: $('#new_name').val(),
    email: $('#new_email').val(),
    user_id: $('#new_select_role').val(),
    password: $('#new_password').val(),
  }
  $.ajax({
    type: "POST",
    url: "http://localhost/api/users",
    data: values,
    dataType: "json",
    success: function (response) {
      console.log(response);
      $('#add_new_user_modal').modal('toggle');
      $('#myTable2').dataTable().fnClearTable();
      $('#myTable2').dataTable().fnDraw();
      $('#myTable2').dataTable().fnDestroy();
      updateUserUi();
    }
  });

});