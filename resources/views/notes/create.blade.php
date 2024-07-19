<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Note') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <x-button icon="arrow-left" class="mb-8" href="{{ route('notes.index') }}" wire:navigate>Back</x-button>
          <livewire:notes.create-notes />
        </div>
    </div>
</x-app-layout>
