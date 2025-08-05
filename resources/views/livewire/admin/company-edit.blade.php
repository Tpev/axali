<div class="max-w-xl space-y-6">
    <form wire:submit.prevent="save" class="space-y-6">
        @include('livewire.admin.partials.company-fields')
		<hr class="my-8">

<h3 class="text-lg font-semibold mb-2">Contacts</h3>
<livewire:admin.contacts-table :company="$this->company" key="contacts-{{ $this->company->id }}" />

<livewire:admin.contact-form  :company="$this->company" key="contact-form-{{ $this->company->id }}" />

        <div>
            <button class="btn btn-emerald">Save</button>
            <a href="{{ route('admin.companies') }}" class="btn btn-gray ml-2">Back</a>
        </div>
    </form>
</div>
