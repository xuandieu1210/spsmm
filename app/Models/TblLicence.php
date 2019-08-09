<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblLicence
 * 
 * @property string $LICENCE_NAME
 * @property string $EXP_DATE
 * @property int $LICENCE_NUMBER
 * @property string $LICENCE_CODE
 * @property string $LICENCE_ICODE
 *
 * @package App\Models
 */
class TblLicence extends Eloquent
{
	protected $table = 'tbl_licence';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'LICENCE_NUMBER' => 'int'
	];

	protected $fillable = [
		'LICENCE_NAME',
		'EXP_DATE',
		'LICENCE_NUMBER',
		'LICENCE_CODE',
		'LICENCE_ICODE'
	];
}
