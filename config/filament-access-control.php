<?php

use App\Models\User;
use Chiiya\FilamentAccessControl\Enumerators\Feature;
use Chiiya\FilamentAccessControl\Resources\FilamentUserResource;
use Chiiya\FilamentAccessControl\Resources\PermissionResource;
use Chiiya\FilamentAccessControl\Resources\RoleResource;

return [
    /*
    |--------------------------------------------------------------------------
    | List of enabled features
    |--------------------------------------------------------------------------
    | The following features are available:
    | \Chiiya\FilamentAccessControl\Enumerators\Feature::ACCOUNT_EXPIRY
    | \Chiiya\FilamentAccessControl\Enumerators\Feature::TWO_FACTOR
    */
    'features' => [Feature::ACCOUNT_EXPIRY, ...(env('APP_ENV') === 'local' ? [] : [Feature::TWO_FACTOR])],

    /*
    |--------------------------------------------------------------------------
    | Date Format
    |--------------------------------------------------------------------------
    | Display format for datepicker
    */
    'date_format' => 'd.m.Y',

    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    | User model used for admin access and management.
    */
    'user_model' => User::class,

    /*
    |--------------------------------------------------------------------------
    | Resources
    |--------------------------------------------------------------------------
    | Resources used for managing users, roles and permissions.
    */
    'resources' => [
        'user' => FilamentUserResource::class,
        'role' => RoleResource::class,
        'permission' => PermissionResource::class,
    ],
];
