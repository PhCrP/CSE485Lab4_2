<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reader;

class ReaderController extends Controller
{
    public function index()
    {
        $readers = Reader::all();
        return view('readers.index', compact('readers'));
    }

    public function create()
    {
        return view('readers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birthday' => 'required|date',
            'address' => 'required',
            'phone' => 'required',
        ]);

        Reader::create($request->all());

        return redirect()->route('readers.index')->with('success', 'Reader added successfully!');
    }

    public function cancel()
    {
        return redirect()->route('readers.index')->with('warning', 'Reader creation canceled!');
    }


    public function show($id)
    {
        $reader = Reader::findOrFail($id);
        return view('readers.show', compact('reader'));
    }

    public function edit($id)
    {
        $reader = Reader::findOrFail($id);
        return view('readers.edit', compact('reader'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'birthday' => 'required|date',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $reader = Reader::findOrFail($id);
        $reader->update($request->all());
        return redirect()->route('readers.index')->with('success', 'Reader updated successfully.');
    }

    public function destroy($id)
    {
        $reader = Reader::findOrFail($id);
        $reader->delete();
        return redirect()->route('readers.index')->with('success', 'Reader deleted successfully.');
    }
}
