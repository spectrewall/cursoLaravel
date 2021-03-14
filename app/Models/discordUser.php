<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class discordUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'discord_id',
        'email',
        'nickname',
        'name',
        'avatar',
    ];

    public function getUserInfoBySession()
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);


        if ($currentuser->name == 'discorduser') {
            $discordUser = DiscordUser::where('discord_id', '=', $currentuser->email)->first();
            return $discordUser;
        } else {
            return $currentuser;
        }
    }
}
