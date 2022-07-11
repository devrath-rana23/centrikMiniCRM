<?php

namespace App;

use App\Helpers\Helper;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'email', 'password', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @var integer
     */
    static $page_limit;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function __construct()
    {
        self::$page_limit = config('constants.PAGE_LIMIT');
    }

    public function fetchListWithPagination()
    {
        return self::select('users.*')->join('roles_users_pivot', 'users.id', '=', 'roles_users_pivot.user_id')->where('roles_users_pivot.role_id', Role::EMPLOYEE_ROLE)->orderBy('users.id', 'DESC')->paginate(self::$page_limit);
    }

    static function createEmployee($data)
    {
        unset($data['_token']);
        $data = Helper::dataWithTimestamps($data);
        $employee =  self::create($data);
        CompanyUserPivot::createEmployeeCompanyRelationData($data->company_id, $employee->id);
        RoleUserPivot::createEmployeeRoleRelationData(Role::EMPLOYEE_ROLE, $employee->id);
        return $employee;
    }

    static function showEmployee($id)
    {
        return self::find($id);
    }

    static function destroyEmployee($id)
    {
        return self::find($id)->delete();
    }

    static function updateEmployee($data, $id)
    {
        unset($data['_token']);
        $data['updated_at'] = Carbon::now();
        CompanyUserPivot::updateEmployeeCompanyRelationData($data->company_id, $id);
        return self::where('id', $id)->update($data);
    }
}
