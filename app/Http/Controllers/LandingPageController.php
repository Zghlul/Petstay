<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // UBAH INI: Ambil SEMUA data kamar, tambahkan 'id_kamar' dan 'foto', dan HAPUS 'unique'
        $rooms = Kamar::select('id_kamar', 'tipe_kamar', 'harga_per_malam', 'fasilitas', 'status_kamar', 'foto')
            ->get(); 

        // Ambil data layanan yang tersedia
        $services = Layanan::all();

        return view('welcome', compact('rooms', 'services'));
    }

    public function services()
    {
        $services = Layanan::all();
        return view('services', compact('services'));
    }

    public function rooms()
    {

        $rooms = Kamar::select('id_kamar', 'tipe_kamar', 'harga_per_malam', 'fasilitas', 'status_kamar', 'foto')
            ->get(); 

        return view('rooms', compact('rooms'));
    }

    public function whyUs()
    {
        return view('why-us');
    }
}