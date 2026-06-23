<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Layanan;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // Ambil 1 kamar VIP/Deluxe terbaik untuk kartu "Boarding"
        $boardingRoom = Kamar::where('tipe_kamar', 'vip')
                             ->orderBy('harga_per_malam', 'desc')
                             ->first();
        
        // Jika tidak ada VIP, ambil Deluxe
        if (!$boardingRoom) {
            $boardingRoom = Kamar::where('tipe_kamar', 'deluxe')
                                 ->orderBy('harga_per_malam', 'desc')
                                 ->first();
        }

        // Ambil 1 layanan dari masing-masing kategori (Grooming, Medis, Pelatihan)
        $grooming = Layanan::where('kategori', 'grooming')->first();
        $medical  = Layanan::where('kategori', 'medis')->first();
        $training = Layanan::where('kategori', 'pelatihan')->first();

        // Kirim data ke view
        return view('services', compact('boardingRoom', 'grooming', 'medical', 'training'));
    }
}