<div class="form-group {{ $errors->has('MA_ALARM') ? 'has-error' : ''}}">
    <label for="MA_ALARM" class="control-label">{{ 'Mã Cảnh Báo' }}</label>
    <input class="form-control" name="MA_ALARM" type="text" id="MA_ALARM" value="{{ isset($alarm->MA_ALARM) ? $alarm->MA_ALARM : ''}}" >
    {!! $errors->first('MA_ALARM', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('TEN_ALARM') ? 'has-error' : ''}}">
    <label for="TEN_ALARM" class="control-label">{{ 'Tên Cảnh Báo' }}</label>
    <input class="form-control" name="TEN_ALARM" type="text" id="TEN_ALARM" value="{{ isset($alarm->TEN_ALARM) ? $alarm->TEN_ALARM : ''}}" >
    {!! $errors->first('TEN_ALARM', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('CAP_DO') ? 'has-error' : ''}}">
    <label for="CAP_DO" class="control-label">{{ 'Cấp Độ' }}</label>
    <input class="form-control" name="CAP_DO" type="number" id="CAP_DO" value="{{ isset($alarm->CAP_DO) ? $alarm->CAP_DO : 0}}" >
    {!! $errors->first('CAP_DO', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('LOAI_ALARM') ? 'has-error' : ''}}">
    <label for="LOAI_ALARM" class="control-label">{{ 'Loại Cảnh Báo' }}</label>
    <input class="form-control" name="LOAI_ALARM" type="number" id="LOAI_ALARM" value="{{ isset($alarm->LOAI_ALARM) ? $alarm->LOAI_ALARM : 0}}" >
    {!! $errors->first('LOAI_ALARM', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('FILE_ICON') ? 'has-error' : ''}}">
    <label for="FILE_ICON" class="control-label">{{ 'File Icon' }}</label>
    <input class="form-control" name="FILE_ICON" type="text" id="FILE_ICON" value="{{ isset($alarm->FILE_ICON) ? $alarm->FILE_ICON : ''}}" >
    {!! $errors->first('FILE_ICON', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('MAU_CHU') ? 'has-error' : ''}}">
    <label for="MAU_CHU" class="control-label">{{ 'Màu Chữ' }}</label>
    <input class="form-control" name="MAU_CHU" type="text" id="MAU_CHU" value="{{ isset($alarm->MAU_CHU) ? $alarm->MAU_CHU : 'White'}}" >
    {!! $errors->first('MAU_CHU', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('MAU_NEN') ? 'has-error' : ''}}">
    <label for="MAU_NEN" class="control-label">{{ 'Màu Nền' }}</label>
    <input class="form-control" name="MAU_NEN" type="text" id="MAU_NEN" value="{{ isset($alarm->MAU_NEN) ? $alarm->MAU_NEN : 'Red'}}" >
    {!! $errors->first('MAU_NEN', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('SMS_ALARM') ? 'has-error' : ''}}">
    <label for="SMS_ALARM" class="control-label">{{ 'Cấp SMS' }}</label>
    <input class="form-control" name="SMS_ALARM" type="number" id="SMS_ALARM" value="{{ isset($alarm->SMS_ALARM) ? $alarm->SMS_ALARM : 0}}" >
    {!! $errors->first('SMS_ALARM', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('MO_TA') ? 'has-error' : ''}}">
    <label for="MO_TA" class="control-label">{{ 'Mô Tả' }}</label>
    <input class="form-control" name="MO_TA" type="text" id="MO_TA" value="{{ isset($alarm->MO_TA) ? $alarm->MO_TA : ''}}" >
    {!! $errors->first('MO_TA', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('MSG_ALARM') ? 'has-error' : ''}}">
    <label for="MSG_ALARM" class="control-label">{{ 'SMS Cảnh Báo' }}</label>
    <input class="form-control" name="MSG_ALARM" type="text" id="MSG_ALARM" value="{{ isset($alarm->MSG_ALARM) ? $alarm->MSG_ALARM : ''}}" >
    {!! $errors->first('MSG_ALARM', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('MSG_NORMAL') ? 'has-error' : ''}}">
    <label for="MSG_NORMAL" class="control-label">{{ 'SMS Thường' }}</label>
    <input class="form-control" name="MSG_NORMAL" type="text" id="MSG_NORMAL" value="{{ isset($alarm->MSG_NORMAL) ? $alarm->MSG_NORMAL : ''}}" >
    {!! $errors->first('MSG_NORMAL', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('MSG_ERR') ? 'has-error' : ''}}">
    <label for="MSG_ERR" class="control-label">{{ 'SMS Lỗi' }}</label>
    <input class="form-control" name="MSG_ERR" type="text" id="MSG_ERR" value="{{ isset($alarm->MSG_ERR) ? $alarm->MSG_ERR : ''}}" >
    {!! $errors->first('MSG_ERR', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ENABLE_SMS') ? 'has-error' : ''}}">
    <label for="ENABLE_SMS" class="control-label">{{ 'Mở SMS' }}</label>
    <input class="form-control" name="ENABLE_SMS" type="number" id="ENABLE_SMS" value="{{ isset($alarm->ENABLE_SMS) ? $alarm->ENABLE_SMS : 1}}" >
    {!! $errors->first('ENABLE_SMS', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
<div style="width: 100%;">
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:98%;border-color: white">
	<tbody>
		<tr>
            <td style="text-align: center; background-color: rgb(99, 153, 205);border-color: white"><span style="color:#FFFFFF;"><strong><span style="text-align: center;"></span>Phân loại 1</strong></span></td>
			<td style="text-align: center; background-color: rgb(99, 153, 205);border-color: white"><span style="color:#FFFFFF;"><strong><span style="text-align: center;">Phân loại 2</span></strong></span></td>
			<td style="text-align: center; background-color: rgb(99, 153, 205);border-color: white"><span style="color:#FFFFFF;"><strong><span style="text-align: center;">Phân loại 3</span></strong></span></td>
			<td style="text-align: center; background-color: rgb(99, 153, 205);border-color: white"><span style="color:#FFFFFF;"><strong><span style="text-align: center;">Phân loại 4</span></strong></span></td>
			<td style="text-align: center; background-color: rgb(99, 153, 205);border-color: white"><span style="color:#FFFFFF;"><strong><span style="text-align: center;">Phân loại 5</span></strong></span></td>
			<td style="text-align: center; background-color: rgb(99, 153, 205);border-color: white"><span style="color:#FFFFFF;"><strong><span style="text-align: center;">Phân loại 6</span></strong></span></td>
			<td style="text-align: center; background-color: rgb(99, 153, 205);border-color: white"><span style="color:#FFFFFF;"><strong><span style="text-align: center;">Phân loại 7</span></strong></span></td>
		</tr>
		<tr>
            <td style="text-align: center;background-color: maroon;border-color: white"><span style="color:#FFFFFF;">Maroon</span></td>
            <td style="text-align: center;background-color: purple;border-color: white"><span style="color:#FFFFFF;">Purple</span></td>
            <td style="text-align: center;background-color: olive;border-color: white"><span style="color:#FFFFFF;">Olive</span></td>
            <td style="text-align: center;background-color: green;border-color: white"><span style="color:#FFFFFF;">Green</span></td>
            <td style="text-align: center;background-color: darkslategrey;border-color: white"><span style="color:#FFFFFF;">Darkslategrey</span></td>
            <td style="text-align: center;background-color: navy;border-color: white"><span style="color:#FFFFFF;">Navy</span></td>
            <td style="text-align: center;background-color: black;border-color: white"><span style="color:#FFFFFF;">Black</span></td>
		</tr>
		<tr>
            <td style="text-align: center;background-color: red;border-color: white"><span style="color:#FFFFFF;">Red</span></td>
            <td style="text-align: center;background-color: magenta;border-color: white"><span style="color:#FFFFFF;">Magenta</span></td>
            <td style="text-align: center;background-color: gold;border-color: white"><span style="color:#FFFFFF;">Gold</span></td>
            <td style="text-align: center;background-color: limegreen;border-color: white"><span style="color:#FFFFFF;">Limegreen</span></td>
            <td style="text-align: center;background-color: lightseagreen;border-color: white"><span style="color:#FFFFFF;">Lightseagreen</span></td>
            <td style="text-align: center;background-color: blue;border-color: white"><span style="color:#FFFFFF;">Blue</span></td>
            <td style="text-align: center;background-color: dimgrey;border-color: white"><span style="color:#FFFFFF;">Dimgrey</span></td>
		</tr>
		<tr>
            <td style="text-align: center;background-color: tomato;border-color: white"><span style="color:#FFFFFF;">Tomato</span></td>
            <td style="text-align: center;background-color: violet;border-color: white"><span style="color:#FFFFFF;">Violet</span></td>
            <td style="text-align: center;background-color: khaki;border-color: white"><span style="color:#FFFFFF;">Khaki</span></td>
            <td style="text-align: center;background-color: lightgreen;border-color: white"><span style="color:#FFFFFF;">Lightgreen</span></td>
            <td style="text-align: center;background-color: cyan;border-color: white"><span style="color:#FFFFFF;">Cyan</span></td>
            <td style="text-align: center;background-color: slateblue;border-color: white"><span style="color:#FFFFFF;">Slateblue</span></td>
            <td style="text-align: center;background-color: darkgrey;border-color: white"><span style="color:#FFFFFF;">Darkgrey</span></td>
		</tr>
	</tbody>
</table>

</div>