<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoapController extends Controller
{
    /**
     * Muestra el formulario de operaciones
     */
    public function index()
    {
        return view('operaciones');

    }

    /**
     * Procesa la petición SOAP y retorna la vista con el resultado
     */
    public function operar(Request $request)
    {
        $data = $request->validate([
            'numero1' => 'required|integer',
            'numero2' => 'required|integer',
            'operacion' => 'required|in:sumar,multiplicar',
        ]);

        $wsdl = env('SOAP_WSDL', 'http://www.dneonline.com/calculator.asmx?WSDL');
        $client = new \SoapClient($wsdl);

        $params = ['intA' => $data['numero1'], 'intB' => $data['numero2']];

        if ($data['operacion'] === 'sumar') {
            $resp = $client->Add($params);
            $resultado = $resp->AddResult;
        } else {
            $resp = $client->Multiply($params);
            $resultado = $resp->MultiplyResult;
        }

        return view('operaciones', compact('resultado', 'data'));
    }
}
