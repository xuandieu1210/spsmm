<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblNhanvien
 * 
 * @property int $ID_NHANVIEN
 * @property string $MA_NHANVIEN
 * @property string $TEN_NHANVIEN
 * @property string $CHUC_VU
 * @property string $DIEN_THOAI
 * @property int $ID_DONVI
 * @property int $ID_DAI
 * @property bool $SMS_ALARM
 * @property string $GHI_CHU
 * @property string $USER_NAME
 * @property int $SMS_TIME
 * 
 * @property \App\Models\TblDaivt $tbl_daivt
 * @property \App\Models\TblDonvi $tbl_donvi
 * @property \Illuminate\Database\Eloquent\Collection $tbl_pis
 *
 * @package App\Models
 */
class TblNhanvien extends Eloquent
{
	protected $table = 'tbl_nhanvien';
	protected $primaryKey = 'ID_NHANVIEN';
	public $timestamps = false;

	protected $casts = [
		'ID_DONVI' => 'int',
		'ID_DAI' => 'int',
		'SMS_ALARM' => 'bool',
		'SMS_TIME' => 'int'
	];

	protected $fillable = [
		'MA_NHANVIEN',
		'TEN_NHANVIEN',
		'CHUC_VU',
		'DIEN_THOAI',
		'ID_DONVI',
		'ID_DAI',
		'SMS_ALARM',
		'GHI_CHU',
		'USER_NAME',
		'SMS_TIME'
	];

	public function tbl_daivt()
	{
		return $this->belongsTo(\App\Models\TblDaivt::class, 'ID_DAI');
	}

	public function tbl_donvi()
	{
		return $this->belongsTo(\App\Models\TblDonvi::class, 'ID_DONVI');
	}

	public function tbl_pis()
	{
		return $this->hasMany(\App\Models\TblPi::class, 'ID_NHANVIEN');
	}
}
