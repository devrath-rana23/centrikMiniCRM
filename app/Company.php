<?php

namespace App;

use App\Helpers\Helper;
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
        return self::select('companies.*')->orderBy('id', 'DESC')->whereNull('deleted_at')->paginate(self::$page_limit);
    }

    public function fetchListOfCompanies()
    {
        return self::select('companies.*')->orderBy('id', 'DESC')->get();
    }


    static function createCompany($data)
    {
        unset($data['_token']);
        $data = Helper::dataWithTimestamps($data);
        return self::insert($data);
    }

    static function showCompany($id)
    {
        return self::find($id);
    }

    static function destroyCompany($id)
    {
        return self::find($id)->delete();
    }

    static function updateCompany($data, $id)
    {
        unset($data['_token']);
        $data['updated_at'] = Carbon::now();
        return self::where('id', $id)->update($data);
    }
}
