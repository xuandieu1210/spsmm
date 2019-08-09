<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProfilesField
 * 
 * @property int $id
 * @property string $varname
 * @property string $title
 * @property string $field_type
 * @property int $field_size
 * @property int $field_size_min
 * @property int $required
 * @property string $match
 * @property string $range
 * @property string $error_message
 * @property string $other_validator
 * @property string $default
 * @property string $widget
 * @property string $widgetparams
 * @property int $position
 * @property int $visible
 *
 * @package App\Models
 */
class ProfilesField extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'field_size' => 'int',
		'field_size_min' => 'int',
		'required' => 'int',
		'position' => 'int',
		'visible' => 'int'
	];

	protected $fillable = [
		'varname',
		'title',
		'field_type',
		'field_size',
		'field_size_min',
		'required',
		'match',
		'range',
		'error_message',
		'other_validator',
		'default',
		'widget',
		'widgetparams',
		'position',
		'visible'
	];
}
