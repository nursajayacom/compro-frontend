<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('dashboard.brands.index', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255|unique:brands']);
        Brand::create(['name' => $request->name]);

        return redirect()->route('brands.index')->with('success', 'Brand created successfully!');
    }

    public function edit(Brand $brand)
    {
        return response()->json($brand);
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate(['name' => 'required|string|max:255|unique:brands,name,' . $brand->id]);
        $brand->update(['name' => $request->name]);

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully!');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully!');
    }
}
