<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblOutput
 * 
 * @property int $ID_OUTPUT
 * @property string $MA_OUTPUT
 * @property string $TEN_OUTPUT
 * @property string $GHI_CHU
 *
 * @package App\Models
 */
class TblOutput extends Eloquent
{
	protected $table = 'tbl_output';
	protected $primaryKey = 'ID_OUTPUT';
	public $timestamps = false;

	protected $fillable = [
		'MA_OUTPUT',
		'TEN_OUTPUT',
		'GHI_CHU'
	];
}
