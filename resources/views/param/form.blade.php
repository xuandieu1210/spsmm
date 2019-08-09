<div class="form-group {{ $errors->has('MA_PARAM') ? 'has-error' : ''}}">
    <label for="MA_PARAM" class="control-label">{{ 'Mã Tham Số' }}</label>
    <input class="form-control" name="MA_PARAM" type="text" id="MA_PARAM" value="{{ isset($param->MA_PARAM) ? $param->MA_PARAM : ''}}" >
    {!! $errors->first('MA_PARAM', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('FILE_PARAM') ? 'has-error' : ''}}">
    <label for="FILE_PARAM" class="control-label">{{ 'File Tham Số' }}</label>
    <input class="form-control" rows="5" name="FILE_PARAM" type="file" id="FILE_PARAM" />
    {!! $errors->first('FILE_PARAM', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('MO_TA') ? 'has-error' : ''}}">
    <label for="MO_TA" class="control-label">{{ 'Mô Tả' }}</label>
    <input class="form-control" name="MO_TA" type="text" id="MO_TA" value="{{ isset($param->MO_TA) ? $param->MO_TA : ''}}" >
    {!! $errors->first('MO_TA', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ACTIVE_PARAM') ? 'has-error' : ''}}">
    <label for="ACTIVE_PARAM" class="control-label">{{ 'Active Tham Số' }}</label>
    <input class="form-control" id="ytParam_ACTIVE_PARAM" type="hidden" value="0" name="ACTIVE_PARAM" @if (isset($param->ACTIVE_PARAM) && $param->ACTIVE_PARAM == 0) checked  @endif>
    <input value="1" name="ACTIVE_PARAM" id="Param_ACTIVE_PARAM" type="checkbox" @if (isset($param->ACTIVE_PARAM) && $param->ACTIVE_PARAM == 0) checked  @endif>
    {!! $errors->first('ACTIVE_PARAM', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ACTIVE_MODULE') ? 'has-error' : ''}}">
    <label for="ACTIVE_MODULE" class="control-label">{{ 'Active Module' }}</label>
    <input class="form-control" id="ytParam_ACTIVE_PARAM" type="hidden" value="0" name="ACTIVE_MODULE" @if (isset($param->ACTIVE_MODULE) && $param->ACTIVE_MODULE == 0) checked  @endif>
    <input value="1" name="ACTIVE_MODULE" id="Param_ACTIVE_PARAM" type="checkbox" @if (isset($param->ACTIVE_MODULE) && $param->ACTIVE_MODULE == 1) checked  @endif>
    {!! $errors->first('ACTIVE_MODULE', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ID_MODULE') ? 'has-error' : ''}}">
    <label for="ID_MODULE" class="control-label">{{ 'Id Module' }}</label>
    <input class="form-control" name="ID_MODULE" type="text" id="ID_MODULE" value="{{ isset($param->tbl_module->MA_MODULE) ? $param->tbl_module->MA_MODULE : ''}}" >
    {!! $errors->first('ID_MODULE', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ID_PI') ? 'has-error' : ''}}">
    <label for="ID_PI" class="control-label">{{ 'Id Thiết Bị' }}</label>
    <input class="form-control" name="ID_PI" type="text" id="ID_PI" value="{{ isset($param->tbl_pi->TEN_PI) ? $param->tbl_pi->TEN_PI : ''}}" >
    {!! $errors->first('ID_PI', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
