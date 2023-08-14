<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Memo;
use LDAP\Result;

class MemoController extends Controller
{
    /**
     * コンストラクタ
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    /**
     * メモ一覧
     *
     * @param Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        // ユーザーのメモ一覧を取得
        $memos = $request->user()->memos()->get();

        return view('memos.index', [
            'memos' => $memos,
        ]);
    }

    /**
     * 新メモ作成
     *
     * @param Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
        ]);

        // メモ作成処理
        $request->user()->memos()->create([
            'name' => $request->name,
        ]);


        return redirect('/memos');
    }

    /**
     * 指定メモ削除
     * 
     * @param Request  $request
     * @param Memo  $memo
     * @return Response
     */
    public function destroy(Request $request ,Memo $memo)
    {
        $memo = Memo::where('id', '=', $request->id)->first();        
        $memo->delete();
        return redirect('/memos');
    }

    /**
     * 指定メモ編集
     * 
     * @param Request  $request
     * @param Memo  $memo
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        // POSTリクエストの時
        if ($request->isMethod('post')) {

            $memo = Memo::where('id', '=', $request->id)->first();

            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            $memo->name = $request->name;

            $memo->save();

            return redirect('/memos');
        }
        $memo = Memo::find($id);

        return view('memos.edit', compact('memo'));
    }

}
