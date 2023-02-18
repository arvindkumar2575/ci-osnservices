<?php

namespace App\Libraries;

use App\Models\Common;

class Utilslib
{
    protected $session;
    protected $common;
    public function __construct()
    {
        $this->session = session();
        $this->common = new Common();
    }

    public function get_course_plan_details(){
        $result = array();
        $cp = $this->common->getCoursePlanDetails();
        foreach ($cp as $key => $value) {
            if(isset($result[$value['course_id']])){
                $p=array(
                    'plan_id'=>$value['plan_id'],
                    'plan_name'=>$value['plan_name'],
                    'plan_description'=>$value['plan_description'],
                    'plan_price'=>$value['plan_price'],
                    'plan_discount'=>$value['plan_discount'],
                    'plan_duration'=>$value['plan_duration']
                );
                array_push($result[$value['course_id']]['plans'],$p);
            }else{
                $result[$value['course_id']] = array(
                    'course_id'=>$value['course_id'],
                    'course_name'=>$value['course_name'],
                    'course_description'=>$value['course_description'],
                    'url'=>$value['url'],
                    'plans'=>array([
                        'plan_id'=>$value['plan_id'],
                        'plan_name'=>$value['plan_name'],
                        'plan_description'=>$value['plan_description'],
                        'plan_price'=>$value['plan_price'],
                        'plan_discount'=>$value['plan_discount'],
                        'plan_duration'=>$value['plan_duration']
                    ])
                );
            }
        }
        
        return $result;
    }


}
