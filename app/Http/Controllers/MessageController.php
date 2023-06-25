<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MessageController extends Controller
{
    public function send(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'target' => 'required',
            'message' => 'required',
            'delay' => 'required',
            'countryCode' => 'required|size:2',
        ]);

        // Cek validasi
        if ($validator->fails()) {
            return back()->with(['errors' => $validator->errors()]);
        }
        // Ambil data dari permintaan POST
        $target = $request->input('target');
        $message = $request->input('message');
        $delay = $request->input('delay');
        $countryCode = $request->input('countryCode');
        // Membuat objek Guzzle Client
        $client = new Client();

        try {
            // Menyiapkan header otorisasi
            $headers = [
                'Authorization' => env("TOKEN_WA"), // Mengambil token dari file env
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ];

            // Kirim permintaan POST ke API luar dengan header otorisasi
            $response = $client->post('https://api.fonnte.com/send', [
                'headers' => $headers,
                'json' => [
                    'target' => $target,
                    'message' => $message,
                    'delay' => $delay,
                    'countryCode' => $countryCode,
                ]
            ]);

            return redirect('/')->with('success', 'Pesan berhasil dikirim');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect('/')->with('error', 'Pesan gagal dikirim');
        }
    }
}
