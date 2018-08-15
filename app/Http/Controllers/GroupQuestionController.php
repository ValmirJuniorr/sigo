<?php

namespace App\Http\Controllers;

use App\Exceptions\Util\ValidationException;
use App\Model\Transaction;
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
            $this->groupQuestion->priority = GroupQuestion::get_last_priority($this->groupQuestion->procedure_id);
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
        try{
            $this->groupQuestion->id = $request->input('group_question_id');
            $increment = $request->input('increment');
            GroupQuestion::change_priority($this->groupQuestion,$increment);
            return back();
        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
    }


    public function remove(Request $request)
    {
        try{
            $this->groupQuestion->id = $request->input('id');
            $this->groupQuestion->remove($this->groupQuestion);
            return back();
        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function readAllGroupQuestionsWithQuestions(Request $request){
        try{
            $procedure_id = $request->input('procedure_id');
            $transaction_id = $request->input('transaction_id');
            $transaction = new Transaction();
            $transaction_show = $transaction->show_transaction($transaction_id);
              if(!empty($transaction_show->procedure_answers)){
                return response()->json(json_decode($transaction_show->procedure_answers),200);
               }else{
               return response()->json(GroupQuestion::read_by_procedure_with_questions($procedure_id),200);
              }

        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
