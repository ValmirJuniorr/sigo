<?php

namespace App\Http\Controllers;

use App\Exceptions\Util\ValidationException;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{




    private $question;

    /**
     * ProcedureController constructor.
     */
    public function __construct()
    {
        $this->question = new Question();
    }

    public function store(Request $request)
    {
        try{
            $this->question->title = $request->input('title');
            $this->question->type = $request->input('type');
            $this->question->group_question_id = $request->input('group_question_id');
            $this->question->priority = 1;
            $this->question->create($this->question);
            return back();
        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
    }


    public function edit(Request $request)
    {
        try{
            $this->question->id = $request->input('id');
            $this->question->title = $request->input('name');
            $this->question->type = $request->input('type');
            $this->question->edit($this->question);
            return back();
        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function change_prioriry(Request $request)
    {
        try{
            $this->question->id = $request->input('question_id');
            $increment = $request->input('increment');
            Question::change_priority($this->question,$increment);
            return back();
        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
    }


    public function remove(Request $request)
    {
        try{
            $this->question->id = $request->input('id');
            $this->question->remove($this->question);
            return back();
        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
    }

}
