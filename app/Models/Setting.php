<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];
    protected $primaryKey = 'key';
    public $incrementing = false;
    protected $keyType = 'string';

    public static function get($key, $default = null)
    {
        return Cache::rememberForever('setting_' . $key, function () use ($key, $default) {
            $setting = self::find($key);
            return $setting ? $setting->value : $default;
        });
    }

    public static function set($key, $value)
    {
        self::updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget('setting_' . $key);
        Cache::forget('all_settings');
    }

    public static function allSettings()
    {
        return Cache::rememberForever('all_settings', function () {
            return self::pluck('value', 'key')->toArray();
        });
    }
}
