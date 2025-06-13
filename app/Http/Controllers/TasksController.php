<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TasksController extends Controller
{
    // getでTasks/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        // メッセージ一覧を取得
        $Tasks = Task::all();

        // メッセージ一覧ビューでそれを表示
        return view('Tasks.index', [
            'Tasks' => $Tasks,
        ]);
    }

    // getでTasks/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $Task = new Task;

        // メッセージ作成ビューを表示
        return view('Tasks.create', [
            'Task' => $Task,
        ]);
    }

    // postでTasks/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {

        // メッセージを作成
        $Task = new Task;
        $Task->content = $request->content;
        $Task->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    // getでTasks/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show(string $id)
    {
        // idの値でメッセージを検索して取得
        $Task = Task::findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        return view('Tasks.show', [
            'Task' => $Task,
        ]);
    }

    // getでTasks/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit(string $id)
    {
        // idの値でメッセージを検索して取得
        $Task = Task::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('Tasks.edit', [
            'Task' => $Task,
        ]);
    }

    // putまたはpatchでTasks/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, string $id)
    {
        // idの値でメッセージを検索して取得
        $Task = Task::findOrFail($id);
        // メッセージを更新
        $Task->content = $request->content;
        $Task->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    // deleteでTasks/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy(string $id)
    {
        // idの値でメッセージを検索して取得
        $Task = Task::findOrFail($id);
        // メッセージを削除
        $Task->delete();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}