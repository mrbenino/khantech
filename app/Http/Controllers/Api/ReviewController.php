<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewStoreRequest;
use App\Http\Resources\ReviewResource;
use App\Imports\ReviewsImport;
use App\Models\Review;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReviewController extends Controller
{
    public function index()
    {
        return ReviewResource::collection(Review::all());
    }

    public function store(Request $request)
    {
        if (!$request->hasFile('file')) {
            return response()->json(['error' => 'Файл не был отправлен'], 422);
        }

        $path = $request->file('file')->getRealPath();
        Excel::import(new ReviewsImport, $path, null, \Maatwebsite\Excel\Excel::CSV);

        return response()->json(['success' => 'Файл успешно загружен']);
    }

    public function destroy()
    {
        Review::truncate();
        return response()->json(['message' => 'All reviews deleted successfully']);
    }

}
