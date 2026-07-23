<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Application;

class ApplicationPolicy
{
    public function update(User $user, Application $application): bool
    {
        return $user->id === $application->job->company->user_id;
    }
}