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
            $this->groupQuestion->title = $request->input('title');
            $this->groupQuestion->procedure_id = $request->input('procedure_id');
            $this->groupQuestion->priority = $this->groupQuestion->getLastPriority($this->groupQuestion->procedure_id);
            return $this->groupQuestion->create($this->groupQuestion);
        }catch (ValidationException $e){
            return null;
        }
    }
}
