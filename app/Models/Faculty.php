<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class Faculty extends Model

{

 use HasFactory;



 protected $fillable = [

 'name',

 'department_id',


 'faculty_id',

 'email',

 ];



 public function department()

 {

 return $this->belongsTo(Department::class);

 }

}
