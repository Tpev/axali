<div wire:key="lead-wrapper">          {{-- ⬅ single, permanent root --}}

    {{-- Form (shown while $sent == false) --}}
    @if (! $sent)
        <form  wire:key="lead-form"
               wire:submit.prevent="submit"
               class="bg-[#18191F] rounded-xl p-8 space-y-6 shadow-lg">

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm mb-1" for="name">Name</label>
                    <input  id="name" type="text"
                            wire:model.defer="name"
                            class="w-full p-3 rounded bg-[#22232F] border-none text-white">
                    @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm mb-1" for="email">Email</label>
                    <input  id="email" type="email"
                            wire:model.defer="email"
                            class="w-full p-3 rounded bg-[#22232F] border-none text-white">
                    @error('email') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm mb-1" for="message">Brief Project Outline</label>
                <textarea id="message" rows="5"
                          wire:model.defer="message"
                          class="w-full p-3 rounded bg-[#22232F] border-none text-white"></textarea>
                @error('message') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit"
                    class="w-full py-3 bg-gradient-to-br from-purple-500 to-indigo-500 rounded
                           font-semibold hover:opacity-90 transition">
                Send & Book Slot →
            </button>
        </form>

    {{-- Thank-you card (after submit) --}}
    @else
        <div wire:key="lead-thanks"
             class="bg-[#18191F] rounded-xl p-10 text-center space-y-4 shadow-lg">
            <h3 class="text-2xl font-bold text-amber-400">Thank you! 🎉</h3>
            <p class="text-gray-300">
                We’ve received your message and will reply within one business day.
            </p>
            <button wire:click="$set('sent', false)"
                    class="text-indigo-400 hover:underline">
                ← Send another message
            </button>
        </div>
    @endif

</div>
