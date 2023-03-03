<?php

namespace Almooradi\FilamentSpatiePermissions;

use Almooradi\FilamentSpatiePermissions\Filament\Resources\RoleResource;
use Almooradi\FilamentSpatiePermissions\Policies\RolePolicy;
use Filament\PluginServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\LaravelPackageTools\Package;
use Spatie\Permission\Models\Role;

class FilamentSpatiePermissionsServiceProvider extends PluginServiceProvider
{
	protected array $resources = [
		RoleResource::class,
	];

	public function configurePackage(Package $package): void
	{
		$package->name('filament-spatie-permissions');
	}

	/**
	 * Botstrap any package services
	 * 
	 * @return void
	 */
	// public function boot()
	// {
		// Gate::policy(Role::class, RolePolicy::class);


		// $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

		// $this->publishes([
		// 	__DIR__ . '/../assets' => public_path('assets/packages/vendor/filament-spatie-permissions'),
		// ], 'public');
		// php artisan vendor:publish --tag=public --force
	// }
}
