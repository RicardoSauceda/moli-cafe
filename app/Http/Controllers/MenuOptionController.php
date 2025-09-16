<?php

namespace App\Http\Controllers;

use App\Models\MenuOption;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MenuOptionController extends Controller
{
    public function index()
    {
        $options = MenuOption::orderBy('option_name')->get();
        return view('menu-options.index', compact('options'));
    }

    public function edit(MenuOption $menuOption)
    {
        return view('menu-options.edit', compact('menuOption'));
    }

    public function update(Request $request, MenuOption $menuOption)
    {
        $validated = $request->validate([
            'option_name' => ['required', 'string', 'max:255', Rule::unique('menu_options', 'option_name')->ignore($menuOption->id)],
            'status' => ['required', 'boolean'],
        ]);

        $menuOption->update($validated);

        return redirect()->route('menu-options.index')->with('status', 'Opción actualizada correctamente');
    }
}
