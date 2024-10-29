<?php

namespace App\Http\Controllers;
use app\Http\Models\Carro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CarroController extends Controller
{
    public function index()
    {
        $carros = Carro::all();
        return response()->json([
            'status' => true,
            'message' => 'Customers retrieved successfully',
            'data' => $carros
        ], 200);
    }


    public function show($id)
    {
        $carro = Carro::findOrFail($id);

     	return response()->json([
            'status' => true,
            'message' => 'Customer found successfully',
            'data' => $carro
        ], 200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:200',
            'ano' => 'required|numeric',
            'autor' => 'required|string|max:150',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $carro = Carro::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Customer created successfully',
            'data' => $Carro
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:200',
            'ano' => 'required|numeric',
            'autor' => 'required|string|max:150',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }


        $carro = Carro::findOrFail($id);
        $carro->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Customer updated successfully',
            'data' => $carro
        ], 200);
    }



    public function destroy($id)
    {
        $test = Test::findOrFail($id);
       
        if ($test) {
            $test->delete();
            return response()->json(['message' => 'Registro deletado com sucesso'], 200);
        } else {
            return response()->json(['error' => 'Registro não encontrado'], 404);
        }
   }
}

