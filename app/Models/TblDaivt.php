<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblDaivt
 * 
 * @property int $ID_DAI
 * @property string $MA_DAIVT
 * @property string $TEN_DAIVT
 * @property string $DIA_CHI
 * @property string $SO_DT
 * @property int $ID_DONVI
 * 
 * @property \App\Models\TblDonvi $tbl_donvi
 * @property \Illuminate\Database\Eloquent\Collection $tbl_nhanviens
 * @property \Illuminate\Database\Eloquent\Collection $tbl_pis
 *
 * @package App\Models
 */
class TblDaivt extends Eloquent
{
	protected $table = 'tbl_daivt';
	protected $primaryKey = 'ID_DAI';
	public $timestamps = false;

	protected $casts = [
		'ID_DONVI' => 'int'
	];

	protected $fillable = [
		'MA_DAIVT',
		'TEN_DAIVT',
		'DIA_CHI',
		'SO_DT',
		'ID_DONVI'
	];

	public function tbl_donvi()
	{
		return $this->belongsTo(\App\Models\TblDonvi::class, 'ID_DONVI');
	}

	public function tbl_nhanviens()
	{
		return $this->hasMany(\App\Models\TblNhanvien::class, 'ID_DAI');
	}

	public function tbl_pis()
	{
		return $this->hasMany(\App\Models\TblPi::class, 'ID_DAI');
	}
}
