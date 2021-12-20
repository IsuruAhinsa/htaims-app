<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('locations.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Locations', route('locations.index'));
});

Breadcrumbs::for('locations.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('locations.index');
    $trail->push('Deleted Locations', route('locations.trash'));
});

Breadcrumbs::for('manufacturers.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Manufacturers', route('manufacturers.index'));
});

Breadcrumbs::for('manufacturers.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('manufacturers.index');
    $trail->push('Deleted Manufacturers', route('manufacturers.trash'));
});

Breadcrumbs::for('tasks.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Tasks', route('tasks.index'));
});

Breadcrumbs::for('tasks.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('tasks.index');
    $trail->push('Deleted Tasks', route('tasks.trash'));
});
