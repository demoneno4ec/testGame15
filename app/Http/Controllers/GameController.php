<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Rules\GameRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'chars' => ['nullable', 'max:15', new GameRule()],
        ]);

        $inputChars = $validatedData['chars'] ?? null;
        $chars = $this->getChars($inputChars);

        $game = new Game();
        $game->chars = $chars;
        $game->user_id = Auth::id();
        $game->save();

        return response(
            [
                'id'      => $game->id,
                'shuffle' => $this->shuffle($chars),
            ],
            200
        );
    }

    private function getChars(?string $chars): string
    {
        $response = $chars ?? '123456789abcdef';

        return $response.'0';
    }

    private function shuffle(string $chars): string
    {
        $shuffle = str_shuffle($chars);

        if ($this->isResolved($shuffle, $chars)) {
            return $shuffle;
        }

        return $this->swap($shuffle);
    }

    private function isResolved(string $shuffle, string $startPosition): bool
    {
        $arChars = str_split($shuffle);
        $startPositions = str_split($startPosition);
        $arStartPositions = array_flip($startPositions);

        $checkedIndex = [];
        $zeroRow = 0;

        $countPars = 0;

        foreach ($arChars as $position => $char) {
            $currentIndex = $arStartPositions[$char];
            if ($currentIndex === 15) {
                $zeroRow = $this->getZeroRow($position);
            }
            $countLessIndex = $this->getLessIndex($checkedIndex, $currentIndex);
            $countPars += $currentIndex - $countLessIndex;
            $checkedIndex [] = $currentIndex;
        }

        return (($countPars + $zeroRow) % 2) === 0;
    }

    private function swap(string $shuffle): string
    {
        $indexFirstChar = 0;

        if ($shuffle[0] === 0) {
            $indexFirstChar = 1;
        }

        $indexSecondChar = $indexFirstChar + 1;

        $firstChar = $shuffle[$indexFirstChar];
        $secondChar = $shuffle[$indexSecondChar];

        $shuffle[$indexFirstChar] = $secondChar;
        $shuffle[$indexSecondChar] = $firstChar;

        return $shuffle;
    }

    private function getLessIndex(array $checkedIndex, int $currentIndex): int
    {
        $counter = 0;
        foreach ($checkedIndex as $v) {
            if ($v < $currentIndex) {
                $counter++;
            }
        }
        return $counter;
    }

    private function getZeroRow(int $position)
    {
        return intdiv($position, 4) + ($position === 0 || $position % 4 !== 0 ? 1 : 0);
    }
}
