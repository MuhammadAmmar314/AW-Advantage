<?php

namespace App\Actions\Profile;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;
use Symfony\Component\HttpFoundation\Request;

/**
 * Summary of UpdateProfile
 */
class UpdateProfile
{
    use AsAction;
    public function handle(User $user, string $name, string $email)
    {
        $user->name = $name;
        $user->email = $email;

        $user->save();
    }

    /**
     * Summary of asController
     * @param Request $request
     * @return void
     */
    public function asController(Request $request)
    {
        $this->handle($request->user(), $request->name, $request->email);

        return redirect()->back();
    }
}

?>