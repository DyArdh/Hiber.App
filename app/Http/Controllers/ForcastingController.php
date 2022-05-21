<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForcastingController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function exponentialSmoothing($periode, $dataset)
    {
        // Adaptive Response Rate Single Exponential Smoothing
        // F[periode ke-t] = (alpha[t] * X[t]) + ((1 - alpha[t]) * F[t])
        $X = $dataset; // dataset
        $F = []; // peramalan
        $e = []; // error/kesalahan
        $E = []; // error dihaluskan
        $AE = []; //error absolut
        $alpha = []; // konstanta smoothing
        $beta = [0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9]; // range alpha
        $PE = []; // persentase error
        $MAPE = []; // rata rata kesalahan

        // perhitungan peramalan menggunakan nilai beta mulai dari 0.1 sampai 0.9
        for($i = 0; $i < count($beta); $i++) {
            // inisialisasi
            $F[$i][0] = $e[$i][0] = $E[$i][0] = $AE[$i][0] = $alpha[$i][0] = $PE[$i][0] = 0;
            $F[$i][1] = $X[0];
            $alpha[$i][1] = $beta[$i];

            for($j = 1; $j < count($periode); $j++){
                // perhitungan peramalan untuk periode berikutnya
                $F[$i][$j + 1] = ($alpha[$i][$j] * $X[$j]) + ((1 - $alpha[$i][$j]) * $F[$i][$j]);

                // menghitung selisih antara nilai aktual dengan hasil peramalan
                $e[$i][$j] = $X[$j] - $F[$i][$j]; 

                // menghitung nilai kesalahan peramalan yang dihaluskan
                $E[$i][$j] = ($beta[$i] * $e[$i][$j]) + ((1 - $beta[$i]) * $E[$i][$j - 1]);

                // menghitung nilai kesalahan absolut peramalan yang dihaluskan
                $AE[$i][$j] = ($beta[$i] * abs($e[$i][$j])) + ((1 - $beta[$i]) * $AE[$i][$j - 1]);

                // menghitung nilai alpha untuk periode berikutnya
                $alpha[$i][$j + 1] = $E[$i][$j] == 0 ? $beta[$i] : abs($E[$i][$j] / $AE[$i][$j]);

                // menghitung nilai kesalahan persentase peramalan
                $PE[$i][$j] = $X[$j] == 0 ? 0 : abs((($X[$j] - $F[$i][$j]) / $X[$j]) * 100);
            }

            // menghitung rata-rata kesalahan peramalan
            $MAPE[$i] = array_sum($PE[$i])/(count($periode) - 1);
        }
        
        // mendapatkan index beta dengan nilai mape terkecil
        $bestBetaIndex = array_search(min($MAPE), $MAPE);

        // menyatukan semua hasil perhitungan dan menginputkan hasil peramalan periode berikutnya
        $result = [];
        for ($i = 0; $i <= count($periode); $i++) {
            $result[$i] = round($F[$bestBetaIndex][$i]);
        }
        
        // masukkan hasil, beta, dan mape tebaik ke array
        $final = [
            'result' => $result,
            'last' => end($result),
            'mape' => $MAPE[$bestBetaIndex],
        ];
        
        return $final;
    }
}
