<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use SoftDeletes;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    const SUPER_ADMIN_ROLE = 1;
    const PLATFORM_ADMIN_ROLE = 2;
    const EMPLOYEE_ROLE = 3;
    const ROLES = [self::SUPER_ADMIN_ROLE => 'Super Admin', self::PLATFORM_ADMIN_ROLE => 'Employee', self::EMPLOYEE_ROLE => 'Platform Admin'];
}
