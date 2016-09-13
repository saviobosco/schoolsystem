<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 8/20/16
 * Time: 1:37 PM
 */

namespace ResultSystem\Controller\Component;


use Cake\Collection\Collection;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class ResultSystemComponent extends Component
{
    public function formatArrayData($arr,$type,$class_id,$term_id,$session_id,$result=[]){
        // find the subject list .
        $subjectList = $this->_findSubjectIdUsingClassBlockId($class_id);

        array_walk($arr, function($data) use(&$result,$type,$class_id,$term_id,$session_id,$subjectList){
            if(is_array($data)){
                foreach($data as $key=>$item){
                    if(preg_match("#(^[A-Z])#", $key)){
                        $result[] = [
                            'student_id'    =>$data['student_id'],
                            'subject_id'     => $subjectList[$key],
                            $type        => $data[$key],
                            'class_id'  => $class_id,
                            'term_id'   => $term_id,
                            'session_id' => $session_id
                        ];
                    }
                }
            }
        });
        return $result;
    }

    protected function _findSubjectIdUsingClassBlockId($class_id)
    {
        $subjectTable = TableRegistry::get('App.Subjects');
        $classTable = TableRegistry::get('App.Classes');

        // get the block id of the subject using the class id. This is to
        // differentiate between a subject belonging to a Junior and a Senior
        $classDetails = $classTable->get($class_id);
        $block_id = $classDetails->block_id ;

        $subjectList = $subjectTable->find('all')->select(['id','name'])->where(['block_id'=>$block_id])->combine('name','id')->toArray();
        return $subjectList;
    }
}