<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Rules\GameRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'chars' => ['nullable', 'max:15', new GameRule()],
        ]);

        $chars = $this->getChars($validatedData['chars']);

        $game = new Game();
        $game->chars = $chars;
        $game->user_id = Auth::id();
        $game->save();

        return response(
            [
                'id' => $game->id,
                'shuffle' => str_shuffle($chars),
            ],
            200
        );
    }

    private function getChars(?string $chars): string
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';

        return $chars ?? substr(str_shuffle($permitted_chars), 0, 10);
    }
}
