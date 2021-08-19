<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use GuzzleHttp\Client;

class PatmastController extends Controller
{

    public function show(Request $request)
    {   

		$getid = $request->getid;
		$iniarray = parse_ini_file(public_path().'/uploadini/'.$getid."_patmast.ini", true, 0);

		foreach ($iniarray as $key => $value) {
			$value = $this->turn_into_appro_array($value);

			$patmast_obj = DB::table('hisdb.pat_mast')->where('mrn','=',$value['MRN']);

			if($patmast_obj->exists()){
				$patmast_obj->update($value);
				$lastid = $patmast_obj->first()->idno;
			}else{
				$lastid = DB::table('hisdb.pat_mast')->insertGetId($value);
			}

            
            $users_obj = DB::table('sysdb.users')->where('username','=',$value['Newic']);  
            
            if(!$users_obj->exists()){
                DB::table('sysdb.users')->insert([
                    'compcode' => '9A',
                    'username' => $value['Newic'],
                    'password' => $value['Newic'],
                    'name' => $value['Name'],
                    'groupid' => 'patient',
                    'mrn' => $value['MRN'],
                ]);
            }

		}

        $this->mesibo_id($value['Newic']);

        unlink(public_path().'/uploadini/'.$getid."_patmast.ini");
		$patmast = DB::table('hisdb.pat_mast')->where('idno','=',$lastid)->first();

        return view('patmast.show',compact('patmast'));
    }

    public function turn_into_appro_array($array){
    	$int_array = ['MRN','Episno','Postcode','Century','Accum_chg','Accum_Paid','first_visit_date','last_visit_date','Reg_Date','last_episno','FirstIpEpisNo','FirstOpEpisNo','AddDate','Lastupdate','NewMrn','pPostCode','DeceasedDate','upddate','idno'];
    	$date_array = ['DOB','first_visit_date','Reg_Date','last_visit_date','AddDate','Lastupdate','DeceasedDate','upddate'];

    	foreach ($array as $key => $value) {
    		// if(in_array($key, $date_array) && !empty($value)){
    		// 	$array[$key] = $this->turn_date($value);
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

    public function mesibo_id($username){

        $url = "https://api.mesibo.com/api.php?op=useradd&addr=".$username."&appid=com.".$username."&name=".$username."&active=1&token=yk2mza2txnms9qu31t0jaszpqm03s7ejyd7hk1obnsi78or4j2va6qx6s0qit8ot";

        $client = new Client(['base_uri' => $url]);

        $response = $client->get($url);

        dd($response);
    }


}
