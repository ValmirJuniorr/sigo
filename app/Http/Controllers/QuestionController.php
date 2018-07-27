<?php

namespace App\Http\Controllers;

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
            $this->question->priority = $this->question->get_last_priority($this->question->group_question_id);
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
            $
            $this->question->id = $request->input('id');
//            Question::change_priority($this->question,)
//            GroupQuestion::change_priority($group_question_one,$group_question_two);
            return back();
        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
    }


    public function remove(Request $request)
    {
        try{
            $this->groupQuestion->id = $request->input('id');
            $this->groupQuestion->procedure_id = $request->input('procedure_id');
            $this->groupQuestion->remove($this->groupQuestion);
            return back();
        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
    }

}
