<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentImage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DocumentController extends Controller
{
    public function create(Request $request, $id)
    {
        return view('entities.documents.create')->with('entityId', $id);;
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required'
        ]);

        $document = new Document();
        $data = $request->all();
        $entityId = $data['entityId'];

        $document->fill($data);
        $status = $document->save();

        if ($status) {
            foreach ($request->image as $img) {
                $documentImageData = [];
                $documentImageData['documentId'] = $document->id;
                $documentImage = new DocumentImage();

                // write code to upload image to folder
                // set filename 
                $imageName = uniqid() . '_' . time();
                $extension = $img->getClientOriginalExtension();
                $finalImageName = $imageName . '.' . $extension;

                $targetUploadPath = public_path('images/documents');
                $uploaded = $img->move($targetUploadPath, $finalImageName);

                if ($uploaded) {
                    $documentImageData['image'] = $finalImageName;
                    $documentImage->fill($documentImageData);

                    $documentImage->save();
                }
            }
        }

        if ($status) {
            Session::flash('success', 'Document Details added successfully.');
        } else {
            Session::flash('error', 'Failed to add document Details.');
        }

        return redirect()->route('entity', $entityId);
    }
}