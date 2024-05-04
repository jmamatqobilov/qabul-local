<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class GetFileController extends Controller
{
    public function __invoke($id)
    {
        $document = Document::findOrFail($id);
        return response()->file(public_path('storage/app/' . $document->file_url));
    }
}
