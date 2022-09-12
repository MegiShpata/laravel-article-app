<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\MockObject\Method;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::when($request->has("emertimi"), function ($q) use ($request) {
            return $q->where("emertimi", "like", "%" . $request->get("emertimi") . "%");
        })
            ->when($request->has("barcode"), function ($q) use ($request) {
                return $q->where("barcode", "like", "%" . $request->get("barcode") . "%");
            })
            ->paginate(10);

        return view('list', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'barcode' => "required|string|unique:articles",
            'emertimi' => "required|string|max:255",
            'njesia' => "required|max:255",
            'data_skadences'=>'required',
            'price'=>'required',
            'lloji'=>'nullable',
            'TVSH'=>'nullable',
            'tipi' => "required|string|max:255",
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $Article = new Article();
        $Article->barcode = $request->barcode;
        $Article->emertimi = $request->emertimi;
        $Article->njesia  = $request->njesia;
        $Article->data_skadences  = $request->data_skadences;
        $Article->price  = $request->price;
        $Article->tipi  = $request->tipi;

        if($request->has('lloji')){
            $Article->lloji = true;
        }

        if($request->has('TVSH')){
            $Article->TVSH = true;
        }

        $Article->save();
        return redirect()->route("articles.index")
            ->with('success', 'You have successfully created the article.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->route("articles.index")
            ->with('success', 'You have successfully deleted the article.');
    }
}
