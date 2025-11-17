<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class Promotion extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'discount_percentage',
        'discount_amount',
        'price',
        'validity_start',
        'validity_end',
        'validity_description',
        'promotion_type',
        'is_active',
        'position',
    ];

    protected $casts = [
        'validity_start' => 'datetime',
        'validity_end' => 'datetime',
        'discount_percentage' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Obtener todas las promociones activas ordenadas por posición
     */
    public static function getActive()
    {
        return self::where('is_active', true)
            ->orderBy('position', 'asc')
            ->get();
    }

    /**
     * Obtener promociones vigentes (considerando fechas)
     */
    public static function getActiveAndValid()
    {
        $now = Carbon::now();

        return self::where('is_active', true)
            ->where(function ($query) use ($now) {
                $query->whereNull('validity_start')
                    ->orWhere('validity_start', '<=', $now);
            })
            ->where(function ($query) use ($now) {
                $query->whereNull('validity_end')
                    ->orWhere('validity_end', '>=', $now);
            })
            ->orderBy('position', 'asc')
            ->get();
    }

    /**
     * Verificar si la promoción está vigente
     */
    public function isValid(): bool
    {
        $now = Carbon::now();

        if (!$this->is_active) {
            return false;
        }

        if ($this->validity_start && $this->validity_start->gt($now)) {
            return false;
        }

        if ($this->validity_end && $this->validity_end->lt($now)) {
            return false;
        }

        return true;
    }

    /**
     * Obtener texto de validez formateado
     */
    public function getValidityText(): string
    {
        if ($this->validity_description) {
            return $this->validity_description;
        }

        if ($this->validity_start && $this->validity_end) {
            return 'Válido de ' . $this->validity_start->format('d/m/Y') . ' al ' . $this->validity_end->format('d/m/Y');
        }

        if ($this->validity_start) {
            return 'Válido desde ' . $this->validity_start->format('d/m/Y');
        }

        if ($this->validity_end) {
            return 'Válido hasta ' . $this->validity_end->format('d/m/Y');
        }

        return 'Promoción vigente';
    }

    /**
     * Get discount badge text
     */
    public function getDiscountBadge(): string
    {
        if ($this->promotion_type === 'percentage' && $this->discount_percentage) {
            return '-' . number_format($this->discount_percentage, 0) . '%';
        }

        if ($this->promotion_type === 'fixed_amount' && $this->discount_amount) {
            return '-$' . number_format($this->discount_amount, 2);
        }

        if ($this->promotion_type === 'special_price' && $this->price) {
            return '$' . number_format($this->price, 2);
        }

        return '-30%';
    }

    /**
     * Scope: promociones activas
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: promociones vigentes en fecha
     */
    public function scopeValid($query)
    {
        $now = Carbon::now();

        return $query->where(function ($q) use ($now) {
            $q->whereNull('validity_start')
                ->orWhere('validity_start', '<=', $now);
        })
            ->where(function ($q) use ($now) {
                $q->whereNull('validity_end')
                    ->orWhere('validity_end', '>=', $now);
            });
    }
}
