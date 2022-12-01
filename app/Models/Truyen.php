<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Truyen extends Model
{
    protected $table = 'Truyen';
    use HasFactory;

   public function chuongs()
   {
      return $this->hasMany(Chuong::class,'MaTruyen');
   }
   public function loais()
   {
      return $this->belongsToMany(TheLoai::class,'ct_loai','MaTruyen','MaLoai');
   }
   public function timechuongs()
   {
      return $this->hasMany(Chuong::class,'MaTruyen')
          ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
   }
   public function comments()
   {
      return $this->hasMany(BinhLuan::class,'MaTruyen');
   }
   public function users()
   {
      return $this->belongsToMany(User::class,'theodoi','MaTruyen','MaNguoiDung');
   }
}