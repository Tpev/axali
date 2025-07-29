<?php
namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\{Deal, Customer};
use Illuminate\Validation\Rule;

class DealCreate extends Component
{
    /** ─── Form fields ───────────────────────────── */
    public string $dealName    = '';
    public ?int   $customerId  = null;
    public string $customerNew = '';
    public ?int   $ownerId     = null;
    public ?int   $valueEst    = null;  // dollars
    public string $stage       = 'lead';

    public bool $open = false;          // modal toggle

    protected function rules(): array
    {
        return [
            'dealName'    => ['required','string','max:120'],
            'customerId'  => ['nullable', Rule::exists('customers','id')],
            'customerNew' => ['nullable','string','max:120', Rule::requiredIf(fn()=>!$this->customerId)],
            'ownerId'     => ['required', Rule::exists('users','id')],
            'valueEst'    => ['nullable','integer','min:0'],
            'stage'       => ['required', Rule::in(['lead','quoted','active','closing','won','lost'])],
        ];
    }

    /** ─── Save ───────────────────────────────────── */
    public function save(): void
    {
        $this->validate();

        $customerId = $this->customerId ?: Customer::create([
            'company_name'  => $this->customerNew,
            'contact_first' => '',
            'contact_last'  => '',
            'contact_email' => '',
        ])->id;

        Deal::create([
            'name'       => $this->dealName,
            'customer_id'=> $customerId,
            'owner_id'   => $this->ownerId,
            'value_est'  => $this->valueEst ?? 0,
            'stage'      => $this->stage,
        ]);

        // reset & close
        $this->reset(['dealName','customerId','customerNew','ownerId','valueEst','stage','open']);

        // ask parent board to refresh
        $this->dispatch('deal-created');
    }

    public function render()
    {
        return view('livewire.admin.deal-create', [
            'customers' => Customer::orderBy('company_name')->get(),
            'owners'    => \App\Models\User::where('is_admin',true)->get(),
        ]);
    }
}
