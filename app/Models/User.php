<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 09 Jul 2019 02:03:52 +0000.
 */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $activkey
 * @property int $superuser
 * @property int $status
 * @property \Carbon\Carbon $create_at
 * @property \Carbon\Carbon $lastvisit_at
 * 
 * @property \App\Models\Profile $profile
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	public $timestamps = false;

	protected $casts = [
		'superuser' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'create_at',
		'lastvisit_at'
	];

	protected $hidden = [
		'remember_token',
		'password'
	];

	protected $fillable = [
		'username',
		'password',
		'email',
		'activkey',
		'superuser',
		'status',
		'create_at',
		'lastvisit_at'
	];

	public function profile()
	{
		return $this->hasOne(\App\Models\Profile::class);
	}
}
