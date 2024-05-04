<?php

namespace App\Http\Controllers\Ukn;

use App\Exports\EndpointsExport;
use App\Models\Application;
use App\Models\Endpoint;
use App\Repositories\ApplicationsRepository;
use App\Repositories\DocumentsRepository;
use App\Repositories\EndpointsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class EndpointsController extends UknController
{
    public function __construct(
        DocumentsRepository $doc_rep,
        EndpointsRepository $ept_rep,
        ApplicationsRepository $app_rep
    )
    {
        parent::__construct();
        $this->app_rep = $app_rep;
        $this->doc_rep = $doc_rep;
        $this->ept_rep = $ept_rep;
        $this->template = 'ukn.blank';
        $this->component = config('custom.theme').'.ukn.endpoint.';
    }

    /**
     * Display a listing of the resource.
     *
     * @param Application|null $application
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(Application $application = null, $option = null)
    {
        if($option && $option == 'export')
            return Excel::download(new EndpointsExport($this->ept_rep), 'endpoints.xlsx');
        if(isset($application))
            $this->authorizeAction('hududiy_endpoints_list', $application);
        $thisUser = Auth::user();

        if(isset($application)){
            $applications = [$application];
        }else{
            $this->template = 'ukn.page';
            $this->icon = 'settings';
            if($thisUser->direction)
                $endpoints = $this->ept_rep->getDirectionEndpoints($thisUser->direction);
            else
                $endpoints = $this->ept_rep->get();

        }

//dd($endpoints);

        if($thisUser->direction) $this->title = __('List of Endpoints - ').$thisUser->direction->name;
        else $this->title = __('List of all Endpoints');

        if(!isset($application)){
            $this->content = view($this->component . 'full_list')
                ->with([
                    'endpoints' => $endpoints,
                    'filters'=> $this->ept_rep->getFilterInstance()->drawFilter($thisUser->is_director)
                ])->render();
            return $this->renderOutput(false, 'ukn.endpoints.index');
        }
        else
            $this->content = view($this->component.'list')
                ->with(['applications'=>$applications])->render();
        return $this->renderOutput();
    }

    public function create(Application $application)
    {
        abort(403);
    }

    public function store(Request $request, Application $application)
    {
        abort(404);
    }

    public function show(Application $application, Endpoint $endpoint)
    {
        $this->authorizeAction('hududiy_endpoints_list', $application);
        $this->template = 'ukn.form';
        $this->use_map = 'true';

        foreach($application->direction->dictionaries as $dic){
            $dictionaries[$dic->code] = $dic->name;
            $dictionary_values[$dic->code] = Arr::pluck($dic->values->toArray(), 'name','id');
        }

        $this->title = __('Просмотр оборудования #').$endpoint->id;
        $this->content = view($this->component.'show')
            ->with([
                'endpoint' => $endpoint,
                'dictionaries' => $dictionaries,
                'dictionary_values' => $dictionary_values
            ])->render();

        return $this->renderOutput();
    }

    public function edit(Application $application, $id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Application $application, $id)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Application $application, $id)
    {
        abort(404);
    }
}
