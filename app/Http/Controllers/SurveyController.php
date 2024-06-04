<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::first();
        return view('surveys.show', compact('surveys'));
    }

    public function create()
    {
        return view('surveys.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Survey::create($request->all());

        return redirect()->route('surveys.index')
            ->with('success', 'Survey created successfully.');
    }

    public function show()
    {
        $survey = Survey::first();
        if ($survey === null) {
            return redirect()->route('surveys.index')
                ->with('error', 'No surveys available.');
        }
        return view('surveys.show', compact('survey'));
    }

    public function edit(Survey $survey)
    {
        return view('surveys.edit', compact('survey'));
    }

    public function update(Request $request, Survey $survey)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $survey->update($request->all());

        return redirect()->route('surveys.index')
            ->with('success', 'Survey updated successfully');
    }

    public function destroy(Survey $survey)
    {
        $survey->delete();

        return redirect()->route('surveys.index')
            ->with('success', 'Survey deleted successfully');
    }
}