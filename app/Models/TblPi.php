<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblPi
 * 
 * @property int $ID_PI
 * @property string $TEN_PI
 * @property string $DC_PI
 * @property float $LAT_PI
 * @property float $LONG_PI
 * @property string $RTMP_PI
 * @property int $ID_DAI
 * @property int $ID_NHOMPI
 * @property int $ID_NHANVIEN
 * @property string $GHI_CHU
 * @property string $LICENCE_CODE
 * @property string $IP_ADDR
 * @property bool $ACTIVE_SMS
 * @property bool $START_UP
 * @property bool $S_CONNECT
 * 
 * @property \App\Models\TblDaivt $tbl_daivt
 * @property \App\Models\TblNhompi $tbl_nhompi
 * @property \App\Models\TblNhanvien $tbl_nhanvien
 * @property \Illuminate\Database\Eloquent\Collection $tbl_logalarms
 * @property \Illuminate\Database\Eloquent\Collection $tbl_logalarm16s
 * @property \Illuminate\Database\Eloquent\Collection $tbl_logalarmneterrs
 * @property \Illuminate\Database\Eloquent\Collection $tbl_logcams
 * @property \Illuminate\Database\Eloquent\Collection $tbl_logctrls
 * @property \Illuminate\Database\Eloquent\Collection $tbl_logsnsrs
 * @property \Illuminate\Database\Eloquent\Collection $tbl_params
 *
 * @package App\Models
 */
class TblPi extends Eloquent
{
	protected $table = 'tbl_pi';
	protected $primaryKey = 'ID_PI';
	public $timestamps = false;

	protected $casts = [
		'LAT_PI' => 'float',
		'LONG_PI' => 'float',
		'ID_DAI' => 'int',
		'ID_NHOMPI' => 'int',
		'ID_NHANVIEN' => 'int',
		'ACTIVE_SMS' => 'bool',
		'START_UP' => 'bool',
		'S_CONNECT' => 'bool'
	];

	protected $fillable = [
		'TEN_PI',
		'DC_PI',
		'LAT_PI',
		'LONG_PI',
		'RTMP_PI',
		'ID_DAI',
		'ID_NHOMPI',
		'ID_NHANVIEN',
		'GHI_CHU',
		'LICENCE_CODE',
		'IP_ADDR',
		'ACTIVE_SMS',
		'START_UP',
		'S_CONNECT'
	];

	public function tbl_daivt()
	{
		return $this->belongsTo(\App\Models\TblDaivt::class, 'ID_DAI');
	}

	public function tbl_nhompi()
	{
		return $this->belongsTo(\App\Models\TblNhompi::class, 'ID_NHOMPI');
	}

	public function tbl_nhanvien()
	{
		return $this->belongsTo(\App\Models\TblNhanvien::class, 'ID_NHANVIEN');
	}

	public function tbl_logalarms()
	{
		return $this->hasMany(\App\Models\TblLogalarm::class, 'ID_PI');
	}

	public function tbl_logalarm16s()
	{
		return $this->hasMany(\App\Models\TblLogalarm16::class, 'ID_PI');
	}

	public function tbl_logalarmneterrs()
	{
		return $this->hasMany(\App\Models\TblLogalarmneterr::class, 'ID_PI');
	}

	public function tbl_logcams()
	{
		return $this->hasMany(\App\Models\TblLogcam::class, 'ID_PI');
	}

	public function tbl_logctrls()
	{
		return $this->hasMany(\App\Models\TblLogctrl::class, 'ID_PI');
	}

	public function tbl_logsnsrs()
	{
		return $this->hasMany(\App\Models\TblLogsnsr::class, 'ID_PI');
	}

	public function tbl_params()
	{
		return $this->hasMany(\App\Models\TblParam::class, 'ID_PI');
	}
}
