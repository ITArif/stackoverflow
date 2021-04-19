<?php

namespace App\Http\Controllers\Admin;

use App\Job;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class JobController extends Controller
{
    public function renderApprovedDataTable(){
        $jobs = Job::orderBy('id','DESC')
            ->with('tags','users')
            ->get();
        // dd($answers);
        $render = DataTables::of($jobs)
            ->addColumn('hash',function ($row){
                //return $row->id;
                return '<input type="checkbox" name="job_ids[]" value="'.$row->id.'">';
            })
            ->addColumn('action',function ($row){
                $view_url = route('view.approved.job',$row->id);
                return '<a href="'.$view_url.'" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>'.
                    '<button type="button" onclick="deletesJob('.$row->id.')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
            })
            ->editColumn('status',function ($row){
                $htmlElement = "";
                if ($row->status==1){
                    $htmlElement = '<button class="btn btn-success btn-xs">Approved</button>';
                }else{
                    $htmlElement = '<button class="btn btn-danger btn-xs">Inapproved</button>';
                }
                return $htmlElement;
            })
            ->editColumn('created_at',function ($row){
                return $row->created_at->diffForHumans();
            })
            ->editColumn('users',function ($row){
                $htmlElement = '';
                foreach ($row->users as $user){
                    $htmlElement .= ''.$user->name.'';
                }
                return $htmlElement;
            })
            ->editColumn('tags',function ($row){
                $htmlElement = '';
                foreach ($row->tags as $tag){
                    $htmlElement .= '<button class="btn btn-success btn-xs">'.$tag->name.'</button>';
                }
                return $htmlElement;
            })
            ->editColumn('description',function ($row){
                return strip_tags($row->description);
            })
            ->rawColumns(['hash','tags','description','status','action','users','created_at'])
            ->make(true);

        return $render;
    }

    public function deleteAll(Request $request){
        $ids = $request->job_ids;
        foreach ($ids as $id){
            $job = Job::find($id);
            if ($job){
                $job->delete();
            }
        }
        return response()->json('success',201);
    }

    public function activateAll(Request $request){
        $ids = $request->job_ids;
        foreach ($ids as $id){
            $job = Job::find($id);
            if ($job){
                $job->status=1;
                $job->save();
            }
        }
        return response()->json('success',201);
    }

    public function deactivateAll(Request $request){
        $ids = $request->job_ids;
        foreach ($ids as $id){
            $job = Job::find($id);
            if ($job){
                $job->status=0;
                $job->save();
            }
        }
        return response()->json('success',201);
    }

    public function pending(){
        $jobs = Job::where('status',0)
            ->with('tags','users')
            ->orderBy('id','DESC')
            ->paginate(5);
        return view('admin.jobs.pending-list')
            ->with('jobs',$jobs);
    }

    public function viewPending($id){
        $job = Job::where('status',0)->find($id);
        if (!$job){
            abort(404);
        }
        return view('admin.jobs.pending',compact('job'));
    }

    public function approveJob($id){
        $job = Job::find($id);
        if ($job){
            $job->status = 1;
            $job->save();
            return response()->json('success',201);
        }
        return response()->json('error',422);
    }

    public function allApprovedJobs(){
        return view('admin.jobs.approved-list');
    }

    public function viewApproved($id){
        $job = Job::where('status',1)->find($id);
        if (!$job){
            abort(404);
        }
        return view('admin.jobs.approved',compact('job'));
    }

    public function delete($id){
        $jobs = Job::find($id);
        if ($jobs){
            $jobs->delete();
            return response()->json('success',201);
        }
        return response()->json('error',422);
    }
}
