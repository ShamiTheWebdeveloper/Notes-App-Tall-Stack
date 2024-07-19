<?php

use Illuminate\Support\Facades\Route;
use \Livewire\Volt\Volt;
Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('notes', 'notes.index')
    ->middleware(['auth'])
    ->name('notes.index');

Route::view('notes/create', 'notes.create')
    ->middleware(['auth'])
    ->name('notes.create');

Volt::route('/note/{note}/edit','notes.edit-notes')
    ->middleware(['auth'])
    ->name('note.edit');

Route::get('/note/{note}',function (\App\Models\Note $note){
    if (!$note->is_published){
        abort(404);
    }
    $user=$note->user;
    return view('notes.view',compact('user','note'));
})->name('notes.view');

require __DIR__.'/auth.php';
