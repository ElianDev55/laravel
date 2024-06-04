<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Survey;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        $surveys = Survey::all();
        return view('questions.create', compact('surveys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'survey_id' => 'required|exists:surveys,id',
            'question_text' => 'required',
        ]);

        Question::create($request->all());

        return redirect()->route('questions.index')
            ->with('success', 'Question created successfully.');
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        $surveys = Survey::all();
        return view('questions.edit', compact('question', 'surveys'));
    }

    public function update(Request $request, Question $question)
    {
        $request->validate([
            'survey_id' => 'required|exists:surveys,id',
            'question_text' => 'required',
        ]);

        $question->update($request->all());

        return redirect()->route('questions.index')
            ->with('success', 'Question updated successfully');
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index')
            ->with('success', 'Question deleted successfully');
    }
}
