<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComicController extends Controller
{

    protected $validateData = [
            'title' => 'required|min:3|max:255|unique:comics',
            'thumb' => 'required|min:5',
            'description' => 'required|min:10',
            'series' => 'required|min:3|max:255',
            'type' => 'required|exists:comics,type',
            'sale_date' => 'required|date|after:1900/01/01',
            'price' => 'required|numeric|between:5,100',
    ];

    protected $customValidateMsgs = [
            'title.required' => 'È necessario inserire un titolo',
            'title.min' => 'Il titolo deve avere almeno 3 caratteri',
            'thumb.required' => 'È necessario inserire un link ad una immagine',
            'thumb.min' => 'Il link deve avere almeno 5 caratteri',
            'description.required' => 'È necessario inserire una descrizione',
            'description.min' => 'La descrizione deve avere almeno 10 caratteri',
            'series.required' => 'È necessario inserire una serie',
            'series.min' => 'La serie deve avere almeno 3 caratteri',
            'type.required' => 'È necessario selezionare una tipologia',
            'type.exists' => 'Il tipo selezionato non è disponibile nella lista',
            'sale_date.required' => 'È necessario inserire una data',
            'sale_date.after' => 'La data deve essere dopo il 01/01/1900',
            'price.required' => 'È necessario inserire una prezzo',
            'price.numeric' => 'Il prezzo deve essere un numero',
            'price.between' => 'Il prezzo deve essere almeno di 5€',
    ];

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
        $types = DB::table('comics')->select('type as type_name')->distinct()->get();
        return view('comics.create', compact('types'));
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

        $validatedData = $request->validate($this->validateData, $this->customValidateMsgs);

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

        return redirect()->route('comics.index')->with('created', $comic->title);
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
        $comic = Comic::findOrFail($id);
        $types = DB::table('comics')->select('type as type_name')->distinct()->get();
        return view('comics.edit', compact(['comic', 'types']));
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
        $validatedData = $request->validate($this->validateData, $this->customValidateMsgs);

        $data = $request->all();
        $comic = Comic::findOrFail($id);
        $comic->title = $data['title'];
        $comic->thumb = $data['thumb'];
        $comic->description = $data['description'];
        $comic->series = $data['series'];
        $comic->type = $data['type'];
        $comic->sale_date = $data['sale_date'];
        $comic->price = $data['price'];
        $comic->save();

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();

        return redirect()->route('comics.index')->with('delete', $comic->title);
    }
}
