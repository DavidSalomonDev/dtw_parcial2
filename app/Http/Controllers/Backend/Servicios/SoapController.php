<?php

namespace App\Http\Controllers\Backend\Servicios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SoapController extends Controller
{
    public function calcular(Request $request)
    {
        //validar los datos recibidos
        $request->validate([
            'numero1' => 'required|numeric',
            'numero2' => 'required|numeric',
            'operacion' => 'required|in:Add,Multiply',
        ]);

        try {
            //cliente SOAP usando la URL del servicio
            $client = new \SoapClient("http://www.dneonline.com/calculator.asmx?WSDL");

            //preparar los parámetros para la operación SOAP
            $params = [
                'intA' => $request->input('numero1'),
                'intB' => $request->input('numero2'),
            ];

            //llama al método SOAP 
            $operacion = $request->input('operacion');
            $response = $client->__soapCall($operacion, [$params]);

            //obtiene el resultado del servicio
            $resultado = $response->{$operacion . 'Result'};

            //regresa a la vista con los datos
            return view('soap', [
                'resultado' => $resultado,
                'numero1' => $params['intA'],
                'numero2' => $params['intB'],
                'operacion' => $operacion
            ]);

        } catch (\Exception $e) {
            //retornar a la vista con mensaje de error
            return back()->withErrors(['error' => 'Error al consumir el servicio SOAP: ' . $e->getMessage()]);
        }
    }
}