<?php

namespace App;

use App\Http\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleUserPivot extends Model
{
    use SoftDeletes;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles_users_pivot';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'role_id',  'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    static function getRoleIdBasedOnUserId($user_id)
    {
        return self::where('user_id', $user_id)->value('role_id');
    }

    static function createEmployeeRoleRelationData($role_id, $employee_id)
    {
        $data = [
            'role_id' => $role_id,
            'user_id' => $employee_id,
        ];
        $data = Helper::dataWithTimestamps($data);
        return self::insert($data);
    }
}
