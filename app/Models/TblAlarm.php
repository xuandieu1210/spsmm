<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblAlarm
 * 
 * @property int $ID_ALARM
 * @property string $MA_ALARM
 * @property string $TEN_ALARM
 * @property int $CAP_DO
 * @property int $LOAI_ALARM
 * @property string $FILE_ICON
 * @property string $MAU_CHU
 * @property string $MAU_NEN
 * @property bool $SMS_ALARM
 * @property string $MO_TA
 * @property string $MSG_ALARM
 * @property string $MSG_NORMAL
 * @property string $MSG_ERR
 * @property bool $ENABLE_SMS
 * 
 * @property \Illuminate\Database\Eloquent\Collection $tbl_logalarms
 * @property \Illuminate\Database\Eloquent\Collection $tbl_logalarmneterrs
 *
 * @package App\Models
 */
class TblAlarm extends Eloquent
{
	protected $table = 'tbl_alarm';
	protected $primaryKey = 'ID_ALARM';
	public $timestamps = false;

	protected $casts = [
		'CAP_DO' => 'int',
		'LOAI_ALARM' => 'int',
		'SMS_ALARM' => 'bool',
		'ENABLE_SMS' => 'bool'
	];

	protected $fillable = [
		'MA_ALARM',
		'TEN_ALARM',
		'CAP_DO',
		'LOAI_ALARM',
		'FILE_ICON',
		'MAU_CHU',
		'MAU_NEN',
		'SMS_ALARM',
		'MO_TA',
		'MSG_ALARM',
		'MSG_NORMAL',
		'MSG_ERR',
		'ENABLE_SMS'
	];

	public function tbl_logalarms()
	{
		return $this->hasMany(\App\Models\TblLogalarm::class, 'ID_ALARM');
	}

	public function tbl_logalarmneterrs()
	{
		return $this->hasMany(\App\Models\TblLogalarmneterr::class, 'ID_ALARM');
	}
}
