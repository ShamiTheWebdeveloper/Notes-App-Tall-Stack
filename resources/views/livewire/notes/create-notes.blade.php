<?php

use JetBrains\PhpStorm\NoReturn;
use Livewire\Volt\Component;

new class extends Component {
    public  $noteTitle;
    public  $noteBody;
    public  $noteRecipient;
    public  $noteSendDate;

    public function submit(): void
    {

        $validated=$this->validate([
            'noteTitle'=>['required','string','min:5'],
            'noteBody'=>['required','string','min:20'],
            'noteRecipient'=>['required','email'],
            'noteSendDate'=>['required','date'],
        ]);

        auth()->user()->notes()->create([
            'title'=>$this->noteTitle,
            'body'=>$this->noteBody,
            'recipient'=>$this->noteRecipient,
            'send_date'=>$this->noteSendDate,
            'is_published'=>false
        ]);

        redirect()->route('notes.index');
    }
}
?>

<div>
    <form wire:submit="submit" class="space-y-4">
        <x-input wire:model="noteTitle" label="Note Title" placeholder="It's been a great day"/>
        <x-textarea wire:model="noteBody" label="Your Note" placeholder="Let's share all your thought"/>
        <x-input wire:model="noteRecipient" type="email" icon="user" label="Recipient" placeholder="yourFriend@email.com"/>
        <x-input wire:model="noteSendDate" icon="calendar" type="date" label="Send Date" placeholder=""/>
        <div class="pt-4">
            <x-button wire:click="submit" primary right-icon="calendar" spinner>Schedule Note</x-button>
        </div>
    </form>
</div >
