<div class="form-group {{ $errors->has('MA_ADC') ? 'has-error' : ''}}">
    <label for="MA_ADC" class="control-label">{{ 'Mã cảm biến' }}</label>
    <input class="form-control" name="MA_ADC" type="text" id="MA_ADC" value="{{ isset($adcsnsr->MA_ADC) ? $adcsnsr->MA_ADC : ''}}" >
    {!! $errors->first('MA_ADC', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('TEN_ADC') ? 'has-error' : ''}}">
    <label for="TEN_ADC" class="control-label">{{ 'Tên cảm biến' }}</label>
    <input class="form-control" name="TEN_ADC" type="text" id="TEN_ADC" value="{{ isset($adcsnsr->TEN_ADC) ? $adcsnsr->TEN_ADC : ''}}" >
    {!! $errors->first('TEN_ADC', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('GHI_CHU') ? 'has-error' : ''}}">
    <label for="GHI_CHU" class="control-label">{{ 'Ghi chú' }}</label>
    <input class="form-control" name="GHI_CHU" type="text" id="GHI_CHU" value="{{ isset($adcsnsr->GHI_CHU) ? $adcsnsr->GHI_CHU : ''}}" >
    {!! $errors->first('GHI_CHU', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
