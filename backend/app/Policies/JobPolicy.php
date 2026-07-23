<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Job;

class JobPolicy
{
    public function create(User $user): bool
    {
        return $user->role === 'recruiter';
    }

    public function update(User $user, Job $job): bool
    {
        return $user->company_id === $job->company->user_id;
    }

    public function delete(User $user, Job $job): bool
    {
        return $user->company_id === $job->company->user_id;
    }
}