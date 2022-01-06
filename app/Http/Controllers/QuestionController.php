<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    public function addQuestion(Request $request){

        $request->validate([
            'question' => 'required',
            'opa' => 'required',
            'opb' => 'required',
            'opc' => 'required',
            'opd' => 'required',
            'ans' => 'required',
        ]);

        $question = new Question();
        $question->question = $request->question;
        $question->a = $request->opa;
        $question->b = $request->opb;
        $question->c = $request->opc;
        $question->d = $request->opd;
        $question->ans = $request->ans;
        $question->save();

        Session::put(['question' => $question]);

        return redirect('question');

    }

    public function show(){
        $ques = Question::get();
        return view('quiz.question',compact('ques'));
    }

    public function update(Request $request){

        // $request->validate([
        //     'question' => 'required',
        //     'opa' => 'required',
        //     'opb' => 'required',
        //     'opc' => 'required',
        //     'opd' => 'required',
        //     'ans' => 'required',
        // ]);

        $update = Question::find($request->id);
        $update->question = $request->question;
        $update->a = $request->opa;
        $update->b = $request->opb;
        $update->c = $request->opc;
        $update->d = $request->opd;
        $update->ans = $request->ans;
        $update->update();

        Session::put('successMessage',"iugyug");

        return redirect('question');

    }

    public function delete(Request $request){
        $delete = Question::find($request->id)->delete();

        return back();
    }

    public function startQuiz(){

        Session::put("nextquestion","1");
        Session::put("wrongquestion","0");
        Session::put("correctquestion","0");

        $q = Question::all()->first();

        // dd($q);

        // Session::get(['question']);

        return view('quiz.answer')->with(['question' => $q]);


    }
    public function submitAns(Request $request){

        $nextquestion = 0;
        $wrongquestion = 0;
        $correctquestion = 0;


      $nextquestion =  Session::get("nextquestion");
      $wrongquestion =   Session::get("wrongquestion");
      $correctquestion =  Session::get("correctquestion");


        $nextquestion+=1;

        if($request->dbans == $request->ans){
            $correctquestion+=1;
        }else{
            $wrongquestion+=1;
        }

        Session::put("nextquestion",$nextquestion);
        Session::put("wrongquestion", $wrongquestion);
        Session::put("correctquestion", $correctquestion);

        $i = 0;

        $questions = Question::all();
        $i++;
        foreach($questions as $question){
            // dd($questions->count() < $nextquestion);
            if($question->count() < $nextquestion){
                return view('quiz.end');
            }
            dd($i == $nextquestion);
            if($i == $nextquestion){
                return view('quiz.answer')->with(['question' => $question]);
            }
        }

    }

}
