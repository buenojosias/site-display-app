<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Quiz;
use App\Models\QuizRecord;

class QuizController extends Controller
{
    public function index() {
        $quizzes = Quiz::
        with(['alternatives','thumbnail'])
        ->where('active', 1)
        ->whereHas('alternatives')
        ->whereHas('thumbnail')
        ->inRandomOrder()
        ->first();
        return $quizzes;
    }

    public function getTest($id) {
        $quiz = Quiz::
        with(['alternatives','thumbnail'])
        ->where('active', 1)
        ->whereHas('alternatives')
        ->whereHas('thumbnail')
        ->where('type', 'TEST')
        ->where('id', '<>', $id)
        ->inRandomOrder()
        ->first();
        return $quiz;
    }

    public function registerRecord(Request $request) {
        $validator = Validator::make($request->all(), [
            "quiz_id" =>  "required|numeric",
            "alternative" =>  "nullable|numeric",
            "driver_id" => "nullable|numeric",
        ]);
        if($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        }
        //return $request;
        try {
            QuizRecord::create([
                'quiz_id' => $request->quiz_id,
                'alternative' => $request->alternative,
                'driver_id' => $request->driver_id,
            ]);
            return response()->json(["status" => "success", "message" => "Registro salvo"]);
        } catch (\Throwable $th) {
            return response()->json(["status" => "failed", "message" => $th]);
        }
    }
}
