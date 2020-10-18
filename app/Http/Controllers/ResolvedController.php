<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Resolved;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResolvedController
{
    public function solve(Request $request, $id)
    {
        $game = Game::query()->findOrFail($id);

        $steps = $request->post('steps');

        if (empty($steps)) {
            abort(403, 'Решение обязательно');
        }

        $lastPosition = array_pop($steps);
        $startPosition = $game->chars;

        if ($startPosition === $lastPosition) {
            $createDate = $game->created_at;

            $createDate->diff(Carbon::now());
            $difference = $createDate->diffInSeconds(Carbon::now());

            $resolved = new Resolved();
            $resolved->difference = $difference;
            $resolved->steps = $steps;
            $resolved->game_id = $game->id;
            $resolved->save();
        }

        return response(
            [
                'message'    => 'Игра успешно решена',
                'difference' => $difference,
            ],
            200
        );
    }
}
