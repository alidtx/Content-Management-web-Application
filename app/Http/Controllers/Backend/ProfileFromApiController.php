<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Profile;
use App\Models\ProfileJournal;
use App\Models\ProfileConference;
use App\Models\ProfileBook;
use App\Models\ProfileBiography;
use App\Models\ProfileProfessionalActivity;
use App\Models\ProfileCourseTaught;
use App\Models\ProfileAwardHonor;
use App\Models\ProfileMembership;
use App\Models\ProfileResearchAreaInterest;
use App\Models\ProfileGoogleScholar;
use App\Models\ProfileResearchGate;
use App\Models\ProfileWebsite;
use App\Models\PersonnelsToFaculty;
use App\Models\PersonnelsToOffice;
use App\Models\SocialMediaLink;
use App\Services\FacultyService;
use App\Services\DepartmentService;
use Illuminate\Http\UploadedFile;

class ProfileFromApiController extends Controller
{
    public function index()
    {
        $profile_bup_nos = Profile::pluck('bup_no')->toArray();
        // dd($profile_bup_nos);
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', 'https://api.bup.edu.bd/api/GetFacultyDepartmentWiseProfile?departmentId=0&facultyId=0');
        // dd($res);
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        // dd($apiDatas);
        foreach ($apiDatas as $key => $apiData) {
            if (!in_array($apiData['BupNo'], $profile_bup_nos))
                $clientdatas[] = $apiData;
        }
        // dd($clientdatas);

        //For Office Api
        // $profile_nameENs = Profile::pluck('nameEn')->toArray();
        // $resOffice = $client->request('GET','http://103.121.194.29/BUPWebApi/api/GetOfficeEmployeeProfile?officeId=0&page=0&size=0');
        // $apiDatasOffice = json_decode($resOffice->getBody()->getContents(), true);

        // foreach($apiDatasOffice as $key=>$apiDataOffice) {
        //     if(!in_array($apiDataOffice['NameEng'], $profile_nameENs))
        //     $clientdatas[] = $apiDataOffice;
        // }
        //End for Office Api

        return view('backend.manage_profile.from_api.view', compact('clientdatas'));
    }

    public function index_office()
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', 'https://api.bup.edu.bd/api/GetOfficeEmployeeProfile?officeId=0&page=0&size=0');
        //dd($res);
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        foreach ($apiDatas as $key => $apiData) {
            $profile = Profile::where('personnel_type', 2)
                ->where('designation', $apiData['Designation'])
                ->where('nameEn', $apiData['NameEng'])
                ->first();

            //dd($profile);
            if (is_null($profile)) {
                $clientdatas[] = $apiData;
            }
        }
        return view('backend.manage_profile.from_api.view_office', compact('clientdatas'));
    }

    public function file_get_contents_curl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
        curl_setopt($ch, CURLOPT_URL, $url);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function insertAllToDB()
    {
        $profile_bup_nos = Profile::pluck('bup_no')->toArray();
        //dd($profile_bup_nos);
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', 'https://api.bup.edu.bd/api/GetFacultyDepartmentWiseProfile?departmentId=0&facultyId=0');
        // dd('aa');

        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        foreach ($apiDatas as $key => $apiData) {
            if (!in_array($apiData['BupNo'], $profile_bup_nos))
                $clientdatas[] = $apiData;
        }
        // dd($clientdatas);

        Profile::truncate();
        SocialMediaLink::truncate();
        PersonnelsToFaculty::truncate();
        PersonnelsToOffice::truncate();
        ProfileJournal::truncate();
        ProfileConference::truncate();
        ProfileBook::truncate();
        ProfileBiography::truncate();
        ProfileProfessionalActivity::truncate();
        ProfileCourseTaught::truncate();
        ProfileAwardHonor::truncate();
        ProfileMembership::truncate();
        ProfileResearchAreaInterest::truncate();

        foreach ($clientdatas as $clientdata) {
            $profile = new Profile;
            if (!empty($clientdata['DepartmentId'])) {
                $dept_id = DepartmentService::ExistCheck($clientdata['DepartmentId'], $clientdata['Department']);
            } else {
                $dept_id = null;
            }

            if (!empty($clientdata['FacultyId'])) {
                $profile->personnel_type = 1;
                $faculty_id = FacultyService::ExistCheck($clientdata['FacultyId'], $clientdata['Faculty']);
            } else if (!empty($clientdata['OfficeID'])) {
                $profile->personnel_type = 2;
                $faculty_id = NULL;
                $dept_id = NULL;
            } else {
                $profile->personnel_type = 3;
                $faculty_id = NULL;
                $dept_id = NULL;
            }
            // $profile->faculty_id = $faculty_id;
            // $profile->department_id = $dept_id;
            // $profile->office_id = $clientdata['OfficeID'] ?? NULL;
            $profile->bup_no = $clientdata['BupNo'] ?? NULL;
            $profile->nameEn = $clientdata['NameEng'] ?? NULL;
            $profile->nameBn = $clientdata['NameBng'] ?? NULL;
            $profile->email = $clientdata['Email'] ?? NULL;
            $profile->designation = $clientdata['Designation'] ?? NULL;
            $profile->phone = $clientdata['Phone'] ?? NULL;
            $profile->mobile = $clientdata['Mobile'] ?? NULL;
            $profile->blood_group = $clientdata['BloodGroup'] ?? NULL;
            $profile->photo_path = $clientdata['PhotoPath'] ?? NULL;
            $profile->rank = $clientdata['Rank'] ?? NULL;
            $profile->appointment_type = $clientdata['AppointmentType'] ?? NULL;
            $profile->detail_education = $clientdata['DetailEducation'] ?? NULL;
            $profile->experience = $clientdata['Experience'] ?? NULL;

            // 
            // $photo_path = $clientdata['PhotoPath'] ?? NULL;
            // if ($photo_path && @file_get_contents($photo_path)) {
            //     $info = pathinfo($photo_path);
            //     $contents = @file_get_contents($photo_path);
            //     $file = public_path('upload/profiles/') . $info['basename'];
            //     file_put_contents($file, $contents);
            //     $uploaded_file = new UploadedFile($file, $info['basename']);

            //     $profile->photo = $info['basename'];
            // }

            // 

            $profile->save();

            $social_media = new SocialMediaLink();

            if (!empty($clientdata['GoogleScholar']) || !empty($clientdata['ResearchGate']) || !empty($clientdata['Website'])) {
                // foreach($clientdata['GoogleScholar'] as $single)
                // {
                // $profileGoogleScholar = new ProfileGoogleScholar;
                $social_media->profile_id = $profile->id;
                $social_media->google_scholar_link = $clientdata['GoogleScholar'][0]['GoogleScholar'] ?? NULL;
                $social_media->research_gate_link = $clientdata['ResearchGate'][0]['ResearchGate'] ?? NULL;
                $social_media->website_link = $clientdata['WebsiteAddress'][0]['WebsiteAddress'] ?? NULL;
                // return $apiDatas[7]['GoogleScholar'][0]['GoogleScholar'];

                $social_media->save();
                // }
            } else {
                $social_media->profile_id = $profile->id;
                $social_media->google_scholar_link =  NULL;
                $social_media->research_gate_link =  NULL;
                $social_media->website_link =  NULL;
                // return $apiDatas[7]['GoogleScholar'][0]['GoogleScholar'];

                $social_media->save();
            }

            if (!empty($clientdata['FacultyId'])) {
                $profile->personnel_type = 1;
                $params = array();
                $params['faculty_id'] = $faculty_id;
                $params['department_id'] = $dept_id;
                $params['profile_id'] = $profile->id;
                PersonnelsToFaculty::create($params);
            } else if (!empty($clientdata['OfficeID'])) {
                $profile->personnel_type = 2;
                $params = array();
                $params['office_id'] = $clientdata['OfficeID'] ?? NULL;
                $params['profile_id'] = $profile->id;
                PersonnelsToOffice::create($params);
            } else {
                $profile->personnel_type = 3;
            }

            if (!empty($clientdata['Journal'])) {
                foreach ($clientdata['Journal'] as $single) {
                    $profileJournal = new ProfileJournal;
                    $profileJournal->profile_id = $profile->id;
                    $profileJournal->JournalDetail = $single['JournalDetail'] ?? NULL;
                    $profileJournal->save();
                }
            }

            if (!empty($clientdata['Conference'])) {
                foreach ($clientdata['Conference'] as $single) {
                    $profileConference = new ProfileConference;
                    $profileConference->profile_id = $profile->id;
                    $profileConference->ConferenceDetail = $single['ConferenceDetail'] ?? NULL;
                    $profileConference->save();
                }
            }

            if (!empty($clientdata['Book'])) {
                foreach ($clientdata['Book'] as $single) {
                    $profileBook = new ProfileBook;
                    $profileBook->profile_id = $profile->id;
                    $profileBook->BookDetail = $single['BookDetail'] ?? NULL;
                    $profileBook->save();
                }
            }

            if (!empty($clientdata['Biography'])) {
                foreach ($clientdata['Biography'] as $single) {
                    $profileBiography = new ProfileBiography;
                    $profileBiography->profile_id = $profile->id;
                    $profileBiography->Biography = $single['Biography'] ?? NULL;
                    $profileBiography->save();
                }
            }

            if (!empty($clientdata['ProfessionalActivity'])) {
                foreach ($clientdata['ProfessionalActivity'] as $single) {
                    $profileProfessionalActivity = new ProfileProfessionalActivity;
                    $profileProfessionalActivity->profile_id = $profile->id;
                    $profileProfessionalActivity->ProfessionalActivity = $single['ProfessionalActivity'] ?? NULL;
                    $profileProfessionalActivity->save();
                }
            }

            if (!empty($clientdata['CourseTaught'])) {
                foreach ($clientdata['CourseTaught'] as $single) {
                    $profileCourseTaught = new ProfileCourseTaught;
                    $profileCourseTaught->profile_id = $profile->id;
                    $profileCourseTaught->CourseTaught = $single['CourseTaught'] ?? NULL;
                    $profileCourseTaught->save();
                }
            }

            if (!empty($clientdata['AwardHonor'])) {
                foreach ($clientdata['AwardHonor'] as $single) {
                    $profileAwardHonor = new ProfileAwardHonor;
                    $profileAwardHonor->profile_id = $profile->id;
                    $profileAwardHonor->AwardHonor = $single['AwardHonor'] ?? NULL;
                    $profileAwardHonor->save();
                }
            }

            if (!empty($clientdata['Membership'])) {
                foreach ($clientdata['Membership'] as $single) {
                    $profileMembership = new ProfileMembership;
                    $profileMembership->profile_id = $profile->id;
                    $profileMembership->Membership = $single['Membership'] ?? NULL;
                    $profileMembership->save();
                }
            }

            if (!empty($clientdata['ResearchAreaInterest'])) {
                foreach ($clientdata['ResearchAreaInterest'] as $single) {
                    $profileResearchAreaInterest = new ProfileResearchAreaInterest;
                    $profileResearchAreaInterest->profile_id = $profile->id;
                    $profileResearchAreaInterest->ResearchAreasOrInterest = $single['ResearchAreasOrInterest'] ?? NULL;
                    $profileResearchAreaInterest->save();
                }
            }
        }
        return redirect()->back()->with('success', 'Data Inserted Successfully');
    }
    public function insertAllToDB_Office()
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', 'https://api.bup.edu.bd/api/GetOfficeEmployeeProfile?officeId=0&page=0&size=0');

        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        foreach ($apiDatas as $key => $apiData) {
            $profile = Profile::where('personnel_type', 2)
                ->where('designation', $apiData['Designation'])
                ->where('nameEn', $apiData['NameEng'])
                ->first();

            //dd($apiData['Designation']);
            if (is_null($profile)) {
                $clientdatas[] = $apiData;
            }
        }
        foreach ($clientdatas as $clientdata) {
            $profile = new Profile;
            if (!empty($clientdata['FacultyId'])) {
                $profile->personnel_type = 1;
            } else if (!empty($clientdata['OfficeID'])) {
                $profile->personnel_type = 2;
            } else {
                $profile->personnel_type = 3;
            }
            // $profile->faculty_id = $clientdata['FacultyId'] ?? NULL;
            // $profile->department_id = $clientdata['DepartmentId'] ?? NULL;
            // $profile->office_id = $clientdata['OfficeID'] ?? NULL;
            $profile->bup_no = $clientdata['BupNo'] ?? NULL;
            $profile->nameEn = $clientdata['NameEng'] ?? NULL;
            $profile->nameBn = $clientdata['NameBng'] ?? NULL;
            $profile->email = $clientdata['Email'] ?? NULL;
            $profile->designation = $clientdata['Designation'] ?? NULL;
            $profile->phone = $clientdata['Phone'] ?? NULL;
            $profile->mobile = $clientdata['Mobile'] ?? NULL;
            $profile->blood_group = $clientdata['BloodGroup'] ?? NULL;
            $profile->rank = $clientdata['Rank'] ?? NULL;
            $profile->appointment_type = $clientdata['AppointmentType'] ?? NULL;
            $profile->detail_education = $clientdata['DetailEducation'] ?? NULL;
            $profile->experience = $clientdata['Experience'] ?? NULL;
            // $profile->photo_path = $clientdata['PhotoPath'] ?? NULL;

            // $photo_path = $clientdata['PhotoPath'] ?? NULL;

            //     if($photo_path && @file_get_contents($photo_path))
            //     {
            //         $info = pathinfo($photo_path);
            //         $contents = @file_get_contents($photo_path);
            //         $file = public_path('upload/profiles/') . $info['basename'];
            //         file_put_contents($file, $contents);
            //         $uploaded_file = new UploadedFile($file, $info['basename']);

            //         $profile->photo = $info['basename'];
            //     }

            $profile->save();

            if (!empty($clientdata['FacultyId'])) {
                $profile->personnel_type = 1;
                $params = array();
                $params['faculty_id'] = $clientdata['FacultyId'] ?? NULL;
                $params['department_id'] = $clientdata['DepartmentId'] ?? NULL;
                $params['profile_id'] = $profile->id;
                PersonnelsToFaculty::create($params);
            } else if (!empty($clientdata['OfficeID'])) {
                $profile->personnel_type = 2;
                $params = array();
                $params['office_id'] = $clientdata['OfficeID'] ?? NULL;
                $params['profile_id'] = $profile->id;
                PersonnelsToOffice::create($params);
            } else {
                $profile->personnel_type = 3;
            }

            if (!empty($clientdata['Journal'])) {
                foreach ($clientdata['Journal'] as $single) {
                    $profileJournal = new ProfileJournal;
                    $profileJournal->profile_id = $profile->id;
                    $profileJournal->JournalDetail = $single['JournalDetail'] ?? NULL;
                    $profileJournal->save();
                }
            }

            if (!empty($clientdata['Conference'])) {
                foreach ($clientdata['Conference'] as $single) {
                    $profileConference = new ProfileConference;
                    $profileConference->profile_id = $profile->id;
                    $profileConference->ConferenceDetail = $single['ConferenceDetail'] ?? NULL;
                    $profileConference->save();
                }
            }

            if (!empty($clientdata['Book'])) {
                foreach ($clientdata['Book'] as $single) {
                    $profileBook = new ProfileBook;
                    $profileBook->profile_id = $profile->id;
                    $profileBook->BookDetail = $single['BookDetail'] ?? NULL;
                    $profileBook->save();
                }
            }

            if (!empty($clientdata['Biography'])) {
                foreach ($clientdata['Biography'] as $single) {
                    $profileBiography = new ProfileBiography;
                    $profileBiography->profile_id = $profile->id;
                    $profileBiography->Biography = $single['Biography'] ?? NULL;
                    $profileBiography->save();
                }
            }

            if (!empty($clientdata['ProfessionalActivity'])) {
                foreach ($clientdata['ProfessionalActivity'] as $single) {
                    $profileProfessionalActivity = new ProfileProfessionalActivity;
                    $profileProfessionalActivity->profile_id = $profile->id;
                    $profileProfessionalActivity->ProfessionalActivity = $single['ProfessionalActivity'] ?? NULL;
                    $profileProfessionalActivity->save();
                }
            }

            if (!empty($clientdata['CourseTaught'])) {
                foreach ($clientdata['CourseTaught'] as $single) {
                    $profileCourseTaught = new ProfileCourseTaught;
                    $profileCourseTaught->profile_id = $profile->id;
                    $profileCourseTaught->CourseTaught = $single['CourseTaught'] ?? NULL;
                    $profileCourseTaught->save();
                }
            }

            if (!empty($clientdata['AwardHonor'])) {
                foreach ($clientdata['AwardHonor'] as $single) {
                    $profileAwardHonor = new ProfileAwardHonor;
                    $profileAwardHonor->profile_id = $profile->id;
                    $profileAwardHonor->AwardHonor = $single['AwardHonor'] ?? NULL;
                    $profileAwardHonor->save();
                }
            }

            if (!empty($clientdata['Membership'])) {
                foreach ($clientdata['Membership'] as $single) {
                    $profileMembership = new ProfileMembership;
                    $profileMembership->profile_id = $profile->id;
                    $profileMembership->Membership = $single['Membership'] ?? NULL;
                    $profileMembership->save();
                }
            }

            if (!empty($clientdata['ResearchAreaInterest'])) {
                foreach ($clientdata['ResearchAreaInterest'] as $single) {
                    $profileResearchAreaInterest = new ProfileResearchAreaInterest;
                    $profileResearchAreaInterest->profile_id = $profile->id;
                    $profileResearchAreaInterest->ResearchAreasOrInterest = $single['ResearchAreasOrInterest'] ?? NULL;
                    $profileResearchAreaInterest->save();
                }
            }

            $social_media = new SocialMediaLink();

            if (!empty($clientdata['GoogleScholar']) || !empty($clientdata['ResearchGate']) || !empty($clientdata['Website'])) {
                // foreach($clientdata['GoogleScholar'] as $single)
                // {
                // $profileGoogleScholar = new ProfileGoogleScholar;
                $social_media->profile_id = $profile->id;
                $social_media->google_scholar_link = $clientdata['GoogleScholar'][0]['GoogleScholar'] ?? NULL;
                $social_media->research_gate_link = $clientdata['ResearchGate'][0]['ResearchGate'] ?? NULL;
                $social_media->website_link = $clientdata['WebsiteAddress'][0]['WebsiteAddress'] ?? NULL;
                // return $apiDatas[7]['GoogleScholar'][0]['GoogleScholar'];

                $social_media->save();
                // }
            } else {
                $social_media->profile_id = $profile->id;
                $social_media->google_scholar_link =  NULL;
                $social_media->research_gate_link =  NULL;
                $social_media->website_link =  NULL;
                // return $apiDatas[7]['GoogleScholar'][0]['GoogleScholar'];

                $social_media->save();
            }

            // if(!empty($clientdata['GoogleScholar']))
            // {
            //     foreach($clientdata['GoogleScholar'] as $single)
            //     {
            //         $profileGoogleScholar = new ProfileGoogleScholar;
            //         $profileGoogleScholar->profile_id = $profile->id;
            //         $profileGoogleScholar->GoogleScholar = $single['GoogleScholar'] ?? NULL;
            //         $profileGoogleScholar->save();
            //     }
            // }

            // if(!empty($clientdata['ResearchGate']))
            // {
            //     foreach($clientdata['ResearchGate'] as $single)
            //     {
            //         $profileResearchGate = new ProfileResearchGate;
            //         $profileResearchGate->profile_id = $profile->id;
            //         $profileResearchGate->ResearchGate = $single['ResearchGate'] ?? NULL;
            //         $profileResearchGate->save();
            //     }
            // }

            // if(!empty($clientdata['Website']))
            // {
            //     foreach($clientdata['Website'] as $single)
            //     {
            //         $profileWebsite = new ProfileWebsite;
            //         $profileWebsite->profile_id = $profile->id;
            //         $profileWebsite->WebsiteAddress = $single['WebsiteAddress'] ?? NULL;
            //         $profileWebsite->save();
            //     }
            // }

        }
        return redirect()->back()->with('success', 'Data Inserted Successfully');
    }

    public function Add()
    {
        return view('backend.manage_faculty.add_faculty');
    }

    public function Store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required|unique:faculties',
            'ucam_faculty_id' => 'required|unique:faculties'
        ]);

        $data = new Faculty();
        $data->name = $request->name;
        $data->ucam_faculty_id = $request->ucam_faculty_id;
        // $img = $request->file('image');
        // if ($img) {
        //     $imgName = date('YmdHi').$img->getClientOriginalName();
        //     $img->move('public/upload/slider_images/', $imgName);
        //     $data['image'] = $imgName;
        // }
        // $data->created_by = Auth::user()->id;
        // dd($data);
        $data->save();
        return redirect()->route('setup.manage_faculty')->with('success', 'Data Saved successfully');
    }

    public function viewSingleProfile($BupNo)
    {

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://103.121.194.29/BUPWebApi/api/GetIndividualFacultyProfile?bupNo=' . $BupNo);
        // dd($res);
        $clientdatas = json_decode($res->getBody()->getContents(), true);
        //dd($clientdatas);
        return view('backend.manage_profile.from_api.view_single_profile', compact('clientdatas'));
    }
    public function viewSingleProfilewithName($NameEng)
    {
        //dd($NameEng);
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://103.121.194.29/BUPWebApi/api/GetIndividualFacultyProfile?bupNo=' . $NameEng);
        // dd($res);
        $clientdatas = json_decode($res->getBody()->getContents(), true);
        //dd($clientdatas);
        return view('backend.manage_profile.from_api.view_single_profile', compact('clientdatas'));
    }

    public function Edit($id)
    {
        $data['editData'] = Faculty::find($id);
        return view('backend.manage_faculty.add_faculty', $data);
    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'ucam_faculty_id' => 'required'
        ]);
        $data = Faculty::find($id);
        $data->name = $request->name;
        $data->ucam_faculty_id = $request->ucam_faculty_id;
        // $img = $request->file('image');
        // if ($img) {
        //     @unlink(public_path('upload/slider_images/'.$data->image));
        //     $imgName = date('YmdHi').$img->getClientOriginalName();
        //     $img->move('public/upload/slider_images/', $imgName);
        //     $data['image'] = $imgName;
        // }
        // $data->updated_by = Auth::user()->id;
        // dd($data);
        $data->save();
        return redirect()->route('setup.manage_faculty')->with('success', 'Data Updated successfully');
    }

    public function Delete(Request $request)
    {
        $data = Faculty::find($request->id);
        // if (file_exists('public/upload/slider_images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('public/upload/slider_images/' . $data->image);
        // }
        $data->delete();

        return redirect()->route('setup.manage_faculty')->with('success', 'Data Deleted successfully');
    }
}
