<?php

namespace App\Services;

use App\Models\Application;

class ApplicationService
{
    public function getAllApplications()
    {
        return Application::all();
    }

    public function updateApplication(string $id, array $data)
    {
        $application = Application::findOrFail($id);

        $application->update([
            'cv_id' => $data['cv_id'],
            'company' => $data['company'],
            'application_status' => $data['application_status'],
            'application_link' => $data['application_link'],
        ]);

        return $application;
    }

    public function storeApplication(array $data){
        $data = [
            'cv_id' => $data['cv_id'],
            'company' => $data['company'],
            'application_status' => $data['application_status'],
            'application_link' => $data['application_link'],
        ];

        $application = Application::create($data);

        $data['id'] = $application->id;

        return $data;
    }

    public function getApplicationById($id){
        $application = Application::find($id);
    
        if ($application) {
            return $application;
        } else {
            return false;
        }
    }

    public function destroyApplication(string $id)
    {
        $application = Application::find($id);
        $application->delete();
        return true; 
    }
}
