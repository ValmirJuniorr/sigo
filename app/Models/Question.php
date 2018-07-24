<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    const STORE_QUESTION = 'store_question';

    const UPDATE_QUESTION = 'update_question';

    const DELETE_QUESTION = 'delete_question';

    const READ_QUESTION = 'read_question';


    public function group_question(){
        return $this->belongsTo(GroupQuestion::class);
    }

    public function get_last_priority($group_question_id)
    {
        return $this->read_by_group_question($group_question_id);
         $groupQuestions->lenth >0 ? $groupQuestions->last->priority+1: 1;
    }

    public function create($object, $arguments = [])
    {
        if(ValidatorModel::validation($this->inputs($object),$this->rules(),$this->attribute)){
            return $object->save();
        }
    }

    public function edit($object, $arguments = [])
    {
        $question_edit = Question::findorFail($object->id);
        $question_edit->title = $object->title;
        if(ValidatorModel::validation($this->inputs($question_edit),$this->rules($question_edit->id),$this->attribute)){
            return $question_edit->save();
        }
    }


    public function remove($object, $arguments = [])
    {
        return Question::findorFail($object->id)->delete();
    }

    public function read_by_group_question($group_question_id)
    {
        return Question::where('group_question_id', $group_question_id)->orderBy('group_question_id','ASC')->get();
    }

    private $attribute = array(
        'title' => 'Titúlo',
        'type' => 'Tipo',
        'priority' => 'Prioridade',
        'procedure_id' => 'Procedimento'
    );

    public function inputs($object)
    {
        return [
            'title' => $object->title,
            'priority' => $object->priority,
            'procedure_id' => $object->procedure_id
        ];
    }

    public function rules($id = 0)
    {
        return [
            'title' => 'required',
            'priority' => 'required',
            'procedure_id' => 'required|numeric|min:0'
        ];
    }
}
