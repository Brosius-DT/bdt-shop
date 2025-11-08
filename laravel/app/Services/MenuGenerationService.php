<?php

namespace App\Services;

use App\DTOs\Icon;
use App\DTOs\MenuItem;
use App\Models\User;
use App\Traits\ModuleEnabled;
use Auth;

class MenuGenerationService
{
    private User $user;

    use ModuleEnabled;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * @return array<MenuItem>
     */
    public function generateMenu(): array
    {
        return [
            MenuItem::resource('employees', Icon::dx('group')),
            MenuItem::resource('groups', Icon::epa('groups')),
            MenuItem::resource('measurements', Icon::dx('event')),
            MenuItem::resource('reports', Icon::dx('datausage')),
            new MenuItem(
                text: __('general.trainings'),
                icon: Icon::glyph('education'),
                path: route('trainings.index'),
                allowed: $this->user->hasPermission('trainings-index'),
                licensed: $this->trainingModuleEnabled()
            ),
            new MenuItem(
                text: __('general.esdmanager'),
                icon: Icon::dx('toolbox'),
                path: '/esdmanager',
                licensed: $this->esdManagementModuleEnabled(),
                items: [
                    new MenuItem(
                        text: __('general.esdtasks'),
                        icon: Icon::dx('checklist'),
                        path: route('tasks.index'),
                        licensed: $this->esdManagementModuleEnabled(),
                    ),
                    new MenuItem(
                        text: __('general.esdmeasurements'),
                        icon: Icon::dx('orderedlist'),
                        path: route('esdmeasurements.index'),
                        licensed: $this->esdManagementModuleEnabled()
                    ),
                    new MenuItem(
                        text: __('general.esdcontrolitems'),
                        icon: Icon::dx('mediumiconslayout'),
                        path: route('esdcontrolitems.index'),
                        licensed: $this->esdManagementModuleEnabled()
                    ),
                    new MenuItem(
                        text: __('general.productqualifications'),
                        icon: Icon::dx('box'),
                        path: null,
                        licensed: false
                    ),
                    new MenuItem(
                        text: __('general.measuringdevices'),
                        icon: Icon::dx('dataarea'),
                        path: route('measuringdevices.index'),
                        licensed: $this->esdManagementModuleEnabled()
                    ),
                    new MenuItem(
                        text: __('general.places'),
                        icon: Icon::dx('map'),
                        path: route('places.index'),
                        licensed: $this->esdManagementModuleEnabled()
                    ),
                    new MenuItem(
                        text: __('general.documents'),
                        icon: Icon::dx('doc'),
                        path: route('documents.index'),
                        licensed: $this->esdManagementModuleEnabled()
                    ),
                    new MenuItem(
                        text: __('general.templates'),
                        icon: Icon::dx('repeat'),
                        path: null,
                        items: [
                            MenuItem::resource('esdcontrolitemtemplates'),
                            MenuItem::resource('esdcontrolitemcategories'),
                            MenuItem::resource('measuringdevicestags'),
                            MenuItem::resource('measuringpoints'),
                            MenuItem::resource('measurands'),
                            MenuItem::resource('measurementparameters'),
                            MenuItem::resource('physicalquantities'),
                            MenuItem::resource('baseunits'),
                        ]
                    ),
                ]
            ),
            new MenuItem(
                text: __('general.devices'),
                icon: Icon::epa('epapro'),
                path: route('devices.index'),
                allowed: $this->user->hasPermission('devices-index') || $this->user->hasPermission('devicesyncconfigs-index')
            ),
            new MenuItem(
                text: __('general.settings'),
                icon: Icon::dx('preferences'),
                path: null,
                items: [
                    MenuItem::resource('globalsettings'),
                    MenuItem::resource('presets'),
                    MenuItem::resource('users', Icon::dx('user')),
                    MenuItem::resource('roles'),
                    MenuItem::resource('apikeys'),
                    MenuItem::resource('licensekeys', Icon::glyph('star')),
                    new MenuItem(
                        text: __('general.measurementconfigs'),
                        icon: null,
                        path: route('measurementconfigs.index'),
                        allowed: $this->user->hasPermission('measurementconfigs-index'),
                        licensed: $this->individualMeasurementConfigModuleEnabled()
                    ),
                ]
            ),
        ];
    }
}
