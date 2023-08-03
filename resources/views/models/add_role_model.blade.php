<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('add_role') }}">
                    @csrf
                    <div class="form-group mt-5">
                        <label for="">Add Roles</label>
                        <input type="text" class="form-control" name="role">
                        </select>
                        <label for="">Select Permissions</label>
                        <select class="w-100" id="choices-multiple-remove-button" multiple name="permissions[]">
                            @foreach ($permissions as $id => $permission)
                                <option value="{{ $id }}">{{ $permission }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
