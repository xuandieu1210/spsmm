<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblNhompi
 * 
 * @property int $ID_NHOMPI
 * @property string $MA_NHOMPI
 * @property string $TEN_NHOMPI
 * @property string $MO_TA
 * @property string $CAU_HINH
 * 
 * @property \Illuminate\Database\Eloquent\Collection $tbl_modules
 * @property \Illuminate\Database\Eloquent\Collection $tbl_pis
 *
 * @package App\Models
 */
class TblNhompi extends Eloquent
{
	protected $table = 'tbl_nhompi';
	protected $primaryKey = 'ID_NHOMPI';
	public $timestamps = false;

	protected $fillable = [
		'MA_NHOMPI',
		'TEN_NHOMPI',
		'MO_TA',
		'CAU_HINH'
	];

	public function tbl_modules()
	{
		return $this->hasMany(\App\Models\TblModule::class, 'ID_NHOMPI');
	}

	public function tbl_pis()
	{
		return $this->hasMany(\App\Models\TblPi::class, 'ID_NHOMPI');
	}
}
