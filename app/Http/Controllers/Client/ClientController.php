<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\PerusahaanModel;
use App\Models\SejarahPerushaan;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Selamat Datang',
            'data' => PerusahaanModel::first(),
            'banner' => SejarahPerushaan::where('status', 'Ya')->first()
        ];
        return view('client.index', $data);
    }
}
