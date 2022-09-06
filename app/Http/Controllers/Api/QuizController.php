<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;

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
}
