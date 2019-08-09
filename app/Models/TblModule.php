<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblModule
 * 
 * @property int $ID_MODULE
 * @property string $MA_MODULE
 * @property string $TEN_MODULE
 * @property string $FILE_CODE
 * @property string $FILE_RUN
 * @property string $FILE_SHELL
 * @property string $FILE_PARAM
 * @property string $PHIEN_BAN
 * @property int $ID_NHOMPI
 * @property string $MO_TA
 * 
 * @property \App\Models\TblNhompi $tbl_nhompi
 * @property \Illuminate\Database\Eloquent\Collection $tbl_params
 *
 * @package App\Models
 */
class TblModule extends Eloquent
{
	protected $table = 'tbl_module';
	protected $primaryKey = 'ID_MODULE';
	public $timestamps = false;

	protected $casts = [
		'ID_NHOMPI' => 'int'
	];

	protected $fillable = [
		'MA_MODULE',
		'TEN_MODULE',
		'FILE_CODE',
		'FILE_RUN',
		'FILE_SHELL',
		'FILE_PARAM',
		'PHIEN_BAN',
		'ID_NHOMPI',
		'MO_TA'
	];

	public function tbl_nhompi()
	{
		return $this->belongsTo(\App\Models\TblNhompi::class, 'ID_NHOMPI');
	}

	public function tbl_params()
	{
		return $this->hasMany(\App\Models\TblParam::class, 'ID_MODULE');
	}
}
