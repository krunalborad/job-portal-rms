<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::with('company');

        if ($request->title) {
            $query->where('title', 'like', "%{$request->title}%");
        }

        if ($request->location) {
            $query->where('location', 'like', "%{$request->location}%");
        }

        if ($request->job_type) {
            $query->where('job_type', $request->job_type);
        }

        $jobs = $query->paginate(15);
        return response()->json($jobs);
    }

    public function show($id)
    {
        $job = Job::with(['company', 'skills'])->findOrFail($id);
        return response()->json($job);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Job::class);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'job_type' => 'required|in:Full-time,Part-time,Contract,Internship',
            'location' => 'required|string',
            'salary_min' => 'nullable|numeric',
            'salary_max' => 'nullable|numeric|gte:salary_min',
            'experience_level' => 'required|integer',
            'open_positions' => 'required|integer|min:1',
        ]);

        $company = $request->user()->company;
        if (!$company) {
            return response()->json(['message' => 'No company associated'], 403);
        }

        $job = $company->jobs()->create($validated);
        return response()->json($job, 201);
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $this->authorize('update', $job);

        $validated = $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
            'location' => 'string',
            'salary_min' => 'numeric',
            'salary_max' => 'numeric|gte:salary_min',
        ]);

        $job->update($validated);
        return response()->json($job);
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $this->authorize('delete', $job);
        $job->delete();
        return response()->json(['message' => 'Job deleted']);
    }
}