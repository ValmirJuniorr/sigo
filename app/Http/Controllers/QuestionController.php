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
            return back();
        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
    }









}
