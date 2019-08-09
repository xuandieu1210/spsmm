<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblParam
 * 
 * @property int $ID_PARAM
 * @property string $MA_PARAM
 * @property string $FILE_PARAM
 * @property string $MO_TA
 * @property int $ACTIVE_PARAM
 * @property int $ACTIVE_MODULE
 * @property int $ID_MODULE
 * @property int $ID_PI
 * 
 * @property \App\Models\TblModule $tbl_module
 * @property \App\Models\TblPi $tbl_pi
 * @property \Illuminate\Database\Eloquent\Collection $tbl_clauses
 * @property \Illuminate\Database\Eloquent\Collection $tbl_paramdetails
 * @property \Illuminate\Database\Eloquent\Collection $tbl_results
 *
 * @package App\Models
 */
class TblParam extends Eloquent
{
	protected $table = 'tbl_param';
	protected $primaryKey = 'ID_PARAM';
	public $timestamps = false;

	protected $casts = [
		'ACTIVE_PARAM' => 'int',
		'ACTIVE_MODULE' => 'int',
		'ID_MODULE' => 'int',
		'ID_PI' => 'int'
	];

	protected $fillable = [
		'MA_PARAM',
		'FILE_PARAM',
		'MO_TA',
		'ACTIVE_PARAM',
		'ACTIVE_MODULE',
		'ID_MODULE',
		'ID_PI'
	];

	public function tbl_module()
	{
		return $this->belongsTo(\App\Models\TblModule::class, 'ID_MODULE');
	}

	public function tbl_pi()
	{
		return $this->belongsTo(\App\Models\TblPi::class, 'ID_PI');
	}

	public function tbl_clauses()
	{
		return $this->hasMany(\App\Models\TblClause::class, 'ID_PARAM');
	}

	public function tbl_paramdetails()
	{
		return $this->hasMany(\App\Models\TblParamdetail::class, 'ID_PARAM');
	}

	public function tbl_results()
	{
		return $this->hasMany(\App\Models\TblResult::class, 'ID_PARAM');
	}
}
