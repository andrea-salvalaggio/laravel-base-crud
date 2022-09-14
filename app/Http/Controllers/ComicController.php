<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // $newComic->title = $comic['title'];
        //     $newComic->description = $comic['description'];
        //     $newComic->thumb = $comic['thumb'];
        //     $newComic->price = $comic['price'];
        //     $newComic->series = $comic['series'];
        //     $newComic->sale_date = $comic['sale_date'];
        //     $newComic->type = $comic['type'];

        $comic = new Comic();
        $comic->title = $data['title'];
        $comic->thumb = $data['thumb'];
        $comic->description = $data['description'];
        $comic->series = $data['series'];
        $comic->type = $data['type'];
        $comic->sale_date = $data['sale_date'];
        $comic->price = $data['price'];

        $lastComicId = (Comic::orderBy('id', 'desc')->first()->id) + 1;
        $comic->slug = Str::slug($comic->title, '-') . '-' . $lastComicId;
        $comic->save();

        return redirect()->route('comics.show', $comic->id);
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $comic = Comic::where('slug', $slug);
        $comic = Comic::findOrFail($id);
        return view('comics.show', compact('comic'));
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
        //
    }
}
