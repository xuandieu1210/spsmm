<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblClause
 * 
 * @property int $ID_CLAUSE
 * @property int $ID_PARAM
 * @property string $CLAUSE_NO
 * @property string $CLAUSE_OPR
 * @property string $OBJECT_REL
 * 
 * @property \App\Models\TblParam $tbl_param
 * @property \Illuminate\Database\Eloquent\Collection $tbl_clausedetails
 *
 * @package App\Models
 */
class TblClause extends Eloquent
{
	protected $table = 'tbl_clause';
	protected $primaryKey = 'ID_CLAUSE';
	public $timestamps = false;

	protected $casts = [
		'ID_PARAM' => 'int'
	];

	protected $fillable = [
		'ID_PARAM',
		'CLAUSE_NO',
		'CLAUSE_OPR',
		'OBJECT_REL'
	];

	public function tbl_param()
	{
		return $this->belongsTo(\App\Models\TblParam::class, 'ID_PARAM');
	}

	public function tbl_clausedetails()
	{
		return $this->hasMany(\App\Models\TblClausedetail::class, 'ID_CLAUSE');
	}
}
