<?php

namespace App\Repositories;

interface SettingRepositoryInterface
{
    public function all();
    public function getValue($key, $default = null);
    public function setValue($key, $value);
    public function setMany(array $settings);
}
