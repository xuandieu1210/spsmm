<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblLogalarm16
 * 
 * @property int $ID_LOGALARM16
 * @property \Carbon\Carbon $DATE_LOG
 * @property \Carbon\Carbon $DATE_PI
 * @property bool $IN_1
 * @property bool $IN_2
 * @property bool $IN_3
 * @property bool $IN_4
 * @property bool $IN_5
 * @property bool $IN_6
 * @property bool $IN_7
 * @property bool $IN_8
 * @property bool $IN_9
 * @property bool $IN_10
 * @property bool $IN_11
 * @property bool $IN_12
 * @property bool $IN_13
 * @property bool $IN_14
 * @property bool $IN_15
 * @property bool $IN_16
 * @property bool $DEFAULT_PARAM
 * @property int $ID_PI
 * 
 * @property \App\Models\TblPi $tbl_pi
 *
 * @package App\Models
 */
class TblLogalarm16 extends Eloquent
{
	protected $table = 'tbl_logalarm16';
	protected $primaryKey = 'ID_LOGALARM16';
	public $timestamps = false;

	protected $casts = [
		'IN_1' => 'int',
		'IN_2' => 'int',
		'IN_3' => 'int',
		'IN_4' => 'int',
		'IN_5' => 'int',
		'IN_6' => 'int',
		'IN_7' => 'int',
		'IN_8' => 'int',
		'IN_9' => 'int',
		'IN_10' => 'int',
		'IN_11' => 'int',
		'IN_12' => 'int',
		'IN_13' => 'int',
		'IN_14' => 'int',
		'IN_15' => 'int',
		'IN_16' => 'int',
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
		'IN_1',
		'IN_2',
		'IN_3',
		'IN_4',
		'IN_5',
		'IN_6',
		'IN_7',
		'IN_8',
		'IN_9',
		'IN_10',
		'IN_11',
		'IN_12',
		'IN_13',
		'IN_14',
		'IN_15',
		'IN_16',
		'DEFAULT_PARAM',
		'ID_PI'
	];

	public function tbl_pi()
	{
		return $this->belongsTo(\App\Models\TblPi::class, 'ID_PI');
	}
}
