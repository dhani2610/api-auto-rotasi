<?php

// app/Http/Controllers/Api/RotatorController.php
namespace App\Http\Controllers\Api;

use App\Models\Rotator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\LinkAktifController;
use Illuminate\Support\Facades\Log;


class RotatorController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'associated_to' => 'required|string',
            'link_1' => 'nullable|string',
            'link_aktif' => 'nullable|string',
            // Add other fields as needed
        ]);

        $rotator = Rotator::create($data);

        return response()->json($rotator, 201);
    }

    public function index()
    {
        return Rotator::all();
    }

    // Tambahkan method show pada RotatorController di shortlink-app-api
    public function show($identifier)
    {
        try {
            // Coba cari berdasarkan `id`
            $rotator = Rotator::where('id', $identifier)->orWhere('name', $identifier)->firstOrFail();
            
            return response()->json($rotator, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data not found or server error'], 404);
        }
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string',
        'associated_to' => 'required|string',
        'link_1' => 'nullable|string',
        'link_2' => 'nullable|string',
        'link_3' => 'nullable|string',
        'link_4' => 'nullable|string',
        'link_5' => 'nullable|string',
        'link_6' => 'nullable|string',
        'link_7' => 'nullable|string',
        'link_8' => 'nullable|string',
        'link_9' => 'nullable|string',
        'link_10' => 'nullable|string',
        'link_1_status' => 'nullable|string',
        'link_2_status' => 'nullable|string',
        'link_3_status' => 'nullable|string',
        'link_4_status' => 'nullable|string',
        'link_5_status' => 'nullable|string',
        'link_6_status' => 'nullable|string',
        'link_7_status' => 'nullable|string',
        'link_8_status' => 'nullable|string',
        'link_9_status' => 'nullable|string',
        'link_10_status' => 'nullable|string',
    ]);

    try {
        $rotator = Rotator::findOrFail($id);

        // Dapatkan nilai `link_aktif` yang sekarang
        $currentLinkAktif = $rotator->link_aktif;

        // Update rotator dengan data terbaru tanpa menyimpan link_aktif
        $rotator->fill($validatedData);

        // Loop melalui setiap link untuk melihat apakah link_aktif perlu diperbarui
        for ($i = 1; $i <= 10; $i++) {
            $linkField = "link_{$i}";

            // Jika `link_aktif` saat ini sama dengan `link_i` yang akan diperbarui, maka perbarui `link_aktif`
            if ($currentLinkAktif === $rotator->getOriginal($linkField) && isset($validatedData[$linkField])) {
                $rotator->link_aktif = $validatedData[$linkField];
                break;
            }
        }

        // Simpan perubahan ke dalam database
        $rotator->save();

        return response()->json([
            'message' => 'Rotator and link_aktif updated successfully',
            'rotator' => $rotator
        ]);
    } catch (\Exception $e) {
        \Log::error('Failed to update rotator: ' . $e->getMessage());
        return response()->json([
            'error' => 'Failed to update rotator. Please try again.'
        ], 500);
    }
}


    public function destroy($id)
    {
        try {
            $rotator = Rotator::findOrFail($id);
            $rotator->delete();

            return response()->json(['message' => 'Data deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Rotator not found or could not be deleted'], 404);
        }
    }
}
