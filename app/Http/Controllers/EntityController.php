<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EntityController extends Controller
{
    private $entityTypes = ['streamer', 'foundation', 'social worker', 'organization', 'personal'];

    public function index()
    {
        $entities = Entity::orderBy('created_at', 'DESC')->get();
        return view('entities.index')->with('entities', $entities);
    }

    public function create()
    {
        return view('entities.create')->with('entityTypes', $this->entityTypes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:entities',
            'phone' => 'required|max:10',
            'uniqueName' => 'required',
            'entityType' => 'required|in:' . implode(',', $this->entityTypes)
        ]);

        $entity = new Entity();
        $entity->fill($request->all());
        $status = $entity->save();

        if ($status) {
            Session::flash('success', 'Entity created successfully.');
        } else {
            Session::flash('error', 'Failed to create entity.');
        }

        return redirect()->route('entity');
    }
}