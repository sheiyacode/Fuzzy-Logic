<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuzzyController extends Controller
{
    public function proses(Request $request)
    {
        // =========================
        // 1️⃣ INPUT CRISP
        // =========================
        $jumlahBuku   = $request->jumlah_buku;     // contoh: 2
        $keterlambatan = $request->keterlambatan; // contoh: 3
        $frekuensi    = $request->frekuensi;      // contoh: 5
        
        // =========================
        // 2️⃣ FUZZIFIKASI
        // =========================
        
        // Jumlah Buku
        $sedikit = ($jumlahBuku <= 0) ? 1 :
                   (($jumlahBuku >= 2) ? 0 : (2 - $jumlahBuku) / 2);

        $sedang = ($jumlahBuku <= 1 || $jumlahBuku >= 4) ? 0 :
                  (($jumlahBuku == 3) ? 1 :
                  (($jumlahBuku < 3) ? ($jumlahBuku - 1) / 2 : (4 - $jumlahBuku)));

        $banyak = ($jumlahBuku <= 3) ? 0 :
                  (($jumlahBuku >= 5) ? 1 : ($jumlahBuku - 3) / 2);

        // Keterlambatan
        $tepat = ($keterlambatan <= 0) ? 1 :
                 (($keterlambatan >= 2) ? 0 : (2 - $keterlambatan) / 2);

        $terlambat = ($keterlambatan <= 1 || $keterlambatan >= 7) ? 0 :
                     (($keterlambatan == 4) ? 1 :
                     (($keterlambatan < 4) ? ($keterlambatan - 1) / 3 : (7 - $keterlambatan) / 3));

        $sangatTerlambat = ($keterlambatan <= 5) ? 0 :
                           (($keterlambatan >= 14) ? 1 : ($keterlambatan - 5) / 9);

        // Frekuensi
        $jarang = ($frekuensi <= 0) ? 1 :
                  (($frekuensi >= 3) ? 0 : (3 - $frekuensi) / 3);

        $cukup = ($frekuensi <= 2 || $frekuensi >= 6) ? 0 :
                 (($frekuensi == 4) ? 1 :
                 (($frekuensi < 4) ? ($frekuensi - 2) / 2 : (6 - $frekuensi) / 2));

        $sering = ($frekuensi <= 5) ? 0 :
                  (($frekuensi >= 10) ? 1 : ($frekuensi - 5) / 5);

        // =========================
        // 3️⃣ INFERENSI (RULE BASE)
        // =========================

        $rules = [];

        // Rule 1: Sangat Terlambat → Tidak Layak
        $rules[] = [
            'alpha' => $sangatTerlambat,
            'z' => 0
        ];

        // Rule 5: Sedang & Terlambat → Dipertimbangkan
        $rules[] = [
            'alpha' => min($sedang, $terlambat),
            'z' => 50
        ];

        // Rule 11: Sedang & Cukup → Dipertimbangkan
        $rules[] = [
            'alpha' => min($sedang, $cukup),
            'z' => 50
        ];

        // Rule 8: Tepat Waktu & Cukup → Layak
        $rules[] = [
            'alpha' => min($tepat, $cukup),
            'z' => 100
        ];

        // =========================
        // 4️⃣ DEFUZZIFIKASI (SUGENO)
        // =========================

        $atas = 0;
        $bawah = 0;

        foreach ($rules as $rule) {
            $atas += $rule['alpha'] * $rule['z'];
            $bawah += $rule['alpha'];
        }

        $hasil = ($bawah == 0) ? 0 : $atas / $bawah;
        
        // =========================
        // 5️⃣ KEPUTUSAN AKHIR
        // =========================
        if ($hasil >= 80) {
            $keputusan = "Layak";
        } elseif ($hasil >= 40) {
            $keputusan = "Dipertimbangkan";
        } else {
            $keputusan = "Tidak Layak";
        }
        
        return view('hasil', compact(
            'jumlahBuku',
            'keterlambatan',
            'frekuensi',
            'hasil',
            'keputusan'
        ));
    }
}