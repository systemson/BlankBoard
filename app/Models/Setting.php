<?php

namespace App\Models;

use App\Models\ResourceModel as Model;
use Carbon\Carbon;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
    ];

    public function setValueAttribute($value)
    {
        $type = explode(':', $this->attributes['type']);
        switch ($type[0]) {

            case 'string':
                $value = (string) $value;
                break;

            case 'boolean':
                $value = (bool) $value;
                break;

            case 'integer':
                $value = (int) $value;
                break;

            case 'date':
                $value = Carbon::parse($value)->toDateString();
                break;

            case 'time':
                $value = Carbon::parse($value)->toTimeString();
                break;

            case 'timestamp':
                $value = Carbon::parse($value)->toDayDateTimeString();
                break;

        }
        $this->attributes['value'] = json_encode($value);
    }

    public function getValueAttribute($value)
    {
        return json_decode($value);
    }
}
