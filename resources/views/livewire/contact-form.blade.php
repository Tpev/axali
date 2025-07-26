{{-- resources/views/livewire/contact-form.blade.php --}}
<div wire:key="lead-wrapper"> {{-- ⬅ single, permanent root --}}

    <style>
        /* ========= Axali Light Form (self-contained) ========= */
        .ax-form-card{
          background:#fff;
          border:1px solid var(--border, #E5E7EB);
          border-radius:16px;
          box-shadow:0 8px 28px rgba(17,24,39,0.06);
        }
        .ax-label{
          display:block;
          font-size:.875rem;
          color:var(--text-600, #4B5563);
          margin-bottom:.375rem;
        }
        .ax-input{
          width:100%;
          background:#fff;
          border:1px solid var(--border, #E5E7EB);
          border-radius:12px;
          padding:.875rem .95rem;
          color:var(--text-900, #111827);
          transition:border-color .15s ease, box-shadow .15s ease, background-color .15s ease;
        }
        .ax-input::placeholder{ color:#9CA3AF; }
        .ax-input:focus{
          outline:none;
          border-color:var(--axali-purple, #5B32C1);
          box-shadow:0 0 0 3px rgba(91,50,193,.18);
          background:#fff;
        }
        .ax-error{
          color:#DC2626;
          font-size:.75rem;
          margin-top:.375rem;
        }
        .ax-btn-submit{
          display:inline-block;
          width:100%;
          padding:.95rem 1.25rem;
          border-radius:12px;
          font-weight:600;
          color:#fff;
          background:linear-gradient(90deg, var(--axali-purple, #5B32C1), var(--axali-indigo, #6366F1));
          box-shadow:0 10px 24px rgba(91,50,193,.22);
          transition:opacity .2s ease, transform .08s ease;
        }
        .ax-btn-submit:hover{ opacity:.94; }
        .ax-btn-submit:active{ transform:translateY(1px); }

        .ax-success{
          background:#fff;
          border:1px solid var(--border, #E5E7EB);
          border-radius:16px;
          box-shadow:0 8px 28px rgba(17,24,39,0.06);
          color:var(--text-700, #374151);
        }
        .ax-success h3{
          color:var(--axali-orange, #FF8B38);
        }
        .ax-link{
          color:var(--axali-indigo, #6366F1);
          font-weight:500;
        }
        .ax-link:hover{ text-decoration:underline; }
    </style>

    {{-- Form (shown while $sent == false) --}}
    @if (! $sent)
        <form  wire:key="lead-form"
               wire:submit.prevent="submit"
               class="ax-form-card p-8 md:p-10 space-y-6"
               aria-describedby="form-help"
               novalidate>
            <p id="form-help" class="text-sm text-gray-500 -mt-2">
                Tell us a bit about your project — we’ll reply within one business day.
            </p>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="ax-label" for="name">Name</label>
                    <input  id="name" type="text"
                            wire:model.defer="name"
                            class="ax-input"
                            placeholder="Jane Doe"
                            @error('name') aria-invalid="true" aria-describedby="err-name" @enderror>
                    @error('name') <p id="err-name" class="ax-error" role="alert">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="ax-label" for="email">Email</label>
                    <input  id="email" type="email"
                            wire:model.defer="email"
                            class="ax-input"
                            placeholder="jane@company.com"
                            inputmode="email" autocomplete="email"
                            @error('email') aria-invalid="true" aria-describedby="err-email" @enderror>
                    @error('email') <p id="err-email" class="ax-error" role="alert">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="ax-label" for="message">Brief Project Outline</label>
                <textarea id="message" rows="5"
                          wire:model.defer="message"
                          class="ax-input"
                          placeholder="What are you building? Goals, timeline, compliance constraints (e.g., GDPR / SOC‑2)…"
                          @error('message') aria-invalid="true" aria-describedby="err-message" @enderror></textarea>
                @error('message') <p id="err-message" class="ax-error" role="alert">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="ax-btn-submit">
                Send & Book Slot →
            </button>
        </form>

    {{-- Thank-you card (after submit) --}}
    @else
        <div wire:key="lead-thanks"
             class="ax-success p-10 text-center space-y-4"
             aria-live="polite">
            <h3 class="text-2xl font-bold">Thank you! 🎉</h3>
            <p>
                We’ve received your message and will reply within one business day.
            </p>
            <button wire:click="$set('sent', false)" class="ax-link" type="button">
                ← Send another message
            </button>
        </div>
    @endif

</div>
