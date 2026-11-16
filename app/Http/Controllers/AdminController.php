<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Text;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin', [
            'news' => Text::with(['category', 'author'])->latest()->orderByDesc('id')->get(),
            'users' => User::with('role')->orderBy('login')->get(),
            'roles' => Role::orderBy('id')->get(),
        ]);
    }

    public function block(Request $request, Text $article)
    {
        $request->validate(['blocked' => ['required', 'boolean']]);

        $article->blocked = $request->boolean('blocked');
        $article->save();

        $message = $article->blocked ? 'Статья заблокирована.' : 'Статья снова опубликована.';

        return redirect()->route('admin')->with('message', $message);
    }

    public function destroy(Text $article)
    {
        $article->delete();

        return redirect()->route('admin')->with('message', 'Статья удалена.');
    }

    public function changeRole(Request $request, User $user)
    {
        abort_if($user->id === $request->user()->id, 403);

        $data = $request->validate(['role_id' => ['required', 'integer', 'exists:roles,id']]);
        $user->role_id = $data['role_id'];
        $user->save();

        return redirect()->route('admin')->with('message', 'Роль сохранена.');
    }
}
