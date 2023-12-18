<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controlador21 extends Controller
{
    public function getAnimales() {
        $animales = ['Tigre',"\n", 'Leon',"\n",'Gazela',"\n",'Hiena',"\n",'Tortuga'];

        return response()->json(['mensaje' => 'Estos son mis animales', 'datos' => $animales]);
    }
}
