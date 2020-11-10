<?php
namespace Iftikharahmed\ActivitylogViewer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Iftikharahmed\ActivitylogViewer\Activity;
use Iftikharahmed\ActivitylogViewer\Factory;
use Iftikharahmed\ActivitylogViewer\Repositories\LogRepositoryInterface;

class ActivitylogViewerController extends Controller
{
    ///**
    // * @var LogRepositoryInterface
    // */
    //protected $repository;
    //
    //
    ///**
    // * ActivitylogViewerController constructor.
    // * @param LogRepositoryInterface $repository
    // */
    //public function __construct(LogRepositoryInterface $repository)
    //{
    //    $this->repository = $repository;
    //}
    //
    public function index(Request $request)
    {

        $by = Factory::create($request->get('by_id'), $request->get('by_type'));
        $on = Factory::create($request->get('on_id'), $request->get('on_type'));
        $logs = app('iftikharahmed.activitylog-viewer')->on($on)->by($by)->getData();

        if(request()->ajax()) {
            return view('activitylog-viewer::items', compact('logs'));
        }
    }

}
