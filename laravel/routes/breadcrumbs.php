<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push(__('general.home'), route('home'));
});