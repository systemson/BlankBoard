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
        switch ($this->attributes['type']) {
            case 'string':
                $value = (string) $value;
                break;
            case 'boolean':
                $value = (bool) $value;
                break;
            case 'integer':
                $value = (int) $value;
                break;
        }
        $this->attributes['value'] = json_encode($value);
    }

    public function getValueAttribute($value)
    {
        return json_decode($value);
    }
}
