<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathController extends Controller
{
    public function rumusTambahKuadrat()
    {
        $arr = [5, 3, 6, 2, '7'];

        $squared_arr = collect($arr)->map(function ($item) {
            return is_numeric($item) ? (int)$item * (int)$item : 0; 
        });

        $total = $squared_arr->reduce(function ($carry, $item) {
            return $carry + $item;
        }, 0);

        return "Hasil penjumlahan bilangan kuadrat dalam array: " . $total;
    }
}
