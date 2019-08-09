<div class="form-group {{ $errors->has('MA_NHOMPI') ? 'has-error' : ''}}">
    <label for="MA_NHOMPI" class="control-label">{{ 'Mã Nhóm' }}</label>
    <input class="form-control" rows="5" name="MA_NHOMPI" type="string" id="MA_NHOMPI" value="{{ isset($nhompi->MA_NHOMPI) ? $nhompi->MA_NHOMPI : ''}}" >
    {!! $errors->first('MA_NHOMPI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('TEN_NHOMPI') ? 'has-error' : ''}}">
    <label for="TEN_NHOMPI" class="control-label">{{ 'Tên Thiết Bị' }}</label>
    <input class="form-control" name="TEN_NHOMPI" type="text" id="TEN_NHOMPI" value="{{ isset($nhompi->TEN_NHOMPI) ? $nhompi->TEN_NHOMPI : ''}}" >
    {!! $errors->first('TEN_NHOMPI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('MO_TA') ? 'has-error' : ''}}">
    <label for="MO_TA" class="control-label">{{ 'Mô Tả' }}</label>
    <input class="form-control" name="MO_TA" type="text" id="MO_TA" value="{{ isset($nhompi->MO_TA) ? $nhompi->MO_TA : ''}}" >
    {!! $errors->first('MO_TA', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('CAU_HINH') ? 'has-error' : ''}}">
    <label for="CAU_HINH" class="control-label">{{ 'Cấu Hình' }}</label>
    <input class="form-control" name="CAU_HINH" type="text" id="CAU_HINH" value="{{ isset($nhompi->CAU_HINH) ? $nhompi->CAU_HINH : ''}}" >
    {!! $errors->first('CAU_HINH', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
