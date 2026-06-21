<?php

namespace App\Services;

use App\Repositories\SettingRepositoryInterface;

class SettingService
{
    protected $settingRepo;

    public function __construct(SettingRepositoryInterface $settingRepo)
    {
        $this->settingRepo = $settingRepo;
    }

    public function getAllSettings()
    {
        return $this->settingRepo->all();
    }

    public function getSetting($key, $default = null)
    {
        return $this->settingRepo->getValue($key, $default);
    }

    public function updateSetting($key, $value)
    {
        return $this->settingRepo->setValue($key, $value);
    }

    public function updateSettings(array $settings)
    {
        $this->settingRepo->setMany($settings);
    }
}
