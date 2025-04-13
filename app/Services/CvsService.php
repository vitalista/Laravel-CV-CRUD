<?php
namespace App\Services;
use App\Models\Cvs;
use Illuminate\Support\Facades\DB;

class CvsService{

    public function getAllCvs(){
        return Cvs::all();
    }

    public function storeCv(array $data){

        $data = [
            'full_name' => $data['full_name'],
            'objective' => $data['objective'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'skills' => $data['skills'],
            'work_experince' => $data['work_experince'],
        ];

        $cv = Cvs::create($data);
        $cvId = $cv->id;
        $data['id'] = $cvId;

        DB::table('application')->insert([
            'cv_id' => $cvId,
            'application_status' => '',
            'application_link' => '',
            'company' => '',
            'created_at' => now(),
        ]);

        return $data;
    }

    public function getCvById(string $id){
        $cvs = Cvs::find($id);
    
        if ($cvs) {
            return $cvs;
        } else {
            return false;
        }
    }

    public function updateCv(string $id, array $data){

        $cvs = Cvs::findOrFail($id);
        $cvs->update([
            'full_name' => $data['full_name'],
            'objective' => $data['objective'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'skills' => $data['skills'],
            'work_experince' => $data['work_experince'],
        ]);

        return $cvs;
    }

    public function destroyCv(string $id){

        $cvs = Cvs::find($id);
        $cvs->delete();
        return true; 

    }

}