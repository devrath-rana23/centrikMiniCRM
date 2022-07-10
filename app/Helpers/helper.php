<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;

class Helper
{

    static function dataWithTimestamps($data)
    {
        $data['created_at'] = $data['updated_at'] = Carbon::now();
        return $data;
    }
}
