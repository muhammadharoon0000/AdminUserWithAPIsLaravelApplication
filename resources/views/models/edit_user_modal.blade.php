@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    </div>
@endif

<div class="modal fade" id="user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_form" method="PUT">
                    @csrf
                    <div class="form-group">
                        <label>Enter Your Name</label>
                        <input name="name" type="text" class="form-control" id="user_name">
                    </div>
                    <input type="hidden" name="current_user_id" id="current_user_id">
                    <div class="form-group">
                        <label>Email address</label>
                        <input name="email" type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label>Select Role</label>
                            <select class="form-control" id="select_role" name="role">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" id="input_password">
                        <input type="checkbox" id="show_password">Show Password
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input name="confirm_password" type="password" class="form-control" id="input_confirm_password">
                        <input type="checkbox" id="show_confirm_password">Show Password
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
