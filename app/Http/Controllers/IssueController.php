<?php
namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IssueController extends Controller
{
    // 1. Sabhi Issued Books ki list
    public function index()
    {
        $issues = Issue::with('book','member')->latest()->paginate(10);
        return view('issues.index', compact('issues'));
    }

    // 2. Issue Form dikhana
    public function create()
    {
        $books = Book::where('quantity','>',0)->get(); // sirf available books
        $members = Member::all();
        return view('issues.create', compact('books','members'));
    }

    // 3. Book Issue karna
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required',
            'member_id' => 'required',
            'issue_date' => 'required|date'
        ]);

        Issue::create($request->all());

        // Book ki quantity 1 kam karo
        $book = Book::find($request->book_id);
        $book->decrement('quantity');

        return redirect()->route('issues.index')->with('success','Book Issue ho gayi!');
    }

    // 4. Book Return karna + Fine calculate
    public function returnBook($id)
    {
        $issue = Issue::find($id);
        $issue->return_date = Carbon::now()->format('Y-m-d');
        $issue->status = 'returned';

        // Fine logic: 15 din ke baad ₹5 per day
        $issue_date = Carbon::parse($issue->issue_date);
        $days = $issue_date->diffInDays(Carbon::now());
        if($days > 15){
            $issue->fine = ($days - 15) * 5;
        }
        $issue->save();

        // Book ki quantity 1 badhao
        $issue->book->increment('quantity');

        return redirect()->route('issues.index')->with('success','Book Return ho gayi! Fine: ₹'.$issue->fine);
    }

    // 5. Delete
    public function destroy(Issue $issue)
    {
        $issue->delete();
        return redirect()->route('issues.index')->with('success','Record delete!');
    }
}
