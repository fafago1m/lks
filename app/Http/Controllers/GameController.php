<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class  GameController extends Controller
{
    public function index(Request $request)
    {
        $page = max((int) $request->query('page', 1), 1); 
        $size = (int) $request->query('size', 10); 

        $sortBy = $request->query('sortBy', 'title');
        $sortDir = $request->query('sortDir', 'asc');

        $allowedSorts = ['title', 'uploaddate', 'created_at'];
        if (!in_array($sortBy, $allowedSorts)) {
            return response()->json(['message' => 'Kolom sortBy tidak valid.'], 400);
        }

        $query = Game::query();

        if ($sortBy === 'uploaddate') {
            $sortBy = 'created_at';
        }

        $query->orderBy($sortBy, $sortDir);

        $games = $query->paginate($size, ['*'], 'page', $page);

        return response()->json([
            'data' => $games->items(),
            'meta' => [
                'current_page' => $games->currentPage(),
                'last_page' => $games->lastPage(),
                'total' => $games->total(),
                'per_page' => $games->perPage(),
            ],
        ]);
    }
}
