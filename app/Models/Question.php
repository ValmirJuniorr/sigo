<?php

namespace App\Models;

use App\Models\Util\ValidatorModel;
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

    public static function change_priority($question_one, $question_two)
    {
        $question_one = Question::findorFail($question_one->id);
        $question_two = Question::findorFail($question_two->id);
        $aux =$question_one->priority;
        $question_one->priority = $question_two->priority;
        $question_two->priority = $aux;
        $question_one->save();
        $question_two->save();
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
