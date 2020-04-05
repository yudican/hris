<?php

namespace App\Http\Controllers\Client;

use App\Models\Province;
use App\Models\PostalCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function kabupaten($key)
    {
        $params = base64_decode($key);
        $provinces = Province::where('province_name', $params)->get();
        $result = [];
        foreach ($provinces as $province) {
            $result[] = $this->unique_array($province->kodepos, 'city');
        }
        return response()->json($result);
    }

    public function kecamatan($key)
    {
        $params = base64_decode($key);
        $kodepos = PostalCode::where('city', $params)->get();
        $result = [];
        $result[] = $this->unique_array($kodepos, 'sub_district');
        return response()->json($result, 200);
    }

    public function kelurahan($key)
    {
        $params = base64_decode($key);
        $kodepos = PostalCode::where('sub_district', $params)->get();
        $result = [];
        $result[] = $this->unique_array($kodepos, 'urban');
        return response()->json($result, 200);
    }

    public function kodepos($key) 
    {
        $params = base64_decode($key);
        $kodepos = PostalCode::where('urban', $params)->get();
        $result = [];
        $result[] = $this->unique_array($kodepos, 'postal_code');
        return response()->json($result, 200);
    }

    protected function unique_array($array, $key)
    {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }
}
