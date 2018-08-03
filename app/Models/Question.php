<?php

namespace App\Models;

use App\Models\Util\ValidatorModel;
use App\Exceptions\Util\ValidationException;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function group_question(){
        return $this->belongsTo(GroupQuestion::class);
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
        $question_edit->type = $object->type;
        if(ValidatorModel::validation($this->inputs($question_edit),$this->rules($question_edit->id),$this->attribute)){
            return $question_edit->save();
        }
    }

    public static function change_priority($question, $increment)
    {
        $question = Question::findorFail($group_question_one->id);
        if($increment == 1){
            $operator =  "<";
            $orderBy = "DESC";
        }else{
            $operator =  ">";
            $orderBy = "ASC";
        }
        $question_temp = Question::where('group_question_id', $question->group_question_id)
                                    ->orderBy('priority',$orderBy)
                                    ->where('priority' ,$operator,$question->priority)->first();
        if($question_temp == null){
            $msg  = ($operator == '<' ) ? "Não pode aumentar a prioridade do  primeiro" : "Não pode diminuir a prioridade do  ultimo";
            throw new ValidationException($msg);
        }
        $aux = $question->priority;
        $question->priority = $question_temp->priority;
        $question_temp->priority = $aux;
        $question->save();
        $question_temp->save();
    }


    public function remove($object, $arguments = [])
    {
        return Question::findorFail($object->id)->delete();
    }

    public function read_by_group_question($group_question_id)
    {
        return Question::where('group_question_id', $group_question_id)->orderBy('priority','ASC')->get();
    }

    public function get_last_priority($group_question_id)
    {
        $questions =  $this->read_by_group_question($group_question_id);
        $questions->count() >0 ? $questions->last()->priority+1: 1;
    }

    private $attribute = array(
        'title' => 'Título',
        'type' => 'Tipo',
        'priority' => 'Prioridade',
        'group_question_id' => 'Cabeçalho'
    );

    public function inputs($object)
    {
        return [
            'title' => $object->title,
            'priority' => $object->priority,
            'type' => $object->type,
            'group_question_id' => $object->group_question_id
        ];
    }

    public function rules($id = 0)
    {
        return [
            'title' => 'required',
            'priority' => 'required',
            'type' => 'required',
            'group_question_id' => 'required'
        ];
    }
}
