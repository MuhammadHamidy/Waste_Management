@extends('layouts.app')
@section('content')
<div class="container mx-auto max-w-2xl mt-10">
    <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20 shadow-2xl">
        <h2 class="text-2xl font-bold text-white mb-6">Edit Data Sampah</h2>
        <form method="POST" action="{{ route('waste.update', $waste->id) }}" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-white font-semibold">
                        <i class="fas fa-user text-blue-400"></i> Nama Nasabah
                    </label>
                    <input type="text" name="customer" value="{{ $waste->customer }}" class="w-full bg-white/90 border-2 border-white/30 rounded-xl px-4 py-3 text-gray-800" required>
                </div>
                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-white font-semibold">
                        <i class="fas fa-map-marker-alt text-red-400"></i> Wilayah
                    </label>
                    <input type="text" name="region" value="{{ $waste->region }}" class="w-full bg-white/90 border-2 border-white/30 rounded-xl px-4 py-3 text-gray-800" required>
                </div>
                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-white font-semibold">
                        <i class="fas fa-trash text-green-400"></i> Jenis Sampah
                    </label>
                    <select name="waste_type" class="w-full bg-white/90 border-2 border-white/30 rounded-xl px-4 py-3 text-gray-800" required>
                        <option value="Organik" @if($waste->waste_type=='Organik') selected @endif>Organik</option>
                        <option value="Plastik" @if($waste->waste_type=='Plastik') selected @endif>Plastik</option>
                        <option value="Logam" @if($waste->waste_type=='Logam') selected @endif>Logam</option>
                        <option value="Kaca" @if($waste->waste_type=='Kaca') selected @endif>Kaca</option>
                        <option value="B3" @if($waste->waste_type=='B3') selected @endif>B3</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-white font-semibold">
                        <i class="fas fa-truck text-orange-400"></i> Metode Pengumpulan
                    </label>
                    <select name="method" class="w-full bg-white/90 border-2 border-white/30 rounded-xl px-4 py-3 text-gray-800" required>
                        <option value="Door-to-door" @if($waste->method=='Door-to-door') selected @endif>Door-to-door</option>
                        <option value="Drop-off" @if($waste->method=='Drop-off') selected @endif>Drop-off</option>
                        <option value="TPS" @if($waste->method=='TPS') selected @endif>TPS</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-white font-semibold">
                        <i class="fas fa-weight text-purple-400"></i> Berat (kg)
                    </label>
                    <input type="number" name="weight" value="{{ $waste->weight }}" min="0" step="0.01" class="w-full bg-white/90 border-2 border-white/30 rounded-xl px-4 py-3 text-gray-800" required>
                </div>
                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-white font-semibold">
                        <i class="fas fa-calendar text-cyan-400"></i> Tanggal
                    </label>
                    <input type="date" name="date" value="{{ $waste->date }}" class="w-full bg-white/90 border-2 border-white/30 rounded-xl px-4 py-3 text-gray-800" required>
                </div>
            </div>
            <div class="flex justify-end pt-4">
                <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:scale-105 transition-all duration-300 flex items-center gap-2">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 