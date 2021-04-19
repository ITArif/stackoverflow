<?php

namespace App\Http\Controllers\User;

use App\Answer;
use App\Comment;
use App\Rating;
use App\Rules\StripThenLength;
//use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)//route a parameter a akta id cilo tai ai parameter a id
    {
        $this->validate($request,[
            'answer'=>['required',new StripThenLength(6)]//ata oi validation rule amra banaici tai avabe
        ]);
        //insert the data
        $answer=new Answer();
        $answer->question_id=$id;//ai parameter er aboshoi $id ta
        $answer->user_id=Auth::user()->id;
        $answer->answer=$request->answer;
        $answer->status=1;
        $answer->best_answer=0;
        $answer->save();

        Session::flash('success','You have successfully saved answer!');
        return redirect()->back();

    }
    //storeComment method
    public function storeComment(Request $request,$answer_id){
        $this->validate($request,[
            'comment'=>'required|min:6'
        ]);
        //insert comment
        $comment=new Comment();
        $comment->answer_id=$answer_id;
        $comment->user_id=Auth::user()->id;
        $comment->comment=$request->comment;
        $comment->save();

        Session::flash('success','You have successfully saved the Comment!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $this->validate($request,[
            'answer'=>['required',new StripThenLength(6)]
        ]);
        //update the answer---update krle kintu new hobe na
        $answer=Answer::find($id);
        $answer->answer=$request->answer;
        $answer->save();

        Session::flash('success','Successfully answer data updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //Delete comment method
    public function deleteComment($id){
        //je person login kre ase se matro tar comment delete krte parbe otherwise parbe na
        $comment=Comment::where('user_id',Auth::user()->id)->where('id',$id)->first();
        if ($comment){
            $comment->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }

    //answeredList method
    public function answeredList(){
        return view('front.answer.list');
    }
    //Answered dataTable method(loop na kre ajax er mardhome data ana)
    public function answeredDataTable(){
       $answers=Answer::where('user_id',Auth::user()->id)->with('question')//with relationship a je column ta dorkar oi :de bole deye hoy
       ->get();
       $render_data_table=DataTables::of($answers)
           ->addColumn('Hash',function ($row){
               return '<input type="checkbox" id="'.$row->id.'">';
           })
           ->addColumn('action',function ($row){
               $view_url = url('show/question/'.$row->question->id);
               return '<a href="'.$view_url.'" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>'.
                   '<button onClick="deleteAnswer('.$row->id.')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
           })
           ->editColumn('answer',function ($row){//edit krar somomy name akoi hote hobe ex--jemon ami toh answer table er
               return strip_tags($row->answer);
           })
           ->rawColumns(['Hash','action','answer'])
           ->make(true);
       return $render_data_table;

    }

    //delete answer method
    public function deleteAnswer($id){
        $answer=Answer::where('user_id',Auth::user()->id)->where('id',$id)->first();
        if ($answer){
            $answer->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }

    //update comment
    public function updateComment(Request $request, $id,$answer){
        $comment=Comment::where('id',$id)->where('answer_id',$answer)->where('user_id',Auth::user()->id)->first();
        $comment->comment=$request->comment;
        $comment->save();

        Session::flash('success','Successfully comment updated');
        return redirect()->back();
    }
    //accept rating method
    public function acceptRating(Request $request)
    {
        if (Rating::updateOrCreate([
            "user_id" => Auth::id(),
            "answer_id" => $request->input('answerId'),
        ], [
            "amount" => $request->input('rating'),
        ])){
            $ans = Answer::find($request->input("answerId"));
            return Response::json($ans->getRating(), 200);
        }

    }
    //Best answer rate method
    public function rateAsBest($id){
        $answer=Answer::where('id',$id)->first();
        $answer->best_answer = 1;
        $answer->save();

        return response()->json('success',201);
    }

    //total answer count method
    public function totalAnswer(){
        $postsAnswer = Answer::count();
        return response()->json($postsAnswer);
    }
}
