<div class="max-w-xl space-y-6">
    <form wire:submit.prevent="save" class="space-y-6">
        @include('livewire.admin.partials.company-fields')
        <div>
            <button class="btn btn-emerald">Create</button>
            <a href="{{ route('admin.companies') }}" class="btn btn-gray ml-2">Cancel</a>
        </div>
    </form>
</div>
