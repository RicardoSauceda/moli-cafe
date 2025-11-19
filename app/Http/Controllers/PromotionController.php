<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PromotionController extends Controller
{
    /**
     * Display a listing of the promotions.
     */
    public function index()
    {
        $promotions = Promotion::orderBy('position', 'asc')->get();

        return view('promotions.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new promotion.
     */
    public function create()
    {
        return view('promotions.create');
    }

    /**
     * Store a newly created promotion in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'promotion_type' => 'required|in:percentage,fixed_amount,special_price',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'discount_amount' => 'nullable|numeric|min:0',
            'price' => 'nullable|numeric|min:0',
            'validity_start' => 'nullable|date',
            'validity_end' => 'nullable|date|after_or_equal:validity_start',
            'validity_description' => 'nullable|string|max:200',
            'is_active' => 'boolean',
            'position' => 'nullable|integer|min:0',
        ]);

        // Guardar imagen si se proporciona
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('promotions', 'public');
            $validated['image_path'] = $imagePath;
        }

        // Establecer posición por defecto
        if (empty($validated['position'])) {
            $maxPosition = Promotion::max('position');
            $validated['position'] = ($maxPosition ?? -1) + 1;
        }

        Promotion::create($validated);

        return redirect()->route('promotions.index')
            ->with('success', 'Promoción creada exitosamente.');
    }

    /**
     * Show the form for editing the specified promotion.
     */
    public function edit(Promotion $promotion)
    {
        return view('promotions.edit', compact('promotion'));
    }

    /**
     * Update the specified promotion in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'promotion_type' => 'required|in:percentage,fixed_amount,special_price',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'discount_amount' => 'nullable|numeric|min:0',
            'price' => 'nullable|numeric|min:0',
            'validity_start' => 'nullable|date',
            'validity_end' => 'nullable|date|after_or_equal:validity_start',
            'validity_description' => 'nullable|string|max:200',
            'is_active' => 'boolean',
            'position' => 'nullable|integer|min:0',
        ]);

        // Manejar actualización de imagen
        if ($request->hasFile('image_path')) {
            // Eliminar imagen anterior si existe
            if ($promotion->image_path) {
                Storage::disk('public')->delete($promotion->image_path);
            }

            $imagePath = $request->file('image_path')->store('promotions', 'public');
            $validated['image_path'] = $imagePath;
        }

        // Establecer posición por defecto si está vacía
        if (empty($validated['position'])) {
            $maxPosition = Promotion::max('position');
            $validated['position'] = ($maxPosition ?? -1) + 1;
        }

        $promotion->update($validated);

        return redirect()->route('promotions.index')
            ->with('success', 'Promoción actualizada exitosamente.');
    }

    /**
     * Remove the specified promotion from storage.
     */
    public function destroy(Promotion $promotion)
    {
        // Eliminar imagen si existe
        if ($promotion->image_path) {
            Storage::disk('public')->delete($promotion->image_path);
        }

        $promotion->delete();

        return redirect()->route('promotions.index')
            ->with('success', 'Promoción eliminada exitosamente.');
    }

    /**
     * Toggle promotion active status
     */
    public function toggleActive(Promotion $promotion)
    {
        $promotion->update(['is_active' => !$promotion->is_active]);

        $status = $promotion->is_active ? 'activada' : 'desactivada';

        return redirect()->route('promotions.index')
            ->with('success', "Promoción $status exitosamente.");
    }

    /**
     * Reorder promotions
     */
    public function reorder(Request $request)
    {
        $order = $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer',
        ]);

        foreach ($order['order'] as $position => $promotionId) {
            Promotion::where('id', $promotionId)->update(['position' => $position]);
        }

        return response()->json(['success' => true]);
    }
}
