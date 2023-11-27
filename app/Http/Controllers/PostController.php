<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function layTatCaBaiViet() {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    public function getTaoBaiViet() {
        return view('posts.create');
    }

    public function postTaoBaiViet(Request $request) {
        $validatedData = $request->validate([
            'title' => [
                'required',
                Rule::in(['cong-4', 'cong-5']),
            ],
            'body' => ['required'],
        ]);
        Post::create($validatedData);
        // sau khi thêm thành công thì trả về cái route ni
        return redirect()->route('get-posts');
    }

    public function layBaiViet($id, Request $request) {
        $fbClid = $request->fb_clid;
        $zaloClid = $request->zalo_clid;
        $post = Post::find($id);
        return view('posts.details', ['post' => $post]);
    }

    public function vaoSanBay(Request $request) {
        $ticket = $request->get('ticket');
        return "Ban da vao san bay voi ma ve la: $ticket!";
    }
}
