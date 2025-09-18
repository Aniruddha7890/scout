<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function search(Request $request)
    {
        $search_result = Movie::search($request->keyword, function($meiliSearch, string $query, array $options) {
            $options['attributesToHighlight'] = ['original_title', 'overview'];

            return $meiliSearch->search($query, $options);
        })->paginateRaw(10);

        return response()->json([
            'result' => $search_result
        ]);
    }

    public function getSuggestions(Request $request)
    {
        $keyword = $request->input('keyword');

        // Fetch suggestions from Meilisearch
        $suggestions = Movie::search($keyword, function ($meiliSearch, string $query, array $options) {
            $options['limit'] = 10; // Limit the number of suggestions
            $options['attributesToRetrieve'] = ['original_title']; // Retrieve only the original_title field
            return $meiliSearch->search($query, $options);
        })->raw()['hits'];

        // Extract only the original_title from the results
        $suggestionTitles = array_map(function ($hit) {
            return $hit['original_title'];
        }, $suggestions);

        return response()->json([
            'suggestions' => $suggestionTitles,
        ]);
    }
}
