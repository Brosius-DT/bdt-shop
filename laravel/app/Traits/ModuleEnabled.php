<?php
namespace App\Traits;

use App\Services\LicenseService;
use App\Models\Setting;

trait ModuleEnabled
{
    private function trainingModuleEnabled(): bool
    {
        return app(LicenseService::class)->checkHasModuleLicense('training');
    }

    private function individualMeasurementConfigModuleEnabled(): bool
    {
        return app(LicenseService::class)->checkHasModuleLicense('training');
    }

    private function esdManagementModuleEnabled(): bool
    {
        return app(LicenseService::class)->checkHasModuleLicense('training');
    }
}
