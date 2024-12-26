<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Member;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::orderBy('first_name')->with('company')->paginate(10);

        return inertia('members/Index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return inertia('members/Create', [
            'companies' => $companies
        ]);
        return inertia('members/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'designation' => 'required',
            'company_id' => 'required'
        ]);

        Member::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'designation' => $request->designation,
            'company_id' => $request->company_id
        ]);

        return redirect('/members')->with('success', 'A new member has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::with('company')->findOrFail($id);
        $companies = Company::all();

        return Inertia::render('members/Edit', [
            'member' => $member,
            'companies' => $companies,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $member->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'designation' => $request->input('designation'),
            'company_id' => $request->input('company_id')

        ]);


        return redirect('/members')->with('success', 'The member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
