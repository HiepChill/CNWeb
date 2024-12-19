<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Issue;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    public function index()
    {
        $issues = Issue::with('computer')->paginate(10);
        return view('issues.index', compact('issues'));
    }

    public function create()
    {
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required|max:50',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required',
        ]);

        // Issue::create($request->all());
        Issue::create([
            'computer_id' => $request->computer_id,
            'reported_by' => $request->reported_by,
            'reported_date' => $request->reported_date,
            'description' => $request->description,
            'urgency' => $request->urgency,
            'status' => 'Open', // Mặc định giá trị là Open
        ]);

        return redirect()->route('issues.index')->with('Sucess!');
    }

    public function edit($id)
    {
        $issue = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required',
        ]);

        $issues = Issue::find($id);

        $issues->update($request->all());

        return redirect()->route('issues.index')->with('Sucess!');
    }


    public function destroy($id)
    {
        $issues = Issue::findOrFail($id);
        $issues->delete();

        return redirect()->route('issues.index')->with('Sucess!');
    }
}
