<?php

namespace App\Actions\Auth;

use App\Models\User;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;
use Symfony\Component\HttpFoundation\Request;

/**
 * Summary of ViewRegister
 */
class ViewRegister
{
    use AsAction;
    public function handle(Request $request)
    {
    }

    /**
     * Summary of asController
     * @param Request $request
     * @return void
     */
    public function asController(Request $request)
    {
        return Inertia::render('Auth/Register');
    }
}

?>