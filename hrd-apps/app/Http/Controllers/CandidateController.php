<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CandidateRequest;

use App\Candidate;
use App\Job;

class CandidateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::orderBy('created_at', 'DESC')->get();
        return view('candidates.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::where('status', 'publish')->orderBy('created_at', 'DESC')->get();
        return view('candidates.create', compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidateRequest $request)
    {
        $data = $request->except('cv');
        $data['status'] = 'R';
        $data['cv'] = $this->uploadCV($request);

        Candidate::create($data);
        return redirect('candidates');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        return view('candidates.show', compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        $jobs = Job::where('status', 'publish')->orderBy('created_at', 'DESC')->get();
        return view('candidates.edit', compact('candidate', 'jobs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CandidateRequest $request, Candidate $candidate)
    {
        $data = $request->except('cv');

        if ($request->has('cv')) {
          $data['cv'] = $this->uploadCV($request);
        }
        $candidate->update($data);
        return redirect('candidates');
    }

    public function uploadCV($request)
    {
        $cv = $request->file('cv');
        $filename = time() . '.' . $cv->getClientOriginalExtension();
        $cv->move('storage/cv', $filename);
        return $filename;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return redirect('candidates');
    }
}
