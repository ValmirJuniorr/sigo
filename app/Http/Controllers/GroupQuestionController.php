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
            //$this->groupQuestion->priority = $this->groupQuestion->get_last_priority($this->groupQuestion->procedure_id);
            $this->groupQuestion->priority = 1;
            $this->groupQuestion->create($this->groupQuestion);
            return back();
        }catch (ValidationException $e){
            return null;
        }
    }
}
