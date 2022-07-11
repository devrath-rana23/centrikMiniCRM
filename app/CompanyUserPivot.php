<?php

namespace App;

use App\Http\Helpers\Helper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyUserPivot extends Model
{
    use SoftDeletes;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'company_users_pivot';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'company_id',  'created_at', 'updated_at', 'deleted_at'
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
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    static function createEmployeeCompanyRelationData($company_id, $employee_id)
    {
        $data = [
            'company_id' => $company_id,
            'user_id' => $employee_id,
        ];
        $data = Helper::dataWithTimestamps($data);
        return self::insert($data);
    }

    static function updateEmployeeCompanyRelationData($company_id, $employee_id)
    {
        $data = [
            'company_id' => $company_id,
        ];
        $data['updated_at'] = Carbon::now();
        return self::where('id', $employee_id)->update($data);
    }
}
