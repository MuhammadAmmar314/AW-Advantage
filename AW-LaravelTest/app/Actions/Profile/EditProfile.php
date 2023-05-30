<?php

namespace App\Actions\Profile;

use App\Models\User;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Symfony\Component\HttpFoundation\Request;

/**
 * Summary of UpdatePassword
 */
class EditProfile
{
    use AsAction;
    public function handle(Request $request)
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Summary of asController
     * @param Request $request
     * @return void
     */
    public function asController(Request $request)
    {
        $this->handle($request);
    }
}

?>