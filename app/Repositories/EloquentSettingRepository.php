<?php

namespace App\Repositories;

use App\Models\Setting;

class EloquentSettingRepository implements SettingRepositoryInterface
{
    public function all()
    {
        return Setting::pluck('value', 'key')->toArray();
    }

    public function getValue($key, $default = null)
    {
        $setting = Setting::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    public function setValue($key, $value)
    {
        return Setting::updateOrCreate(['key' => $key], ['value' => $value]);
    }

    public function setMany(array $settings)
    {
        foreach ($settings as $key => $value) {
            $this->setValue($key, $value);
        }
    }
}
