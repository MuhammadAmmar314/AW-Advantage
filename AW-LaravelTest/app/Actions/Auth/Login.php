<?php

namespace App\Actions\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Route;

/**
 * Summary of Login
 */
class Login
{
    use AsAction;
    public function handle(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
    }

    /**
     * Summary of asController
     * @param Request $request
     * @return void
     */
    public function asController(LoginRequest $request)
    {
        $this->handle($request);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}

?>