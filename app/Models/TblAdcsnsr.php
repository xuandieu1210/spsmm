<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblAdcsnsr
 * 
 * @property int $ID_ADCSNSR
 * @property string $MA_ADC
 * @property string $TEN_ADC
 * @property string $GHI_CHU
 *
 * @package App\Models
 */
class TblAdcsnsr extends Eloquent
{
	protected $table = 'tbl_adcsnsr';
	protected $primaryKey = 'ID_ADCSNSR';
	public $timestamps = false;

	protected $fillable = [
		'MA_ADC',
		'TEN_ADC',
		'GHI_CHU'
	];
}
