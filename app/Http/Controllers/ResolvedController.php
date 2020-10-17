<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResolvedController
{
    public function solve(Request $request, $id)
    {
        dd([$request, $id]);
    }
}
