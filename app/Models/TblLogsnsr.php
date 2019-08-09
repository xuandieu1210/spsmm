<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblLogsnsr
 * 
 * @property int $ID_LOGSNSR
 * @property \Carbon\Carbon $DATE_LOG
 * @property \Carbon\Carbon $DATE_PI
 * @property float $ADC_1
 * @property float $ADC_2
 * @property float $ADC_3
 * @property float $ADC_4
 * @property float $ADC_5
 * @property float $ADC_6
 * @property float $ADC_7
 * @property float $ADC_8
 * @property float $ADC_9
 * @property float $ADC_10
 * @property float $ADC_11
 * @property float $ADC_12
 * @property float $ADC_13
 * @property float $ADC_14
 * @property float $ADC_15
 * @property float $ADC_16
 * @property int $DEFAULT_PARAM
 * @property int $ID_PI
 * 
 * @property \App\Models\TblPi $tbl_pi
 *
 * @package App\Models
 */
class TblLogsnsr extends Eloquent
{
	protected $table = 'tbl_logsnsr';
	protected $primaryKey = 'ID_LOGSNSR';
	public $timestamps = false;

	protected $casts = [
		'ADC_1' => 'float',
		'ADC_2' => 'float',
		'ADC_3' => 'float',
		'ADC_4' => 'float',
		'ADC_5' => 'float',
		'ADC_6' => 'float',
		'ADC_7' => 'float',
		'ADC_8' => 'float',
		'ADC_9' => 'float',
		'ADC_10' => 'float',
		'ADC_11' => 'float',
		'ADC_12' => 'float',
		'ADC_13' => 'float',
		'ADC_14' => 'float',
		'ADC_15' => 'float',
		'ADC_16' => 'float',
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
		'ADC_1',
		'ADC_2',
		'ADC_3',
		'ADC_4',
		'ADC_5',
		'ADC_6',
		'ADC_7',
		'ADC_8',
		'ADC_9',
		'ADC_10',
		'ADC_11',
		'ADC_12',
		'ADC_13',
		'ADC_14',
		'ADC_15',
		'ADC_16',
		'DEFAULT_PARAM',
		'ID_PI'
	];

	public function tbl_pi()
	{
		return $this->belongsTo(\App\Models\TblPi::class, 'ID_PI');
	}

	// public function query()
	// {
	// 	$logsnsr = "SELECT tbl_logsnsr.*, tbl_pi.TEN_PI, tbl_param.FILE_PARAM, tbl_param.ID_PARAM FROM tbl_logsnsr JOIN tbl_pi ON tbl_logsnsr.ID_PI = tbl_pi.ID_PI JOIN tbl_param ON tbl_logsnsr.ID_PI = tbl_PARAM.ID_PI AND tbl_param.MA_PARAM = 'SNSR' ";
	// 	return $logsnsr;
	// }

}
