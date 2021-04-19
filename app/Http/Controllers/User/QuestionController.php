<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Question;
use App\Tag;
use App\UpVote;
use App\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //questions list er method=1 ajax deye
    public function index()
    {
        //query ta condition deye korte hoise cause khali id na(only je questions krse tar tai dekhabe)
        $question=Question::where('user_id',Auth::user()->id)->get();
        return view('front/question/list-datatable',compact('question'));
    }
    //questions list er method=2php deye
    public function rawTable()
    {
        //query ta condition deye korte hoise cause khali id na(only je questions krse tar tai dekhabe)
        $question=Question::where('user_id',Auth::user()->id)->get();
        return view('front/question/list',compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        $tag=Tag::all();
        return view('front.question.new')
            ->with('categories',$category)
            ->with('tags',$tag);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1. Validation
        $this->validate($request,[
            'title'=>'required|min:4',
            'category'=>'required',
            'tag'=>'required|array|min:1',
            'description'=>'required|min:10'
        ]);
        // 2. Data insert
        $question=new Question();
        //dd($question);
        $question->title=$request->title;
        $question->category_id=$request->category;
        $question->user_id=Auth::user()->id;//ata session deye dhora user toh age login kre data submit dey tai
        $question->description=$request->description;
        $question->status=1;
        $question->visit_count=0;
        $question->save();

        // data insert in many to many relationship/link table
        //jehetu ami tag a data debo(save korar poro ja ni cause kebol tag delam)
        //only it's used many to many relationship
        $question->tags()->attach($request->tag);//ai tag ta kintu array name=tag[] ase form a

        //Message
        Session::flash('success','Successfully Data Inserted');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question=Question::find($id);
        //oi je question view count method
        $blogKey='blog_'.$question->id;
        if(!Session::has($blogKey)){
            $question->increment('visit_count');
            Session::put($blogKey,1);
        }
       return view('front.question.show')->with('question',$question);
    }

    //total question count method
    public function totalQuestion(){
        $postsQuestions = Question::count();
         return response()->json($postsQuestions);
    }

    //total vote count method
    public function totalvote(){
        $postsVote = Vote::count();
        return response()->json($postsVote);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //questions edit from list-datatable
        $question=Question::where('user_id',Auth::user()->id)->where('id',$id)->first();
        //jehetu tag taw lagbe tai tag ta nei
        $tags=Tag::orderBy('name','ASC')->get();
        //jehetu category taw lagbe tai category ta nei
        $categories=Category::orderBy('name','ASC')->get();
        //tag er array banate hobe nahole edit blade a tag ta hoy na
        $tag_array=[];
        foreach ($question->tags as $tag){
            $tag_array[]=$tag->id;
        }
        return view('front.question.edit')
            ->with('question',$question)
            ->with('categories',$categories)
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
    //For update questions method============questions updated method
    public function update(Request $request, $id)
    {
        //validate
        $this->validate($request,[
               'title'=>'required|min:6',
               'category'=>'required',
               'tag'=>'required|array|min:1',
               'description'=>'required|min:10'
            ]);
        //Updated the data(database er questions table akoi entity name age)
        $quest=Question::find($id);
        $quest->title=$request->title;
        $quest->category_id=$request->category;
        $quest->description=$request->description;
        $quest->save();

        // data update in many to many relationship/link table
        $quest->tags()->sync($request->tag);

        return response()->json('success',201);
    }

    //view er method
    public function view($id){
        $question=Question::where('user_id',Auth::user()->id)->where('id',$id)->first();
        return view('front.question.view')->with('question',$question);
    }
    //ata server side korar jonno kortesi cause onek data hobe tai
    public function questionData(){
        //$customeData=[];====ata akta array veriable neye ager je tag a loop krsi thik oirokomi krbo
        $customData=[];
        $question=Question::where('user_id',Auth::user()->id)
            ->with('tags')//tag ta query er sathee na pathleow hobto use krle problem nei
            ->orderBy('id','DESC')
            ->get();
        foreach($question as $qust){
            $tags=[];
            foreach($qust->tags as $tag){
                $tags[]= $tag->name;
            }
            $customData[]=[
                'id'=>$qust->id,
                'title'=>$qust->title,
                'category_name'=>$qust->category->name,//questions er sathee category relation ase
                'question_tags'=>$tags,//$tag=[]===kre loop kre korte hoise cause name ta
                'status'=>$qust->status,
                'date'=>''.$qust->created_at
            ];
        }
        $data_table_render= DataTables::of($customData)
            //table column a hash# ata oi php list er moto krar jonno method addColumn
            ->addColumn('hash',function ($row){
                return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    $view_url=url('view/question/'.$row['id']);
                    $edit_url=url('edit/question/'.$row['id']);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>'.
                     '<a href="'.$view_url.'" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>'.
                    //javascript deye oi list datatable er delete button click kre delete krbo er method(view.blade a ase)
                     '<button onClick="deleteQuestion('.$row['id'].')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
            })
            //status edit krsi cause age khali active thakle 1 asto tai avabe kre active r deactie
            ->editColumn('status',function ($row){
                $htmlElement="";
                 if ($row['status']==1){
                     $htmlElement='<button class="btn btn-success btn-xs">Active</button>';
                 }else{
                     $htmlElement='<button class="btn btn-danger btn-xs">Inactive</button>';
                 }
                 return $htmlElement;
            })
            //tag ta loop krte hobe tai edit column a nelam
            ->editColumn('question_tags',function ($row){
                $htmlElement="";
                   foreach ($row['question_tags'] as $tag){
                       $htmlElement .='<button class="btn btn-success btn-xs">'.$tag.'</button>';
                   }
                return $htmlElement;
            })
            ->rawColumns(['hash','status','action','question_tags'])
            ->make(true);
        return $data_table_render;
    }

    //Top questions method
    public function topQuestion(Request $request){//ata amader request method er moto nete hobe
        //get the get parameter value of url
        $option=$request->input('option');

        $query=Question::orderBy('id','DESC')->where('status',1);//jeta jeta sob akoi laravel ota 1ta krlei hobe bolse
        /*here we conditionally add mysql where condition to a query object */
        $today=date('y-m-d');
        if ($option=="today"){
            $query->whereDate('created_at', $today);
        }elseif ($option=="week"){
            $week=new \DateTime($today);
            $week->modify('-6 days');
            $weekDate=$week->format('y-m-d');
            $query->whereDate('created_at','>=',$weekDate);
            $query->whereDate('created_at','<=',$today);
        }elseif ($option=="month"){
            $month=new \DateTime($today);
            $month->modify('-30 days');
            $monthDate=$month->format('y-m-d');
            $query->whereDate('created_at','>=',$monthDate);
            $query->whereDate('created_at','<=',$today);
        }
        $questions=$query->paginate(5);
        //dd($questions);
        /* Used when your query is filter query and search query */
        //(jokhon custome search data k paginate krte chaow sejonno appends method detei hobe)good logic url a dekhen page soho dhore
        $questions->appends(['option'=>$option]);//jemon jokhon month er paginate 2 dekhbo tokhon url a top/questions?option=month&page=2 dekhabe
        return view('front.question.top-question')
            ->with('question',$questions)
            ->with('activeParamBtn',$option);
    }

    //DeleteQuestion method
    public function deleteQuestion($id){
        $question=Question::where('user_id',Auth::user()->id)->where('id',$id)->first();
        //important kotha==jehetu ata amra ajax deye krtesi tai akhane kichu return hobe na
        if ($question){
            $question->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }

    //Search bar a questions serach deye dekha
    public function search(Request $request){
        //Search ta receieved ta kre nete hoy age...search.blade.php te form er name ase otai
        $searchValue=$request->input('search');
        $questions=[];

        if($searchValue){
            $questions=Question::where('status',1)
            ->where('title','like','%'.$searchValue.'%')
            ->paginate(3);
            $questions->appends(['search'=>$searchValue]);
        }
        return view('front.question.search')->with('question',$questions);
    }

    //vote method
    public function vote($id){
        $vote = new Vote();
        $vote->question_id = $id;
        $vote->user_id = Auth::user()->id;
        $vote->save();
        Session::flash('success','Up Vote Successfully Done');
        return redirect()->back();
    }
    public function cancelVote($id){
        $vote = Vote::where('question_id',$id)
            ->where('user_id',Auth::user()->id)
            ->first();
        $vote->delete();
        Session::flash('success','Down Vote Successfully Done');
        return redirect()->back();
    }
}
