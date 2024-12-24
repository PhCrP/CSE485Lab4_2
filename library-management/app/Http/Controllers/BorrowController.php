<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Reader;
use App\Models\Book;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with(['reader', 'book'])->get();
        return view('borrows.index', compact('borrows'));
    }

    public function create()
    {
        $readers = Reader::all();
        $books = Book::all();
        return view('borrows.create', compact('readers', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reader_id' => 'required|exists:readers,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        Borrow::create($request->all());

        return redirect()->route('borrows.index')->with('success', 'Borrow entry added successfully!');
    }

    public function cancel()
    {
        return redirect()->route('borrows.index')->with('warning', 'Borrow creation canceled!');
    }


    public function show($id)
    {
        $borrow = Borrow::with(['reader', 'book'])->findOrFail($id);
        return view('borrows.show', compact('borrow'));
    }

    public function edit($id)
    {
        $borrow = Borrow::findOrFail($id);
        $readers = Reader::all();
        $books = Book::all();
        return view('borrows.edit', compact('borrow', 'readers', 'books'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reader_id' => 'required|exists:readers,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after:borrow_date',
        ]);

        $borrow = Borrow::findOrFail($id);
        $borrow->update($request->all());
        return redirect()->route('borrows.index')->with('success', 'Borrow record updated successfully.');
    }

    public function destroy($id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();
        return redirect()->route('borrows.index')->with('success', 'Borrow record deleted successfully.');
    }
}
