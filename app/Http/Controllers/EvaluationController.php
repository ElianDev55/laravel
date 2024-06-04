<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Models\User;

class EvaluationController extends Controller
{
    public function index()
    {
        $evaluations = Evaluation::all();
        return view('evaluations.index', compact('evaluations'));
    }

    public function create()
    {
        $users = User::all();
        return view('evaluations.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'evaluator_id' => 'required|exists:users,id',
            'evaluated_id' => 'required|exists:users,id',
            'score' => 'required|integer',
        ]);

        Evaluation::create($request->all());

        return redirect()->route('evaluations.index')
            ->with('success', 'Evaluation created successfully.');
    }

    public function show(Evaluation $evaluation)
    {
        return view('evaluations.show', compact('evaluation'));
    }

    public function edit(Evaluation $evaluation)
    {
        $users = User::all();
        return view('evaluations.edit', compact('evaluation', 'users'));
    }

    public function update(Request $request, Evaluation $evaluation)
    {
        $request->validate([
            'evaluator_id' => 'required|exists:users,id',
            'evaluated_id' => 'required|exists:users,id',
            'score' => 'required|integer',
        ]);

        $evaluation->update($request->all());

        return redirect()->route('evaluations.index')
            ->with('success', 'Evaluation updated successfully.');
    }

    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();

        return redirect()->route('evaluations.index')
            ->with('success', 'Evaluation deleted successfully.');
    }
}
