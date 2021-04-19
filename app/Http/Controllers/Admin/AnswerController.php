<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class AnswerController extends Controller
{
    public function renderApprovedDataTable(){
        $answers = Answer::orderBy('id','DESC')
            ->with('question','user')
            ->get();
        // dd($answers);
        $render = DataTables::of($answers)
            ->addColumn('hash',function ($row){
                //return $row->id;
                return '<input type="checkbox" name="answer_ids[]" value="'.$row->id.'">';
            })
            ->addColumn('action',function ($row){
                $view_url = route('view.approved.answer',$row->id);
                return '<a href="'.$view_url.'" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>'.
                    '<button type="button" onclick="deletesAnswer('.$row->id.')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
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
            ->editColumn('user',function ($row){
                return $row->user->name;
            })
            ->editColumn('created_at',function ($row){
                return $row->created_at->diffForHumans();
            })
            ->editColumn('question',function ($row){
                $htmlElement = '';
                $htmlElement = $row->questions->title;
                return $htmlElement;
            })
            ->editColumn('answer',function ($row){
                return strip_tags($row->answer);
            })
            ->rawColumns(['hash','question','answer','status','action','user','created_at'])
            ->make(true);

        return $render;
    }

    public function deleteAll(Request $request){
        $ids = $request->answer_ids;
        foreach ($ids as $id){
            $answer = Answer::find($id);
            if ($answer){
                $answer->delete();
            }
        }
        return response()->json('success',201);
    }

    public function activateAll(Request $request){
        $ids = $request->answer_ids;
        foreach ($ids as $id){
            $answer = Answer::find($id);
            if ($answer){
                $answer->status=1;
                $answer->save();
            }
        }
        return response()->json('success',201);
    }

    public function deactivateAll(Request $request){
        $ids = $request->answer_ids;
        foreach ($ids as $id){
            $answer = Answer::find($id);
            if ($answer){
                $answer->status=0;
                $answer->save();
            }
        }
        return response()->json('success',201);
    }

    public function pending(){
        $answers = Answer::where('status',0)
            ->with('question','user')
            ->orderBy('id','DESC')
            ->paginate(5);
        return view('admin.answers.pending-list')
            ->with('answers',$answers);
    }

    public function viewPending($id){
        $answer = Answer::where('status',0)->find($id);
        if (!$answer){
            abort(404);
        }
        return view('admin.answers.pending',compact('answer'));
    }

    public function approveAnswer($id){
        $answer = Answer::find($id);
        if ($answer){
            $answer->status = 1;
            $answer->save();
            return response()->json('success',201);
        }
        return response()->json('error',422);
    }

    public function allApprovedAnswers(){
        return view('admin.answers.approved-list');
    }

    public function viewApproved($id){
        $answer = Answer::where('status',1)->find($id);
        if (!$answer){
            abort(404);
        }
        return view('admin.answers.approved',compact('answer'));
    }

    public function delete($id){
        $answers = Answer::find($id);
        if ($answers){
            $answers->delete();
            return response()->json('success',201);
        }
        return response()->json('error',422);
    }
}
