<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\discordUser;
use App\Models\User;
use Socialite;

class DiscordAuthController extends Controller
{
    public function auth()
    {
        $user = Socialite::driver('discord')->user(); //ignorar o problema pq ta funcionando

        $discordUser = discordUser::where(['discord_id' => $user->id])->first();
        if ($discordUser == null) {
            $discordUser = discordUser::create(['discord_id' => $user->id])->first();
        }

        $discordUser->update([
            'email' => $user->email,
            'nickname' => $user->nickname,
            'name' => $user->name,
            'avatar' => $user->avatar
        ]);

        $currentUser = User::where(['email' => $user->id]);
        if ($currentUser == null) {
            $currentUser = User::Create(['email' => $user->id, 'password' => bcrypt($user->id), 'name' => 'discorduser']);
        }

        Auth::attempt(['email' => $user->id, 'password' => $user->id]);
        return redirect()->route('home');
    }

    public function login()
    {
        return Socialite::driver('discord')->redirect();
    }
}
