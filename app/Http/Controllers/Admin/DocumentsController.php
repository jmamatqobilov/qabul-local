<?php

namespace App\Http\Controllers\Admin;

use App\Models\Document;
use App\Http\Requests\DocumentRequest;
use App\Repositories\DocumentsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DocumentsController extends AdminController
{

    public function __construct(DocumentsRepository $doc_rep)
    {
        parent::__construct();
        $this->doc_rep = $doc_rep;
        $this->template = 'admin.page';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(Gate::denies('MANAGE_DOCUMENTS')){
            abort(403);
        }

        $this->title = __('Documents manager');

        $documents = $this->getDocuments();
        $this->content = view(env('THEME').'.admin.documents_list')->with('documents',$documents)->render();

        return $this->renderOutput();
    }

    public function getDocuments(){
        return $this->doc_rep->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if(Gate::denies('MANAGE_DOCUMENTS')){
        abort(403);
    }
        $this->title = __('Добавить новый материал');
        $this->content = view(env('THEME').'.admin.document_add')->render();
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DocumentRequest $request)
    {
        return $this->repositoryResult(
            $this->doc_rep->addDocument($request),
            route('admin.documents.index')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(403);
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
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Document $document
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Document $document)
    {
        return $this->repositoryResult(
            $this->doc_rep->deleteDocument($document),
            route('admin.documents.index')
        );
    }
}
