<?php
namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::latest()->paginate(10);
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|unique:members',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email|unique:members'
        ]);

        Member::create($request->all());
        return redirect()->route('members.index')->with('success','Member add ho gaya!');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'member_id' => 'required|unique:members,member_id,'.$member->id,
            'name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email|unique:members,email,'.$member->id
        ]);

        $member->update($request->all());
        return redirect()->route('members.index')->with('success','Member update ho gaya!');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success','Member delete ho gaya!');
    }
}
