<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{

    public $validator = [
        'title' => 'required|max:50',
        'author' => 'required|max:30',
        'description' => 'nullable',
        'genre' => 'required|max:100',
        'photo' => 'nullable|max:255',
        'price' => 'required|numeric',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::paginate(10);
        $data = [
            'comics' => $comics,
            'title' => 'Comics Home'
        ];

        return view('comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create', ['title' => 'Create New Comic']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validator);
        $data = $request->all();
        $comic = new Comic();
        $comic->fill($data);
        $comic->save();

        $save = $comic->save();

        if (!$save) {
            dd('Salvataggio non riuscito');
        }


        return redirect()->route('comics.show', $comic->id)
        ->with('status', "Comic $comic->title saved.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        $data = [
            'comic' => $comic,
            'title' => $comic->name
        ];
        return view('comics.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', ['comic' => $comic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate($this->validator);
        $data = $request->all();
        $updated = $comic->update($data);

        if (!$updated) {
            dd('aggiornamento dei dati non riuscito');
        }

        return redirect()
            ->route('comics.show', $comic->id)
            ->with('status', "Comic $comic->title saved.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()
            ->route('comics.index')
            ->with('status', "Comic $comic->title deleted.");
    }
}
