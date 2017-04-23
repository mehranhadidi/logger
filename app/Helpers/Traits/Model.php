<?php

namespace Helpers\Traits;

use Carbon\Carbon;
use DB;

trait Model
{
    /**
     * Create a record
     *
     * @param array $data
     * @param array|null $additionalData
     * @return mixed
     */
    public static function create(array $data, array $additionalData = null)
    {
        // TODO Refactor method.

        // Add timestamps to data
        $data = array_merge($data, self::getTimeStamps());

        // If user added additional data to the request object, append it!
        if( ! is_null($additionalData))
            $data = array_merge($data, $additionalData);

        // Get array keys
        $keys = implode(', ', array_keys($data));

        // Get array values
        $values = array_values($data);

        // Convert values to question marks before persist it
        foreach ($values as $value)
            $questionMarks[] = '?';

        $questionMarks = implode(', ', $questionMarks);

        // If something happened before persisting data throw an internal server error
        if( ! $rowsAffected = \DB::insert('insert into '. self::$table .' ('. $keys .') values ('. $questionMarks .')', $values))
            false;

        // return true
        return $rowsAffected;
    }

    /**
     * Get timestamps
     *
     * @return array
     */
    private static function getTimeStamps()
    {
        return $timestamps = [
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ];
    }
}