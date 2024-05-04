<?php

namespace App\Repositories;

use App\Models\Document;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;


class DocumentsRepository extends Repository
{

    public function __construct(Document $document)
    {
        $this->model = $document;
    }

    public function addDocument($document)
    {
        if (Gate::denies('upload', $this->model)) {
            abort(403);
        }
        $data = $document->except('_token');
        if (empty($data)) {
            return ['error' => 'No Data'];
        }
        return $this->saveDocument($document->file('document'), $document->user());
    }

    public function saveDocument(UploadedFile $file, $user, $doc_type = null, $ObjectId = null, string $type = null)
    {
        //        dd($objectType);
        $udoc = $file->store('documents/d' . $user->id);
        if ($type == 't') {
            $document_data = array(
            'file_name' => $file->getClientOriginalName(),
            'file_url' => $udoc,
            'doc_type' => $doc_type,
            't_object_id' => $ObjectId
        );
        } elseif ($type == 's') {
            $document_data = array(
            'file_name' => $file->getClientOriginalName(),
            'file_url' => $udoc,
            'doc_type' => $doc_type,
            's_object_id' => $ObjectId
        );
        } elseif ($type == 'r') {
            $document_data = array(
            'file_name' => $file->getClientOriginalName(),
            'file_url' => $udoc,
            'doc_type' => $doc_type,
            'r_object_id' => $ObjectId
        );
        } else {
            $document_data = array(
            'file_name' => $file->getClientOriginalName(),
            'file_url' => $udoc,
            'doc_type' => $doc_type,
            'm_object_id' => $ObjectId
        );
        }


//        dd($data, $document_data);
        $this->model = new Document();
//            dd($this->model);
        $this->model->fill($document_data);
//            dd($this->model);

        if ($result = $user->documents()->save($this->model)) {
//            dd($result);
            return $result->id;
        }
    }

    public function validateDocument($document_id, $user_id)
    {
        return ($this->one($document_id)->user->id == $user_id);
    }

    public function removeDocument($document_id)
    {
        return $this->deleteDocument($this->one($document_id));
    }

    public function deleteDocument($document)
    {
        if (Storage::delete($document->file_url) && $document->delete()) {
            return true;
        }
        return false;
    }
}
