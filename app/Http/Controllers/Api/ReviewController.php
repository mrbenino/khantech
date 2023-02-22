<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewStoreRequest;
use App\Http\Resources\ReviewResource;
use App\Imports\ReviewsImport;
use App\Models\Review;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use function Ramsey\Uuid\v1;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::paginate(15)->onEachSide(1);

        $reviews->withQueryString()->onEachSide(1)->links();

        return response()->json($reviews);
    }

    public function store(Request $request)
    {
        if (!$request->hasFile('file')) {
            return response()->json(['error' => 'The file was not sent'], 422);
        }

        $path = $request->file('file')->getRealPath();
        Excel::import(new ReviewsImport, $path, null, \Maatwebsite\Excel\Excel::CSV);

        return response()->json(['success' => 'File uploaded successfully', 'list' => Review::all()]);
    }

    public function destroy()
    {
        Review::truncate();
        return response()->json(['message' => 'All reviews deleted successfully', 'list' => Review::all()]);
    }

}
