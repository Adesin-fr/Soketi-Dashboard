<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AppController extends Controller
{
    public function index()
    {
        $apps= App::latest()->get();
        return Inertia::render('Apps/Index', compact('apps'));
    }

    public function create()
    {
        return Inertia::render('Apps/Create');
    }

    public function store(Request $request)
    {
        App::create($request->all());

        return redirect()->route('apps.index');

    }

}
