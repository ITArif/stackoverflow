<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class QuestionController extends Controller
{
    public function renderApprovedDataTable(){
        $questions = Question::orderBy('id','DESC')
            ->with('tags','category')
            ->get();
        //$tags = Tag::orderBy('name','ASC')->get();
        $render = DataTables::of($questions)
            ->addColumn('hash',function ($row){
                //return $row->id;
                return '<input type="checkbox" name="question_ids[]" value="'.$row->id.'">';
            })
            ->addColumn('action',function ($row){
                $view_url = route('view.approved.question',$row->id);
                return '<a href="'.$view_url.'" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>'.
                    '<button type="button" onclick="deletesQuestion('.$row->id.')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
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
            ->editColumn('tags',function ($row){
                $htmlElement = '';
                foreach ($row->tags as $tag){
                    $htmlElement .= '<button class="btn btn-success btn-xs">'.$tag->name.'</button>';
                }
                return $htmlElement;
            })
            ->rawColumns(['hash','tags','status','action','created_at'])
            ->make(true);

        return $render;
    }

    public function deleteAll(Request $request){
        $ids = $request->question_ids;
        foreach ($ids as $id){
            $question = Question::find($id);
            if ($question){
                $question->delete();
            }
        }
        return response()->json('success',201);
    }

    public function activateAll(Request $request){
        $ids = $request->question_ids;
        foreach ($ids as $id){
            $question = Question::find($id);
            if ($question){
                $question->status=1;
                $question->save();
            }
        }
        return response()->json('success',201);
    }

    public function deactivateAll(Request $request){
        $ids = $request->question_ids;
        foreach ($ids as $id){
            $question = Question::find($id);
            if ($question){
                $question->status=0;
                $question->save();
            }
        }
        return response()->json('success',201);
    }

    public function pending(){
        $questions = Question::where('status',0)
            ->with('tags','category','user')
            ->orderBy('id','DESC')
            ->paginate(5);
        return view('admin.questions.pending-list')
            ->with('question',$questions);
    }

    public function viewPending($id){
        $question = Question::where('status',0)->find($id);
        if (!$question){
            abort(404);
        }
        return view('admin.questions.pending',compact('question'));
    }

    public function approveQuestion($id){
        $question = Question::find($id);
        if ($question){
            $question->status = 1;
            $question->save();
            return response()->json('success',201);
        }
        return response()->json('error',422);
    }

    public function allApprovedQuestions(){
        return view('admin.questions.approved-list');
    }

    public function viewApproved($id){
        $question = Question::where('status',1)->find($id);
        if (!$question){
            abort(404);
        }
        return view('admin.questions.approved',compact('question'));
    }

    public function delete($id){
        $questions = Question::find($id);
        if ($questions){
            $questions->delete();
            return response()->json('success',201);
        }
        return response()->json('error',422);
    }
    public function getData(){

    }

    //total question count method
    public function totalQuestion(){
        $postsQuestions = Question::count();
        return response()->json($postsQuestions);
    }
}
