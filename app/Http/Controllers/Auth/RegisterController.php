<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * @var array<string, string>
     */
    private const ALLOWED_ROLES = [
        'farmer' => 'Farmer',
        'rice_trader' => 'Rice Trader / Buyer',
        'consumer' => 'Consumer',
    ];

    public function create(): View
    {
        return view('auth.register', [
            'title' => 'Register',
            'roles' => self::ALLOWED_ROLES,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', Rule::in(array_keys(self::ALLOWED_ROLES))],
        ]);

        $role = Role::firstOrCreate(
            ['slug' => $validated['role']],
            ['name' => self::ALLOWED_ROLES[$validated['role']]],
        );

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role_id' => $role->id,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
}
