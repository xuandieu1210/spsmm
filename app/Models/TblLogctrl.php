<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblLogctrl
 * 
 * @property int $ID_LOGCTRL
 * @property \Carbon\Carbon $DATE_LOG
 * @property \Carbon\Carbon $DATE_PI
 * @property bool $OUT_1
 * @property bool $OUT_2
 * @property bool $OUT_3
 * @property bool $OUT_4
 * @property bool $OUT_5
 * @property bool $OUT_6
 * @property bool $OUT_7
 * @property bool $OUT_8
 * @property bool $OUT_9
 * @property bool $OUT_10
 * @property bool $OUT_11
 * @property bool $OUT_12
 * @property bool $OUT_13
 * @property bool $OUT_14
 * @property bool $OUT_15
 * @property bool $OUT_16
 * @property bool $DEFAULT_PARAM
 * @property int $ID_PI
 * 
 * @property \App\Models\TblPi $tbl_pi
 *
 * @package App\Models
 */
class TblLogctrl extends Eloquent
{
	protected $table = 'tbl_logctrl';
	protected $primaryKey = 'ID_LOGCTRL';
	public $timestamps = false;

	protected $casts = [
		'OUT_1' => 'int',
		'OUT_2' => 'int',
		'OUT_3' => 'int',
		'OUT_4' => 'int',
		'OUT_5' => 'int',
		'OUT_6' => 'int',
		'OUT_7' => 'int',
		'OUT_8' => 'int',
		'OUT_9' => 'int',
		'OUT_10' => 'int',
		'OUT_11' => 'int',
		'OUT_12' => 'int',
		'OUT_13' => 'int',
		'OUT_14' => 'int',
		'OUT_15' => 'int',
		'OUT_16' => 'int',
		'DEFAULT_PARAM' => 'int',
		'ID_PI' => 'int'
	];

	protected $dates = [
		'DATE_LOG',
		'DATE_PI'
	];

	protected $fillable = [
		'DATE_LOG',
		'DATE_PI',
		'OUT_1',
		'OUT_2',
		'OUT_3',
		'OUT_4',
		'OUT_5',
		'OUT_6',
		'OUT_7',
		'OUT_8',
		'OUT_9',
		'OUT_10',
		'OUT_11',
		'OUT_12',
		'OUT_13',
		'OUT_14',
		'OUT_15',
		'OUT_16',
		'DEFAULT_PARAM',
		'ID_PI'
	];

	public function tbl_pi()
	{
		return $this->belongsTo(\App\Models\TblPi::class, 'ID_PI');
	}
}
