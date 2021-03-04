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
        $data = $request->all();

        if ($request->logo) {
            $fileName = uniqid() . '_' . time();
            $extension = $request->logo->getClientOriginalExtension();
            $finalFileName = $fileName . '.' . $extension;

            $targetUploadPath = public_path('images');
            $uploaded = $request->logo->move($targetUploadPath, $finalFileName);

            if ($uploaded) {
                $data['logo'] = $finalFileName;
            } else {
                $data['logo'] = null;
            }
        }

        if ($request->coverImage) {
            $coverName = uniqid() . '_' . time();
            $extension = $request->coverImage->getClientOriginalExtension();
            $finalCoverName = $coverName . '.' . $extension;

            $targetUploadPath = public_path('images/coverImage');
            $uploaded = $request->coverImage->move($targetUploadPath, $finalCoverName);

            if ($uploaded) {
                $data['coverImage'] = $finalCoverName;
            } else {
                $ata['coverImage'] = null;
            }
        }

        $entity->fill($data);
        $status = $entity->save();

        if ($status) {
            Session::flash('success', 'Entity created successfully.');
        } else {
            Session::flash('error', 'Failed to create entity.');
        }

        return redirect()->route('entity');
    }

    public function edit(Request $request, $id)
    {
        $entity = Entity::find($id);
        return view('entities.edit')->with('entityTypes', $this->entityTypes)->with('entity', $entity);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:entities,email,' . $id,
            'phone' => 'required|max:10',
            'uniqueName' => 'required',
            'entityType' => 'required|in:' . implode(',', $this->entityTypes)
        ]);

        $entity = Entity::find($id);
        $data = $request->all();

        if ($request->logo) {
            $fileName = uniqid() . '_' . time();
            $extension = $request->logo->getClientOriginalExtension();
            $finalFileName = $fileName . '.' . $extension;

            $targetUploadPath = public_path('images');
            $uploaded = $request->logo->move($targetUploadPath, $finalFileName);

            if ($uploaded) {
                $data['logo'] = $finalFileName;

                // delete the old logo
                $oldLogo = $entity->logo;
                if ($oldLogo) {
                    $oldLogoPath = public_path('images/') . $oldLogo;
                    unlink($oldLogoPath);
                }
            } else {
                $data['logo'] = null;
            }
        }

        if ($request->coverImage) {
            $coverName = uniqid() . '_' . time();
            $extension = $request->coverImage->getClientOriginalExtension();
            $finalCoverName = $coverName . '.' . $extension;

            $targetUploadPath = public_path('images/coverImage');
            $uploaded = $request->coverImage->move($targetUploadPath, $finalCoverName);

            if ($uploaded) {
                $data['coverImage'] = $finalCoverName;

                //delete the old cover Image
                $oldCoverImage = $entity->coverImage;
                if ($oldCoverImage) {
                    $oldCoverImagePath = public_path('images/coverImage') . $oldCoverImage;
                    unlink($oldCoverImagePath);
                } else {
                    $ata['coverImage'] = null;
                }
            }
        }

        $entity->fill($data);
        $status = $entity->update();

        if ($status) {
            Session::flash('success', 'Entity updated successfully.');
        } else {
            Session::flash('error', 'Failed to update entity.');
        }

        return redirect()->route('entity');
    }
}