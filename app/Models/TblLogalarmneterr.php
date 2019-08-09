<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblLogalarmneterr
 * 
 * @property int $ID_LOGALARM
 * @property \Carbon\Carbon $DATE_LOG
 * @property \Carbon\Carbon $DATE_PI
 * @property string $GIA_TRI
 * @property string $FILE_CAM
 * @property int $ID_ALARM
 * @property bool $DEFAULT_PARAM
 * @property int $ID_PI
 * @property float $ALARM_TIME
 * @property bool $CHECK_PASS
 * @property \Carbon\Carbon $TIME_CHECK
 * @property bool $TYPE_CHECK
 * @property string $TICKET
 * 
 * @property \App\Models\TblAlarm $tbl_alarm
 * @property \App\Models\TblPi $tbl_pi
 *
 * @package App\Models
 */
class TblLogalarmneterr extends Eloquent
{
	protected $table = 'tbl_logalarmneterr';
	protected $primaryKey = 'ID_LOGALARM';
	public $timestamps = false;

	protected $casts = [
		'ID_ALARM' => 'int',
		'DEFAULT_PARAM' => 'bool',
		'ID_PI' => 'int',
		'ALARM_TIME' => 'float',
		'CHECK_PASS' => 'bool',
		'TYPE_CHECK' => 'bool'
	];

	protected $dates = [
		'DATE_LOG',
		'DATE_PI',
		'TIME_CHECK'
	];

	protected $fillable = [
		'DATE_LOG',
		'DATE_PI',
		'GIA_TRI',
		'FILE_CAM',
		'ID_ALARM',
		'DEFAULT_PARAM',
		'ID_PI',
		'ALARM_TIME',
		'CHECK_PASS',
		'TIME_CHECK',
		'TYPE_CHECK',
		'TICKET'
	];

	public function tbl_alarm()
	{
		return $this->belongsTo(\App\Models\TblAlarm::class, 'ID_ALARM');
	}

	public function tbl_pi()
	{
		return $this->belongsTo(\App\Models\TblPi::class, 'ID_PI');
	}
}
