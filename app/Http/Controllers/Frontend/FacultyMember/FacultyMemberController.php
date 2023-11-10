<?php

namespace App\Http\Controllers\Frontend\FacultyMember;

use App\Http\Controllers\Controller;
use App\Models\PersonnelsToFaculty;
use App\Models\ProfileAwardHonor;
use App\Models\ProfileBiography;
use App\Models\ProfileBook;
use App\Models\ProfileConference;
use App\Models\ProfileCourseTaught;
use App\Models\ProfileJournal;
use App\Models\ProfileResearchAreaInterest;
use App\Models\SocialMediaLink;
use Illuminate\Http\Request;

class FacultyMemberController extends Controller
{
    public function FacultyMember()
    {
        $data['profiles'] = PersonnelsToFaculty::with(['profile','faculty', 'department'])->select('department_id')->distinct()->get();
        // return ($data['profiles']);
        return view('frontend.faculty_member.faculty_member', $data);
    }

    public function FacultyMemberDetails($id)
    {
        $data['profile'] = PersonnelsToFaculty::with(['profile','faculty', 'department'])->findOrFail($id);
        $data['biographys'] = ProfileBiography::where('profile_id', $data['profile']->id)->get();
        $data['journals'] = ProfileJournal::where('profile_id', $data['profile']->id)->get();
        $data['conferences'] = ProfileConference::where('profile_id', $data['profile']->id)->get();
        $data['books'] = ProfileBook::where('profile_id', $data['profile']->id)->get();
        $data['researchs'] = ProfileResearchAreaInterest::where('profile_id', $data['profile']->id)->get();
        $data['awards'] = ProfileAwardHonor::where('profile_id', $data['profile']->id)->get();
        $data['courses'] = ProfileCourseTaught::where('profile_id', $data['profile']->id)->get();
        $data['social'] = SocialMediaLink::where('profile_id', $data['profile']->id)->first();

        return view('frontend.faculty_member.people_details', $data);
    }
}
