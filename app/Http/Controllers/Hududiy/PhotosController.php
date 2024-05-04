<?php

namespace App\Http\Controllers\Hududiy;

use App\Http\Requests\EndpointModerateRequest;
use App\Http\Requests\EndpointRequest;
use App\Http\Requests\PhotoRequest;
use App\Models\Application;
use App\Models\Endpoint;
use App\Models\Inspection;
use App\Models\Photo;
use App\Repositories\ApplicationsRepository;
use App\Repositories\PhotosRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;

class PhotosController extends HududiyController
{
    public function __construct(
        PhotosRepository $photo_rep
    )
    {
        parent::__construct();
        $this->photo_rep = $photo_rep;
        $this->template = 'user.page';
        $this->component = env('THEME').'.hududiy.photo.';
    }

    /**
     * Display a listing of the resource.
     *
     * @param Application|null $application
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(Application $application)
    {
        abort(404);
    }

    public function create(Application $application)
    {
        abort(404);
    }

    public function store(PhotoRequest $request, Inspection $inspection)
    {
        if (Gate::denies('hududiy_inspections_edit', $inspection->application))
            abort(403);

        return $this->repositoryResult(
            $this->photo_rep->add($request, $inspection),
            route('hududiy.applications.inspections.index', ['application' => $inspection->application->id])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Application $application
     * @param Endpoint $endpoint
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function show(Application $application, Endpoint $endpoint)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Application $application
     * @param Endpoint $endpoint
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function edit(Application $application, Endpoint $endpoint)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EndpointRequest $request
     * @param Application $application
     * @param Endpoint $endpoint
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(EndpointModerateRequest $request, Application $application, Endpoint $endpoint)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Application $application
     * @param Photo $photo
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Inspection $inspection, Photo $photo)
    {
        if (Gate::denies('hududiy_inspections_edit', $inspection->application))
            abort(403);

        return $this->repositoryResult(
            $this->photo_rep->delete($photo, $inspection),
            route('hududiy.applications.inspections.index', ['application'=>$inspection->application->id])
        );
    }
}
