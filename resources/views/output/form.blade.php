<div class="form-group {{ $errors->has('MA_OUTPUT') ? 'has-error' : ''}}">
    <label for="MA_OUTPUT" class="control-label">{{ 'Mã Điều Khiển' }}</label>
    <input class="form-control" name="MA_OUTPUT" type="text" id="MA_OUTPUT" value="{{ isset($output->MA_OUTPUT) ? $output->MA_OUTPUT : ''}}" >
    {!! $errors->first('MA_OUTPUT', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('TEN_OUTPUT') ? 'has-error' : ''}}">
    <label for="TEN_OUTPUT" class="control-label">{{ 'Tên Điều Khiển' }}</label>
    <input class="form-control" name="TEN_OUTPUT" type="text" id="TEN_OUTPUT" value="{{ isset($output->TEN_OUTPUT) ? $output->TEN_OUTPUT : ''}}" >
    {!! $errors->first('TEN_OUTPUT', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('GHI_CHU') ? 'has-error' : ''}}">
    <label for="GHI_CHU" class="control-label">{{ 'Ghi Chú' }}</label>
    <input class="form-control" name="GHI_CHU" type="text" id="GHI_CHU" value="{{ isset($output->GHI_CHU) ? $output->GHI_CHU : ''}}" >
    {!! $errors->first('GHI_CHU', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
