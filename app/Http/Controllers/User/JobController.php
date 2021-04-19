<?php

namespace App\Http\Controllers\User;

use App\JobApplication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use App\User as UserModel;
use App\Tag;
use App\Job;
//use App\Like;
class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $job = Job::where('user_id',Auth::user()->id)->get();
        return view('front.job.list-datatable',compact('job'));
    }

    public function create()
    {
        $users = UserModel::all();
        $tags = Tag::all();
        return view('front.job.new',[
            "users" => $users,
            "tags" => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1. validation
        $this->validate($request,[
            'company_name'=>'required|min:6',
            'job_role'=>'required',
            'tag'=>'required|array|min:1',
            'job_type'=>'required',
            'job_description'=>'required|min:50',
            'visa_sponsor'=>'required',
            'location'=>'required',
            'remote_job'=>'required'
        ]);
        // 2. data insert
        $job = new Job();
        $job->user_id = Auth::user()->id;
        $job->company_name = $request->company_name;
        $job->job_role = $request->job_role;
        $job->job_type = $request->job_type;
        $job->job_description = $request->job_description;
        $job->visa_sponsor = $request->visa_sponsor;
        $job->location = $request->location;
        $job->remote_job = $request->remote_job;
        $job->status = 1;
        $job->save();
        // data insert in many to many relationship/link table
        $job->tags()->attach($request->tag);
        //message
        Session::flash('success','Succesfully Job Data Saved');
        return redirect()->back();
    }

    public function jobData(){
        $customData=[];
        $job = Job::where('user_id',Auth::user()->id)
            ->with('tags')
            ->orderBy('id','DESC')
            ->get();
        foreach($job as $row){
            $tags=[];
            foreach($row->tags as $tag){
                $tags[] =  $tag->name;
            }
            $customData[] = [
                'id'=>$row->id,
                'company_name'=>$row->company_name,
                'job_role'=>$row->job_role,
                'tags'=>$tags,
                'job_type'=>$row->job_type,
                'job_description'=>$row->job_description,
                'visa_sponsor'=>$row->visa_sponsor,
                'location'=>$row->location,
                'remote_job'=>$row->remote_job,
                'status'=>$row->status,
                'date'=>''.$row->created_at->diffForHumans()
            ];
        }
        $data_table_render = DataTables::of($customData)
            ->addColumn('hash',function ($row){
                return '<input type="checkbox" id="job_id_'.$row["id"].'">';
            })
            ->addColumn('action',function ($row){
                $view_url = url('view/job/'.$row['id']);
                $edit_url = url('edit/job/'.$row['id']);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>'.
                    '<a href="'.$view_url.'" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>'.
                    '<button onClick="deleteJob('.$row['id'].')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
            })
            ->editColumn('status',function ($row){
                $htmlElement = "";
                if ($row['status']==1){
                    $htmlElement = '<button class="btn btn-success btn-xs">Active</button>';
                }else{
                    $htmlElement = '<button class="btn btn-danger btn-xs">Inactive</button>';
                }
                return $htmlElement;
            })
            ->editColumn('tags',function ($row){
                $htmlElement = '';
                foreach ($row['tags'] as $tag){
                    $htmlElement .= '<button class="btn btn-success btn-xs">'.$tag.'</button>';
                }
                return $htmlElement;
            })
            ->rawColumns(['hash','status','action','tags'])
            ->make(true);
        return $data_table_render;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::where('user_id',Auth::user()->id)
            ->where('id',$id)->first();
        $tags = Tag::orderBy('name','ASC')->get();
        $tag_array=[];
        foreach ($job->tags as $tag){
            $tag_array[] = $tag->id;
        }
        return view('front.job.edit')
            ->with('job',$job)
            ->with('tags',$tags)
            ->with('tag_array',$tag_array);
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
        //validate
        $this->validate($request,[
            'company_name'=>'required|min:6',
            'job_role'=>'required',
            'tag'=>'required|array|min:1',
            'job_type'=>'required',
            'job_description'=>'required|min:50',
            'visa_sponsor'=>'required',
            'location'=>'required',
            'remote_job'=>'required'
        ]);
        // 2. data update
        $job = Job::find($id);
        $job->company_name = $request->company_name;
        $job->job_role = $request->job_role;
        $job->job_type = $request->job_type;
        $job->description = $request->description;
        $job->visa_sponsor = $request->visa_sponsor;
        $job->location = $request->location;
        $job->remote_job = $request->remote_job;
        $job->save();
        // data update in many to many relationship/link table
        $job->tags()->sync($request->tag);

        return response()->json('success',201);
    }
    public function view($id){
        $job = Job::where('user_id',Auth::id())
//            ->where('id',$id)->first();
            ->find($id);
        return view('front.job.view')
            ->with('job',$job);
    }

    public function deleteJob($id){
        $job = Job::where('user_id',Auth::id())
            ->find($id);
        if($job){
            $job->delete();
            return response()->json('successful',201);
        }
        return response()->json('error',422);
    }
    /*Search function for ANY route*/
    public function search(Request $request){
        $search = $request->input('title');
        $jobs = [];
        if ($search) {
            $jobs = Job::where('job_role', 'like', '%' . $search . '%')
                ->paginate(5)
                ->setPath('');
            $jobs->appends(['title' => $search]);
        }
        return view('front.job.search')
            ->with('jobs',$jobs);
    }
    //top job offers
    public function topJob(Request $request){
        $today = date('Y-m-d');
        /*get the value of url parameter*/
        $getParams = $request->input('day');

        $query = Job::orderBy('id','DESC');
        if ($getParams=="today"){
            $query->whereDate('created_at',$today);
        }else if($getParams=="week"){
            $date = new \DateTime($today);
            $date->modify('-7 day');
            $prevWeekDate = $date->format('Y-m-d');
            $query->whereDate('created_at','<=',$today);
            $query->whereDate('created_at','>=',$prevWeekDate);
        }else if($getParams=="month"){
            $date = new \DateTime($today);
            $date->modify('-30 day');
            $prevMonthDate = $date->format('Y-m-d');
            $query->whereDate('created_at','<=',$today);
            $query->whereDate('created_at','>=',$prevMonthDate);
        }

        /*paginate the result*/
        $job = $query->paginate(5);
        /*attach the url parameter with pagination link*/
        $job->appends(['day'=>$getParams]);

        return view('front.job.top-job')
            ->with('job',$job)
            ->with('activeParamBtn',$getParams);

        //return view('front.job.top-job');
    }
    //job offers method
    public function jobOffers($id){
        $job = Job::find($id);

//        dd($job->userApplication());
        return view('front.job.job-offers')
            ->with('job',$job);
    }
    //apply job form application method
    public function applyJob(Job $job){
        return view('front.job.apply-job',['job' => $job] );
    }
    //Job application store cv
    public function applicationStore(Request $request){
        //1. validation
        $this->validate($request,[
            'name'=>'required|min:6',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:11|numeric',
            'company_name'=>'required',
            'linkedin'=>'required',
            'github'=>'required',
            'full_form'=>'required',
            'get_post'=>'required',
//            'resume' =>'required|mimes:doc,docx,png,jpg,gif,jpeg'
        ]);

        //uplaod resume

        $file = $request->file('resume');
        if (!file_exists('upload')) {
            mkdir('upload', 0777, true);
        }

        $filename = time().$file->getClientOriginalName();
        $file->move("upload", $filename);

        // 2. data insert
        $job = new JobApplication();
        $job->user_id = Auth::user()->id;
        $job->name = $request->name;
        $job->job_id = $request->job_id;
        $job->email = $request->email;
        $job->phone = $request->phone;
        $job->company_name = $request->company_name;
        $job->linkedin = $request->linkedin;
        $job->github = $request->github;
        $job->full_form = $request->full_form;
        $job->get_post = $request->get_post;
        $job->resume = $filename;
        $job->status = 1;
        $job->save();

        //message
//        Session::flash('success','Succesfully Job  Application Data Saved');
        return redirect()->back()->withSuccess('success','Succesfully Job  Application Data Saved');
    }

    //  //job like method
    public function jobLikeJob(Request $request){
        $job_id = $request['jobId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $job = Job::find($job_id);
        if(!$job){
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('job_id', $job_id)->first();
        if($like){
            $already_like = $like->like;
            $update = true;
            if($already_like == $is_like){
                $like->delete();
                return null;
            }
        }else{
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->job_id = $job->id;

        if($update){
            $like->update();
        }else{
            $like->save();
        }
        return null;
    }

}
