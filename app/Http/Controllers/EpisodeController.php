<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class EpisodeController extends Controller
{

    public function show(Request $request)
    {   

		$getid = $request->getid;
		$iniarray = parse_ini_file(public_path().'/uploadini/'.$getid."_episode.ini", true, 0);

		foreach ($iniarray as $key => $value) {
			$value = $this->turn_into_appro_array($value);

			$episode_obj = DB::table('hisdb.episode')->where('mrn','=',$value['mrn'])->where('episno','=',$value['episno']);

			if($episode_obj->exists()){
				$episode_obj->update($value);
				$lastid = $episode_obj->first()->idno;
			}else{
				$lastid = DB::table('hisdb.episode')->insertGetId($value);
			}

		}
        
        unlink(public_path().'/uploadini/'.$getid."_episode.ini");
		$episode = DB::table('hisdb.episode')->where('idno','=',$lastid)->first();

        return view('episode.show',compact('episode'));
    }

    public function turn_into_appro_array($array){
    	$int_array = ['episno','depositreq','deposit','adddate','reg_date','dischargedate','allocdoc','allocbed','allocnok','allocicd','allocpayer','lastupdate','conversion','newcaseNP','newcaseP','followupP','followupNP','PkgAutoNo','PkgAutoNo','AdminFees','idno'];
    	$date_array = ['adddate','reg_date','dischargedate','lastupdate','Lastupdate','DeceasedDate','upddate'];
    	foreach ($array as $key => $value) {
    		// if(in_array($key, $date_array) && !empty($value)){
    		// 	$array[$key] = $this->turn_date($value);
    		// }
    		if(in_array($key, $int_array) && empty($value)){
    			unset($array[$key]);
    		}
    	}

    	return $array;
    }

    public function turn_into_appro_array_patmast($array){
        $int_array = ['MRN','Episno','Postcode','Century','Accum_chg','Accum_Paid','first_visit_date','last_visit_date','Reg_Date','last_episno','FirstIpEpisNo','FirstOpEpisNo','AddDate','Lastupdate','NewMrn','pPostCode','DeceasedDate','upddate','idno'];
        $date_array = ['DOB','first_visit_date','Reg_Date','last_visit_date','AddDate','Lastupdate','DeceasedDate','upddate'];

        foreach ($array as $key => $value) {
            // if(in_array($key, $date_array) && !empty($value)){
            //  $array[$key] = $this->turn_date($value);
            // }
            if(in_array($key, $int_array) && empty($value)){
                unset($array[$key]);
            }
        }
        // dd($array);

        return $array;
    }

    public static function turn_date($from_date,$from_format='d/m/Y'){
        $carbon = Carbon::createFromFormat($from_format,$from_date);
        return $carbon;
    }

    public function emergency(Request $request){

        $getid = $request->getid;
        $iniarray = parse_ini_file(public_path().'/uploadini/'.$getid."_patmast.ini", true, 0);

        foreach ($iniarray as $key => $value) {
            $value = $this->turn_into_appro_array_patmast($value);
// dd($value);
            $patmast_obj = DB::table('hisdb.pat_mast')->where('mrn','=',$value['MRN']);

            if($patmast_obj->exists()){
                $patmast_obj->update($value);
                $lastid = $patmast_obj->first()->idno;
            }else{
                $lastid = DB::table('hisdb.pat_mast')->insertGetId($value);
            }

            
            $users_obj = DB::table('sysdb.users')->where('username','=',$value['MRN']);  
            
            if(!$users_obj->exists()){
                DB::table('sysdb.users')->insert([
                    'compcode' => '9A',
                    'username' => $value['MRN'],
                    'password' => $value['MRN'],
                    'name' => $value['Name'],
                    'groupid' => 'patient'
                ]);
            }

        }
        $patmast = DB::table('pat_mast')->where('idno','=',$lastid)->first();

        $iniarray = parse_ini_file(public_path().'/uploadini/'.$getid."_episode.ini", true, 0);

        foreach ($iniarray as $key => $value) {
            $value = $this->turn_into_appro_array($value);

            $episode_obj = DB::table('hisdb.episode')->where('mrn','=',$value['mrn'])->where('episno','=',$value['episno']);

            if($episode_obj->exists()){
                $episode_obj->update($value);
                $lastid = $episode_obj->first()->idno;
            }else{
                $lastid = DB::table('hisdb.episode')->insertGetId($value);
            }

        }
        $episode = DB::table('hisdb.episode')->where('idno','=',$lastid)->first();

        return view('patmast.emergency',compact('episode','patmast'));

    }


}
