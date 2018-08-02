<?php

namespace App\Http\Controllers;

use App\Models\GroupQuestion;
use Illuminate\Http\Request;

class GroupQuestionController extends Controller
{

    private $groupQuestion;

    /**
     * ProcedureController constructor.
     */
    public function __construct()
    {
        $this->groupQuestion = new GroupQuestion();
    }

    public function store(Request $request)
    {
        try{
            $this->groupQuestion->title = $request->input('name');
            $this->groupQuestion->procedure_id = $request->input('procedure_id');
            $this->groupQuestion->priority = $this->groupQuestion->get_last_priority($this->groupQuestion->procedure_id);
            $this->groupQuestion->create($this->groupQuestion);
            return back();
        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function edit(Request $request)
    {
        try{
            $this->groupQuestion->id = $request->input('id');
            $this->groupQuestion->title = $request->input('name');
            $this->groupQuestion->edit($this->groupQuestion);
            return back();
        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function change_prioriry(Request $request)
    {
        $group_question = new GroupQuestion();        
        try{
            $group_question->id = $request->input('group_question_id');
            $increment = $request->input('increment');
            GroupQuestion::change_priority($group_question_one,$increment);
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
