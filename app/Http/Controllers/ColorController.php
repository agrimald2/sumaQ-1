<?php

namespace App\Http\Controllers;

use App\mae_color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        return mae_color::all();
    }

    public function post(Request $request)
    {
        $color = mae_color::create([
            'color_name' => $request['color_name'],
            'color_code' => $request['color_code'],
        ]);

        if($color) return [ "status" => "success", "message" => "Color creado con éxito"];
        return [ "status" => "error", "message" => "Error al registrar color"];
    }

    public function destroy($id)
    {
        mae_color::destroy($id);
        return [ "status" => "success", "message" => "Eliminado"];
    }
}
