<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Company extends Model
{
    use SoftDeletes;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'address', 'website', 'email', 'logo', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * @var integer
     */
    static $page_limit;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function __construct()
    {
        self::$page_limit = config('constants.PAGE_LIMIT');
    }

    public function fetchListWithPagination()
    {
        return self::paginate(self::$page_limit);
    }

    static function dataWithTimestamps($data)
    {
        $data['created_at'] = $data['updated_at'] = Carbon::now();
        return $data;
    }

    static function createCompany($data)
    {
        unset($data['_token']);
        $data = self::dataWithTimestamps($data);
        return self::insert($data);
    }
}
