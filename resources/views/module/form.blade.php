<div class="form-group {{ $errors->has('MA_MODULE') ? 'has-error' : ''}}">
    <label for="MA_MODULE" class="control-label">{{ 'Mã Module' }}</label>
    <textarea class="form-control" rows="5" name="MA_MODULE" type="textarea" id="MA_MODULE" >{{ isset($module->MA_MODULE) ? $module->MA_MODULE : ''}}</textarea>
    {!! $errors->first('MA_MODULE', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('TEN_MODULE') ? 'has-error' : ''}}">
    <label for="TEN_MODULE" class="control-label">{{ 'Tên Module' }}</label>
    <input class="form-control" name="TEN_MODULE" type="text" id="TEN_MODULE" value="{{ isset($module->TEN_MODULE) ? $module->TEN_MODULE : ''}}" >
    {!! $errors->first('TEN_MODULE', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('FILE_CODE') ? 'has-error' : ''}}">
    <label for="FILE_CODE" class="control-label">{{ 'File Code' }}</label>
    <input class="form-control" name="FILE_CODE" type="text" id="FILE_CODE" value="{{ isset($module->FILE_CODE) ? $module->FILE_CODE : ''}}" >
    {!! $errors->first('FILE_CODE', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('FILE_RUN') ? 'has-error' : ''}}">
    <label for="FILE_RUN" class="control-label">{{ 'File Run' }}</label>
    <textarea class="form-control" rows="5" name="FILE_RUN" type="textarea" id="FILE_RUN" >{{ isset($module->FILE_RUN) ? $module->FILE_RUN : ''}}</textarea>
    {!! $errors->first('FILE_RUN', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('FILE_SHELL') ? 'has-error' : ''}}">
    <label for="FILE_SHELL" class="control-label">{{ 'File Shell' }}</label>
    <textarea class="form-control" rows="5" name="FILE_SHELL" type="textarea" id="FILE_SHELL" >{{ isset($module->FILE_SHELL) ? $module->FILE_SHELL : ''}}</textarea>
    {!! $errors->first('FILE_SHELL', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('FILE_PARAM') ? 'has-error' : ''}}">
    <label for="FILE_PARAM" class="control-label">{{ 'File Param' }}</label>
    <textarea class="form-control" rows="5" name="FILE_PARAM" type="textarea" id="FILE_PARAM" >{{ isset($module->FILE_PARAM) ? $module->FILE_PARAM : ''}}</textarea>
    {!! $errors->first('FILE_PARAM', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('PHIEN_BAN') ? 'has-error' : ''}}">
    <label for="PHIEN_BAN" class="control-label">{{ 'Phien Ban' }}</label>
    <input class="form-control" name="PHIEN_BAN" type="text" id="PHIEN_BAN" value="{{ isset($module->PHIEN_BAN) ? $module->PHIEN_BAN : ''}}" >
    {!! $errors->first('PHIEN_BAN', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ID_NHOMPI') ? 'has-error' : ''}}">
    <label for="ID_NHOMPI" class="control-label">{{ 'Id Nhompi' }}</label>
    <input class="form-control" name="ID_NHOMPI" type="number" id="ID_NHOMPI" value="{{ isset($module->ID_NHOMPI) ? $module->ID_NHOMPI : ''}}" >
    {!! $errors->first('ID_NHOMPI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('MO_TA') ? 'has-error' : ''}}">
    <label for="MO_TA" class="control-label">{{ 'Mo Ta' }}</label>
    <input class="form-control" name="MO_TA" type="text" id="MO_TA" value="{{ isset($module->MO_TA) ? $module->MO_TA : ''}}" >
    {!! $errors->first('MO_TA', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
