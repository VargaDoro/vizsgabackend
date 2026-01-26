<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        // A LoginRequest eleve validal, igy nem duplikaljuk a validaciot, csak a validalt adatot hasznaljuk.
        $credentials = $request->validated();

        // Ha a belepes sikertelen, egyertelmu hibauzenetet kuldunk vissza.
        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid login credentials'], 401);
        }

        // Az IDE/elemzo szerint az Auth::user() visszateresi tipusa altalanos Authenticatable|null,
        // ezert jeloljuk, hogy itt konkretan a sajat User modellel dolgozunk, igy a createToken() lathato lesz.
        /** @var User $user */
        $user = Auth::user();

        // Session guard eseten session fixation ellen regeneraljuk a sessiont.
        if (method_exists($request, 'session')) {
            $request->session()->regenerate();
        }

        // Sikeres bejelentkezes utan token-t generalunk (Sanctum/PAT hasznalat). 
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
            'status' => 'Login successful',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        // Ha token alapbol dolgozunk (Sanctum PAT), toroljuk az aktualis tokent.
        if ($request->user() && $request->user()->currentAccessToken()) {
            $request->user()->currentAccessToken()->delete();
        }

        // Ha session guard van, akkor korrekt kijelentkeztetes + CSRF token csere.
        if (method_exists($request, 'session')) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return response()->json(['message' => 'Logout successful']);
    }

}
