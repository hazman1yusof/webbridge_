<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class NursingController extends Controller
{

    public function show(Request $request)
    {   
    }

    public function post(Request $request)
    {   


        DB::beginTransaction();

        try {
            foreach ($request->post() as $key => $value) {
                switch ($key) {
                    case 'pathealth':
                        $this->pathealth($value);
                        break;
                }
            }
            echo 'success';

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            echo $e->getMessage();
        }

    }

    public function pathealth($value)
    { 
        
        $pathealth_arr = $value;

        foreach ($pathealth_arr as $obj) {
            $array = [];

            foreach ($obj as $data) {
                $array[$data[0]] = $data[1];
            }

            $this->cover_pathealth($array);
            $this->cover_patdietncase($array);
            $this->cover_patdietfup($array);


        }
    }

    public function cover_pathealth($array){
        $pathealth_obj = DB::table('hisdb.pathealth')
                            ->where('mrn','=',$array['mrn'])
                            ->where('episno','=',$array['episno']);
            
        if($pathealth_obj->exists()){
            $pathealth_obj = $pathealth_obj
                            ->where('recordtime','=',null);
                            
            $pathealth_obj->update($array);

        }else{
            DB::table('hisdb.pathealth')->insert($array);
        }
    }

    public function cover_patdietfup($array){
        $patdietfup_obj = DB::table('hisdb.patdietfup')->where('mrn','=',$array['mrn'])->where('episno','=',$array['episno']);

            
        if($patdietfup_obj->exists()){
            $edit_array = [];

            if($this->check_fld($patdietfup_obj,'height')){
                $edit_array = array_merge($edit_array,['height' => $array['height']]);
            }
            if($this->check_fld($patdietfup_obj,'weight')){
                $edit_array = array_merge($edit_array,['weight' => $array['weight']]);
            }
            if($this->check_fld($patdietfup_obj,'temperature')){
                $edit_array = array_merge($edit_array,['temperature' => $array['temperature']]);
            }
            if($this->check_fld($patdietfup_obj,'pulse')){
                $edit_array = array_merge($edit_array,['pulse' => $array['pulse']]);
            }
            if($this->check_fld($patdietfup_obj,'bp_sys1')){
                $edit_array = array_merge($edit_array,['bp_sys1' => $array['bp_sys1']]);
            }
            if($this->check_fld($patdietfup_obj,'bp_dias2')){
                $edit_array = array_merge($edit_array,['bp_dias2' => $array['bp_dias2']]);
            }
            if($this->check_fld($patdietfup_obj,'respiration')){
                $edit_array = array_merge($edit_array,['respiration' => $array['respiration']]);
            }
            if($this->check_fld($patdietfup_obj,'gxt')){
                $edit_array = array_merge($edit_array,['gxt' => $array['gxt']]);
            }
            if($this->check_fld($patdietfup_obj,'pain_score')){
                $edit_array = array_merge($edit_array,['pain_score' => $array['pain_score']]);
            }

            if(!empty($edit_array)){
                $patdietfup_obj->update($edit_array);
            }
        }else{
            DB::table('hisdb.patdietfup')->insert($array);
        }
        
    }

    public function cover_patdietncase($array){
        $patdietncase_obj = DB::table('hisdb.patdietncase')->where('mrn','=',$array['mrn']);
            
        if($patdietncase_obj->exists()){
            $edit_array = [];

            if($this->check_fld($patdietncase_obj,'height')){
                $edit_array = array_merge($edit_array,['height' => $array['height']]);
            }
            if($this->check_fld($patdietncase_obj,'weight')){
                $edit_array = array_merge($edit_array,['weight' => $array['weight']]);
            }
            if($this->check_fld($patdietncase_obj,'temperature')){
                $edit_array = array_merge($edit_array,['temperature' => $array['temperature']]);
            }
            if($this->check_fld($patdietncase_obj,'pulse')){
                $edit_array = array_merge($edit_array,['pulse' => $array['pulse']]);
            }
            if($this->check_fld($patdietncase_obj,'bp_sys1')){
                $edit_array = array_merge($edit_array,['bp_sys1' => $array['bp_sys1']]);
            }
            if($this->check_fld($patdietncase_obj,'bp_dias2')){
                $edit_array = array_merge($edit_array,['bp_dias2' => $array['bp_dias2']]);
            }
            if($this->check_fld($patdietncase_obj,'respiration')){
                $edit_array = array_merge($edit_array,['respiration' => $array['respiration']]);
            }
            if($this->check_fld($patdietncase_obj,'gxt')){
                $edit_array = array_merge($edit_array,['gxt' => $array['gxt']]);
            }
            if($this->check_fld($patdietncase_obj,'pain_score')){
                $edit_array = array_merge($edit_array,['pain_score' => $array['pain_score']]);
            }


            if(!empty($edit_array)){
                $patdietncase_obj->update($edit_array);
            }

        }else{

            $add_array = $this->array_except($array, ['episno']);

            DB::table('hisdb.patdietncase')->insert($add_array);
        }
        
    }

    public function check_fld($obj,$fld){
        $array = (array)$obj->first();

        if(empty($array[$fld]) || $array[$fld] == '0.00'){
            return true;
        }else{
            return false;
        }
    }

    public function array_except($array, $keys) {
      return array_diff_key($array, array_flip((array) $keys));   
    } 

}
