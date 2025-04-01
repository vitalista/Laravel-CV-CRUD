<?php
namespace App\Services;
use App\Models\Cvs;

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

        $application = Cvs::create($data);
        $data['id'] = $application->id;
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