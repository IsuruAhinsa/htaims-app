<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
});

Breadcrumbs::for('users.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Deleted Users', route('users.trash'));
});

Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
    $trail->push('Role & Permissions', route('roles.index'));
});

Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
    $trail->push('Role & Permissions', route('roles.index'));
    $trail->push('Create Role', route('roles.create'));
});

Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
    $trail->push('Role & Permissions', route('roles.index'));
    $trail->push($role->name, route('roles.edit', $role));
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

Breadcrumbs::for('departments.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Departments', route('departments.index'));
});

Breadcrumbs::for('departments.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('departments.index');
    $trail->push('Deleted Departments', route('departments.trash'));
});

Breadcrumbs::for('contractors.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Contractors', route('contractors.index'));
});

Breadcrumbs::for('contractors.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('contractors.index');
    $trail->push('Deleted Contractors', route('contractors.trash'));
});

Breadcrumbs::for('vendors.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Vendors', route('vendors.index'));
});

Breadcrumbs::for('vendors.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('vendors.index');
    $trail->push('Deleted Vendors', route('vendors.trash'));
});

Breadcrumbs::for('hospitals.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Hospitals', route('hospitals.index'));
});

Breadcrumbs::for('hospitals.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('hospitals.index');
    $trail->push('Deleted Hospitals', route('hospitals.trash'));
});

Breadcrumbs::for('assets.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Assets', route('assets.index'));
});

Breadcrumbs::for('assets.create', function (BreadcrumbTrail $trail) {
    $trail->parent('assets.index');
    $trail->push('Create Asset', route('assets.create'));
});

Breadcrumbs::for('assets.show', function (BreadcrumbTrail $trail, $asset) {
    $trail->parent('assets.index');
    $trail->push($asset->asset_no, route('assets.show', $asset));
});

Breadcrumbs::for('assets.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('assets.index');
    $trail->push('Deleted Assets', route('assets.trash'));
});

