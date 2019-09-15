<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class GiangVien extends Model
{
	public $table = 'giang_vien';
    public function get_one()
    {
        $ten_giang_vien = DB::select("select ten_giang_vien from giang_vien where ma_giang_vien = $this->ma_giang_vien");
        return $ten_giang_vien;
    }
    public function get_all()
    {
    	$array_giang_vien = DB::select("select*from $this->table");
    	return $array_giang_vien;	
    }
    public function get_he_so()
    {
        $he_so = DB::select("select he_so from giang_vien where ma_giang_vien = ?",[
            $this->ma_giang_vien
        ]);
        return $he_so;
    }
    public function cham_cong()
    {
    	DB::insert("insert into $this->table (ngay,ma_giang_Vien,ma_mon,ma_lop) values(?,?,?,?)",[$this->ngay,$this->ma_giang_vien,$this->ma_mon,$this->ma_lop]);
    }
    public function get_all_giang_vien_by_chuyen_nganh()
    {
        $array = DB::select("select * from $this->table
            where ma_chuyen_nganh = ?",[
                $this->ma_chuyen_nganh
            ]);
        return $array;
    }
    public function get_all_giang_vien_by_cn()
    {
        $array = DB::select("select * from $this->table
            where ma_chuyen_nganh = ?",[
                $this->ma_chuyen_nganh
            ]);
        return $array;
    }
    public function get_ma_cn()
    {
        $ma_chuyen_nganh = DB::select("select ma_chuyen_nganh from $this->table where ma_giang_vien = ?",[$this->ma_giang_vien]);
        return $ma_chuyen_nganh;
    }
}