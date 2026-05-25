<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Menampilkan daftar semua post.
     */
    public function index(): JsonResponse
    {
        // 1. Mengambil semua data dari tabel posts
        $posts = Post::all();

        // 2. Mengembalikan data dalam bentuk JSON dengan HTTP Status 200 (OK)
        return response()->json(['data'=>$posts], 200);
    }
}
