<?php

namespace App\Http\Controllers;

use App\Models\Talk;
use App\Enums\TalkType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateTalkRequest;

class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('talks.index', ['talks' =>Auth::user()->talks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('talks.create', ['talk' => new Talk]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'length' => '',
            'type' => ['required', Rule::enum(TalkType::class)],
            'abstract' => '',
            'orgnotes' => '',
        ]);

        Auth::user()->talks()->create($validated);
        //create talk

        return redirect()->route('talks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Talk $talk)
    {
        //use Gate to authorize
        // Gate::authorize('view', $talk);

        //use policy for authorization directly in route file using ->can('view', 'talk');
        return view('talks.show', ['talk' => $talk]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Talk $talk)
    {
        return view('talks.edit', ['talk' => $talk]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTalkRequest $request, Talk $talk)
    {
        //form request authorization
        $talk->update($request->validated());
        return redirect()->route('talks.show', ['talk' => $talk]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Talk $talk)
    {
        //validate that user has access to the talk
        if($talk->user_id === Auth::user()->id){
            $talk->delete();
        }

        return redirect()->route('talks.index');
    }
}
