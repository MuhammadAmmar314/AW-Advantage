<?php

namespace App\Actions\Profile;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;
use Symfony\Component\HttpFoundation\Request;

/**
 * Summary of DeleteProfile
 */
class DeleteProfile
{
    use AsAction;
    public function handle(User $user, string $password)
    {
        $user->delete();
    }

    /**
     * Summary of asController
     * @param Request $request
     * @return void
     */
    public function asController(Request $request)
    {
        $this->handle($request->user(), $request->password);
    }
}

?>