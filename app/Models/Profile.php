<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:51 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Profile
 * 
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Profile extends Eloquent
{
	protected $primaryKey = 'user_id';
	public $timestamps = false;

	protected $fillable = [
		'first_name',
		'last_name'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
