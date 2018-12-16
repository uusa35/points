<div class="modal fade" id="order-file" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
           
            <div class="row">


<div class="col-md-6-3">
                            <div class="form-group">
                                <label for="form_control_1">{{ trans('general.image') }}</label>
                                <input type="file" class="form-control" name="image" placeholder="image">
                                <div class="help-block text-left">
                                    W H - Best fit 250 x 250 pixels
                                </div>
                            </div>
<div class="col-md-6">
    <div class="form-group{{ $errors->has('phone_one') ? ' has-error' : '' }}">
        <label for="phone_one" class="control-label">phone_one </label>
        <input id="phone_one" type="text" class="form-control" name="phone_one" value="{{ old('phone_one') }}"
            placeholder="phone_one" autofocus>
        
    </div>
</div>


</div>

            do the form here
                mame
                description

            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn red modal-save">Confirm Delete</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
