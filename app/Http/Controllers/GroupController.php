<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Branch;
use App\Models\Group;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::with('user', 'branch', 'subject')->get();
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        $subjects = Subject::all();
        $teachers = User::where('role', User::ROLE_TEACHER)->get();

        return view('groups.action', compact('teachers', 'branches', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupRequest $request)
    {
        $data = $request->validated();
        Group::create($data);

        return redirect(route('groups.index'))->with(['message' => 'created']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $group = Group::findOrFail($id);
        $branches = Branch::all();
        $subjects = Subject::all();
        $teachers = User::where('role', User::ROLE_TEACHER)->get();

        return view('groups.action', compact('teachers', 'branches', 'subjects', 'group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupRequest $request, string $id)
    {
        dd($request->validated());
        $student = Group::findOrFail($id);
        $data = $request->validated();
        $student->update($data);

        return redirect(route('groups.index'))->with(['message' => 'updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Group::destroy($id);

        return redirect(route('groups.index'))->with(['message'=> 'deleted']);
    }
}
