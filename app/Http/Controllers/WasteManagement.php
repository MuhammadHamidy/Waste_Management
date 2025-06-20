<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WasteCollection;
use App\Models\User;

class WasteManagement extends Controller
{
    public function index(Request $request)
    {
        $query = WasteCollection::query();
        // Filter
        if ($request->filled('filter_date')) {
            $query->where('date', $request->filter_date);
        }
        if ($request->filled('filter_region')) {
            $query->where('region', $request->filter_region);
        }
        if ($request->filled('filter_customer')) {
            $query->where('customer', 'like', '%' . $request->filter_customer . '%');
        }
        $data = $query->orderBy('date', 'desc')->paginate(10);
        // Statistik
        $totalOrganik = WasteCollection::where('waste_type', 'Organik')->sum('weight');
        $totalPlastik = WasteCollection::where('waste_type', 'Plastik')->sum('weight');
        $totalLogam   = WasteCollection::where('waste_type', 'Logam')->sum('weight');
        $totalNasabah = WasteCollection::distinct('customer')->count('customer');
        $today = date('Y-m-d');
        $totalSampahHariIni = WasteCollection::where('date', $today)->sum('weight');
        $nasabahAktifHariIni = WasteCollection::where('date', $today)->distinct('customer')->count('customer');
        $pengumpulanHariIni = WasteCollection::where('date', $today)->count();
        return view('index', compact(
            'data',
            'totalOrganik',
            'totalPlastik',
            'totalLogam',
            'totalNasabah',
            'totalSampahHariIni',
            'nasabahAktifHariIni',
            'pengumpulanHariIni'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer' => 'required|string|max:100',
            'region' => 'required',
            'waste_type' => 'required',
            'method' => 'required',
            'weight' => 'required|numeric',
            'date' => 'required|date',
        ]);

        WasteCollection::create([
            'customer'   => $request->customer,
            'region'     => $request->region,
            'waste_type' => $request->waste_type,
            'method'     => $request->method,
            'weight'     => $request->weight,
            'date'       => $request->date,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $waste = WasteCollection::findOrFail($id);
        $users = User::all();
        return view('edit_waste', compact('waste', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer' => 'required|string|max:100',
            'region' => 'required',
            'waste_type' => 'required',
            'method' => 'required',
            'weight' => 'required|numeric',
            'date' => 'required|date',
        ]);
        $waste = WasteCollection::findOrFail($id);
        $waste->update($request->only(['customer', 'region', 'waste_type', 'method', 'weight', 'date']));
        return redirect()->route('dashboard')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $waste = WasteCollection::findOrFail($id);
        $waste->delete();
        return redirect()->route('dashboard')->with('success', 'Data berhasil dihapus');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
        \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->back()->with('success', 'Nasabah berhasil ditambahkan');
    }
}
