<?php

namespace App\Actions\Auth;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;
use Symfony\Component\HttpFoundation\Request;

/**
 * Summary of UpdatePassword
 */
class UpdatePassword
{
    use AsAction;
    public function handle(User $user, string $password)
    {
        $user->password = bcrypt($password);
        $user->save();
    }

    /**
     * Summary of asController
     * @param Request $request
     * @return void
     */
    public function asController(Request $request)
    {
        $this->handle($request->user(), $request->password);

        return redirect()->back();
    }
}

?>