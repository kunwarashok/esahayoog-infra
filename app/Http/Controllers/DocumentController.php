<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentImage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DocumentController extends Controller
{
    private $documentTypes = ['National Id', 'Driving License'];
    public function create(Request $request, $id)
    {
        return view('entities.documents.create')->with('entityId', $id)->with('documentTypes', $this->documentTypes);;;
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

        return redirect()->route('document.view', $entityId);
    }

    public function view(Request $request, $entityId)
    {
        $documents = Document::where('entityId', $entityId)->orderBy('created_at', 'DESC')->get();
        return view('entities.documents.view')->with('documents', $documents)->with('entityId', $entityId);
    }

    public function edit(Request $request, $id)
    {
        $document = Document::find($id);

        if (!$document) return redirect()->route("entity");

        return view('entities.documents.edit')->with('documentTypes', $this->documentTypes)->with('document', $document);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'documentType' => 'required|in:' . implode(',', $this->documentTypes)
        ]);

        $document = Document::find($id);
        $data = $request->all();

        $entityId = $document->entityId;
        $oldImagesArray = $document->documentImages;

        if ($request->image) {
            // user tries to upload new image

            // delete the rows with old images
            $oldImages = DocumentImage::where("documentId", $document->id);
            $success = $oldImages->delete();

            // delete old images from folder
            if ($success) {
                foreach ($oldImagesArray as $oldImage) {
                    $oldImgPath = public_path('images/documents/') . $oldImage->image;
                    @unlink($oldImgPath);
                }
            }

            // then upload new images
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

        $document->fill($data);
        $status = $document->update();

        if ($status) {
            Session::flash('success', 'Document Details updated successfully.');
        } else {
            Session::flash('error', 'Failed to update document Details.');
        }

        return redirect()->route('document.view', $entityId);
    }
    public function delete(Request $request, $id)
    {
        $document = Document::find($id);
        $entityId = $document->entityId;
        $oldImagesArray = $document->documentImages;
        $status = $document->delete();

        if ($status) {
            foreach ($oldImagesArray as $oldImage) {
                $oldImgPath = public_path('images/documents/') . $oldImage->image;
                @unlink($oldImgPath);
            }

            Session::flash('success', 'Document Detail Deleted successfully.');
        } else {
            Session::flash('error', 'Failed to delete document Detail.');
        }
        return redirect()->route('document.view', $entityId);
    }
}