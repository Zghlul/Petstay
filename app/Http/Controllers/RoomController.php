<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        // 1. Ambil 1 kamar Standard
        $standardRoom = Kamar::where('tipe_kamar', 'standard')->first();

        // 2. Ambil 1 kamar Deluxe
        $deluxeRoom = Kamar::where('tipe_kamar', 'deluxe')->first();

        // 3. Ambil 1 kamar VIP
        $vipRoom = Kamar::where('tipe_kamar', 'vip')->first();

        // Kirim data ke view 'rooms.blade.php'
        return view('rooms', compact('standardRoom', 'deluxeRoom', 'vipRoom'));
    }
}
