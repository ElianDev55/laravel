<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\User;
use App\Models\Question;

class AnswerController extends Controller
{
    public function index()
    {
        $answers = Answer::all();
        return view('answers.index', compact('answers'));
    }

    public function create()
    {
        $users = User::all();
        $questions = Question::all();
        return view('answers.create', compact('users', 'questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'question_id' => 'required|exists:questions,id',
            'answer_text' => 'nullable',
            'answer_value' => 'nullable|integer',
        ]);

        Answer::create($request->all());

        return redirect()->route('answers.index')
            ->with('success', 'Answer created successfully.');
    }

    public function show(Answer $answer)
    {
        return view('answers.show', compact('answer'));
    }

    public function edit(Answer $answer)
    {
        $users = User::all();
        $questions = Question::all();
        return view('answers.edit', compact('answer', 'users', 'questions'));
    }

    public function update(Request $request, Answer $answer)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'question_id' => 'required|exists:questions,id',
            'answer_text' => 'nullable',
            'answer_value' => 'nullable|integer',
        ]);

        $answer->update($request->all());

        return redirect()->route('answers.index')
            ->with('success', 'Answer updated successfully');
    }

    public function destroy(Answer $answer)
    {
        $answer->delete();

        return redirect()->route('answers.index')
            ->with('success', 'Answer deleted successfully');
    }
}
