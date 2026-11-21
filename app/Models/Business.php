<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tagline',
        'logo_path',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'phone',
        'phone_alt',
        'email',
        'website',
        'rc_number',
        'tin',
        'show_tin',
        'signature_path',
        'stamp_path',
        'vat_rate_bps',
        'default_vat_mode',
        'default_terms',
        'default_notes',
        'footer_text',
    ];

    protected function casts(): array
    {
        return [
            'vat_rate_bps' => 'integer',
            'show_tin' => 'boolean',
        ];
    }

    /**
     * Get or create the primary active business profile.
     */
    public static function current(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            [
                'name' => 'KUIT LIMITED',
                'tagline' => 'Marine Logistics, Construction Equipment & Engineering Services',
                'address_line1' => '132 Airport Road, Effurun-Warri',
                'address_line2' => 'Delta State, Nigeria',
                'city' => 'Effurun-Warri',
                'state' => 'Delta State',
                'phone' => '(+234) 803 280 2038',
                'email' => 'info@kuitltd.com',
                'website' => 'https://kuitltd.com',
                'rc_number' => 'RC 806865',
                'tin' => '',
                'vat_rate_bps' => 750,
                'default_vat_mode' => 'exclusive',
                'default_terms' => "1. Payment is due according to specified contract terms.\n2. Equipment, marine charter, and materials remain property of KUIT LIMITED until contract obligations are discharged.\n3. All operations comply with industry safety standards and certified engineering practices.",
                'default_notes' => 'Thank you for choosing KUIT LIMITED for your marine, construction, and engineering requirements.',
                'footer_text' => 'Thank you for your business. KUIT LIMITED (RC 806865) — Operational Base: Effurun-Warri, Delta State.',
            ]
        );
    }

    public function bankAccounts(): HasMany
    {
        return $this->hasMany(BusinessBankAccount::class)->orderBy('sort_order');
    }

    public function templates(): HasMany
    {
        return $this->hasMany(InvoiceTemplate::class);
    }

    public function defaultTemplate(): HasOne
    {
        return $this->hasOne(InvoiceTemplate::class)->where('is_default', true);
    }

    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class);
    }

    public function catalogItems(): HasMany
    {
        return $this->hasMany(InvoiceItemCatalog::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function numberSequences(): HasMany
    {
        return $this->hasMany(InvoiceNumberSequence::class);
    }
}
