<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $applications = Application::with(['job', 'resume'])
            ->where('user_id', $request->user()->id)
            ->get();
        return response()->json($applications);
    }

    public function store(Request $request, $jobId)
    {
        $job = Job::findOrFail($jobId);

        $validated = $request->validate([
            'resume_id' => 'required|exists:resumes,id',
            'cover_letter' => 'nullable|string|max:2000',
        ]);

        $exists = Application::where('user_id', $request->user()->id)
            ->where('job_id', $jobId)
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Already applied'], 422);
        }

        $application = Application::create([
            'user_id' => $request->user()->id,
            'job_id' => $jobId,
            'resume_id' => $validated['resume_id'],
            'cover_letter' => $validated['cover_letter'] ?? null,
            'status' => 'submitted',
        ]);

        return response()->json($application, 201);
    }

    public function updateStatus(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $this->authorize('update', $application);

        $validated = $request->validate([
            'status' => 'required|in:submitted,reviewed,shortlisted,rejected,accepted',
        ]);

        $application->update($validated);
        return response()->json($application);
    }
}