<?php

use App\Livewire\AddPermission;
use App\Livewire\AddRole;
use App\Livewire\AddUser;
use App\Livewire\DeletePermission;
use App\Livewire\DeleteRole;
use App\Livewire\DeleteUser;
use App\Livewire\EditPermission;
use App\Livewire\EditRole;
use App\Livewire\EditUser;
use App\Livewire\ManagePermission;
use App\Livewire\ManageRole;
use App\Livewire\ManageUser;
use App\Livewire\RoleAddPermissions;
use App\Livewire\RoleUpdatePermissions;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::get('manage-permission', ManagePermission::class)->name('manage-permission');
    Route::get('add-permission', AddPermission::class)->name('add-permission');
    Route::get('edit-permission/{id}', EditPermission::class)->name('edit-permission');
    Route::get('delete-permission/{id}', DeletePermission::class)->name('delete-permission');

    Route::get('manage-role', ManageRole::class)->name('manage-role');
    Route::get('add-role', AddRole::class)->name('add-role');
    Route::get('edit-role/{id}', EditRole::class)->name('edit-role');
    Route::get('delete-role/{id}', DeleteRole::class)->name('delete-role');

    Route::get('role-give-permission/{id}', RoleAddPermissions::class)->name('role-give-permission');
    Route::get('role-update-permission/{id}', RoleUpdatePermissions::class)->name('role-update-permission');


    Route::get('manage-user', ManageUser::class)->name('manage-user');
     Route::get('add-user', AddUser::class)->name('add-user');
    Route::get('edit-user/{id}', EditUser::class)->name('edit-user');
    Route::get('delete-user/{id}', DeleteUser::class)->name('delete-user');

});

require __DIR__.'/auth.php';
