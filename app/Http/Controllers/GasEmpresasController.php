<?php

namespace App\Http\Controllers;

use App\Models\GasEmpresas;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class GasEmpresasController extends Controller
{
    //
    public function index(Request $request)
    {

        return Inertia::render('modules/gas/Empresas', [
            'empresas' => GasEmpresas::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required',
                'estatus' => 'required'
            ]);
            $request->merge(['estatus' => $request->estatus == 'activa' ? 1 : 0]);
            $empresa = GasEmpresas::create($request->only(['nombre', 'estatus']));


            return back()->with(['title' => 'Correcto', 'message' => 'Empresa creada correctamente']);
        } catch (Exception $e) {
            return redirect()->route('gas.empresas')->with(['status' => 'error', 'message' => 'Error al crear']);
        }
    }
}
