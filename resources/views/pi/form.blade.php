<div class="form-group {{ $errors->has('TEN_PI') ? 'has-error' : ''}}">
    <label for="TEN_PI" class="control-label">{{ 'Tên Thiết Bị' }}</label>
    <input class="form-control" name="TEN_PI" type="text" id="TEN_PI" value="{{ isset($pi->TEN_PI) ? $pi->TEN_PI : ''}}" >
    {!! $errors->first('TEN_PI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('DC_PI') ? 'has-error' : ''}}">
    <label for="DC_PI" class="control-label">{{ 'Địa Chỉ Lắp Đặt' }}</label>
    <input class="form-control" name="DC_PI" type="text" id="DC_PI" value="{{ isset($pi->DC_PI) ? $pi->DC_PI : ''}}" >
    {!! $errors->first('DC_PI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('LAT_PI') ? 'has-error' : ''}}">
    <label for="LAT_PI" class="control-label">{{ 'Vĩ Độ' }}</label>
    <input class="form-control" name="LAT_PI" type="text" id="LAT_PI" value="{{ isset($pi->LAT_PI) ? $pi->LAT_PI : '0.0000'}}" >
    {!! $errors->first('LAT_PI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('LONG_PI') ? 'has-error' : ''}}">
    <label for="LONG_PI" class="control-label">{{ 'Kinh Độ' }}</label>
    <input class="form-control" name="LONG_PI" type="text" id="LONG_PI" value="{{ isset($pi->LONG_PI) ? $pi->LONG_PI : '0.0000'}}" >
    {!! $errors->first('LONG_PI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ID_DAI') ? 'has-error' : ''}}">
    <label for="ID_DAI" class="control-label">{{ 'Đơn Vị Giám Sát' }}</label>
    <select class="form-control" name = "ID_DAI">
        @foreach ($daiVt as $value)
            @if (isset($pi))
            <option value="{{$value->ID_DAI }}" @if ($value->ID_DAI == $pi->ID_DAI)
                    selected="selected" @endif>{{$value->TEN_DAIVT}}</option>
            @else 
            <option value="{{$value->ID_DAI }}">{{$value->TEN_DAIVT}}</option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('ID_DAI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ID_NHOMPI') ? 'has-error' : ''}}">
    <label for="ID_NHOMPI" class="control-label">{{ 'Nhóm Thiết Bị' }}</label>
    <select class="form-control" name = "ID_NHOMPI">
        @foreach ($nhomPi as $value)
            @if (isset($pi))
            <option value="{{$value->ID_NHOMPI }}" @if ($value->ID_NHOMPI == $pi->ID_NHOMPI)
                    selected="selected" @endif>{{$value->TEN_NHOMPI}}</option>
            @else 
            <option value="{{$value->ID_NHOMPI }}">{{$value->TEN_NHOMPI}}</option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('ID_NHOMPI', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ID_NHANVIEN') ? 'has-error' : ''}}">
    <label for="ID_NHANVIEN" class="control-label">{{ 'Nhân Viên Giám Sát' }}</label>
    <input class="form-control" name="SEARCH_NHANVIEN" type="text" placeholder= "search..." id="SEARCH_NHANVIEN" value="{{ isset($pi->ID_NHANVIEN) ? $pi->tbl_nhanvien->MA_NHANVIEN.'-'.$pi->tbl_nhanvien->TEN_NHANVIEN : ''}}" >
    <input type="hidden" name="ID_NHANVIEN" id="ID_NHANVIEN" placeholder="enter input" title="Enter input here" value="{{ isset($pi->ID_NHANVIEN) ? $pi->ID_NHANVIEN : ''}}">
    {!! $errors->first('ID_NHANVIEN', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('GHI_CHU') ? 'has-error' : ''}}">
    <label for="GHI_CHU" class="control-label">{{ 'Ghi Chú' }}</label>
    <input class="form-control" name="GHI_CHU" type="text" id="GHI_CHU" value="{{ isset($pi->GHI_CHU) ? $pi->GHI_CHU : ''}}" >
    {!! $errors->first('GHI_CHU', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('LICENCE_CODE') ? 'has-error' : ''}}">
    <label for="LICENCE_CODE" class="control-label">{{ 'Licence Code' }}</label>
    <input class="form-control" name="LICENCE_CODE" type="text" id="LICENCE_CODE" value="{{ isset($pi->LICENCE_CODE) ? $pi->LICENCE_CODE : ''}}" >
    {!! $errors->first('LICENCE_CODE', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('IP_ADDR') ? 'has-error' : ''}}">
    <label for="IP_ADDR" class="control-label">{{ 'Địa Chỉ IP' }}</label>
    <input class="form-control" name="IP_ADDR" type="text" id="IP_ADDR" value="{{ isset($pi->IP_ADDR) ? $pi->IP_ADDR : ''}}" >
    {!! $errors->first('IP_ADDR', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ACTIVE_SMS') ? 'has-error' : ''}}">
    <label for="ACTIVE_SMS" class="control-label">{{ 'Bật Sms' }}</label>
    <input class="form-control" name="ACTIVE_SMS" type="number" id="ACTIVE_SMS" value="{{ isset($pi->ACTIVE_SMS) ? $pi->ACTIVE_SMS : 1}}" >
    {!! $errors->first('ACTIVE_SMS', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
