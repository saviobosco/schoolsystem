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
    /**
     * @param $arrayData
     * @param $type
     * @param $class_id
     * @param $term_id
     * @param $session_id
     * @param array $result
     * @return array
     */
    public function formatArrayData($arrayData,$type,$class_id,$term_id,$session_id,$result=[]){

        if (!empty($arrayData) && is_array($arrayData)) {
            // find the subject list .
            // checks to make sure the array is in the correct format.
            $arrayDataKeys = array_keys($arrayData[0]); // gets the array row data keys eg. ['0'=>'student_id','1'=>'MATHEMATICS','2'=>'ENGLISH']

            // checks if the first array key is student_id .
            // else return the $result['format_error']
            if (!array_key_exists('student_id',$arrayData[0])) {
                $result['format_error'] = 'The Excel file is not arranged in the proper format. The first column head is student_id and not <strong>'.$arrayDataKeys[0] .'</strong>. Please correct it.';
                return $result;
            }

            $subjectList = $this->_findSubjectIdUsingClassBlockId($class_id);

            for ($num = 1; $num < count($arrayDataKeys); $num++ ) {
                $this->_findSubjectIdUsingSubmittedKey($arrayDataKeys[$num],$subjectList,$result);
            }
            if (isset($result['error'])) {
                return $result;
            }

            array_walk($arrayData, function($data) use(&$result,$type,$class_id,$term_id,$session_id,$subjectList){
                if(is_array($data)){
                    foreach($data as $key=>$item){
                        if(preg_match("#(^[A-Z])#", $key)){
                            if ( $data[$key] !== '' and $data[$key] !== null ) {
                                $result['students_data'][] = [
                                    'student_id'    =>$data['student_id'],
                                    'subject_id'     => $subjectList[$key] /*$this->_findSubjectIdUsingSubmittedKey($key,$subjectList,$result) */,
                                    $type        => $data[$key],
                                    'class_id'  => $class_id,
                                    'term_id'   => $term_id,
                                    'session_id' => $session_id
                                ];
                            }
                        }
                    }
                }
            });
        }
        return $result;
    }

    /**
     * @param $class_id
     * @return array
     * _findSubjectIdUsingClassBlockId gets the subjects for a particular class
     * using its block_id. The block id is either senior or junior . The block id
     * is used to find the subjects from the database.
     */
    protected function _findSubjectIdUsingClassBlockId($class_id)
    {
        $subjectTable = TableRegistry::get('App.Subjects');
        $classTable = TableRegistry::get('App.Classes');

        // get the block id of the subject using the class id. This is to
        // differentiate between a subject belonging to a Junior and a Senior
        $classDetails = $classTable->get($class_id);

        $subjectList = $subjectTable->find('all')->select(['id','name'])->where(['block_id'=>$classDetails->block_id])->combine('name','id')->toArray();
        return $subjectList;
    }

    /**
     * @param $key
     * @param $subjectArray
     * @param null $resultArray
     * @return mixed
     * _findSubjectIdUsingSubmittedKey passes the $key to the $subjectArray to get subject id
     * if the $key does not exist in the subjectArray, it is add to the &$resultArray['error'] key
     */
    protected function _findSubjectIdUsingSubmittedKey($key,$subjectArray,&$resultArray = null)
    {
        if (array_key_exists($key,$subjectArray)) {
            return $subjectArray[$key];
        }
        $resultArray['error'][] = $key;
    }
}