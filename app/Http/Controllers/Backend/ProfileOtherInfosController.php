<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
use App\Models\SocialMediaLink;



class ProfileOtherInfosController extends Controller
{
    //Journal Start
    public function profile_journal_info_edit($profile_id)
    {
        $data['profile_id'] = $profile_id;
        $data['profile_journals'] = ProfileJournal::where('profile_id',$profile_id)->get();
        //dd($data['profile_journal']);
        return view('backend.manage_profile.journal_info.add')->with($data);
    }

    public function profile_journal_info_update(Request $request, $profile_id)
    {
        $profileJournals = ProfileJournal::where('profile_id',$profile_id)->get();
        if(count($profileJournals) == 0)
        {
            foreach($request->JournalDetail as $key => $val){
                $store = new ProfileJournal();
                $store->profile_id = $profile_id;
                $store->JournalDetail = $request->JournalDetail[$key];
                $store->save();
            }
        }
        else
        {
            $params = array();
            // dd($request->id);
            foreach($request->JournalDetail as $key => $val)
            {
                if($key >= 5000)
                {
                    if($request->JournalDetail[$key] == NULL)
                    {

                    }
                    else
                    {
                        $store = new ProfileJournal();
                        $store->profile_id = $profile_id;
                        $store->JournalDetail = $request->JournalDetail[$key];
                        $store->save();
                    }
                }
                else
                {
                    $params = array();
                    $params['JournalDetail'] = $request->JournalDetail[$key];
                    ProfileJournal::where('id',$request->journal_id[$key])->update($params);
                }
            }
        }
        return redirect()->back()->with('info','Information Update Successfully');
    }

    public function profile_journal_remove(Request $request)
    {
        $data = ProfileJournal::find($request->id);
        $data->delete();
        return redirect()->back()->with('info','Info Deleted Successfully');
    }

    public function profile_journal_info_add()
    {
        return view('backend.manage_profile.journal_info.add');
    }
    public function profile_journal_info_store(Request $request)
    {
        foreach($request->JournalDetail as $key => $val){
            $store = new ProfileJournal();
            $store->profile_id = $member->id;
            $store->JournalDetail = $request->JournalDetail[$key];
            $store->save();
        }
        return redirect()->back()->with('info','Info added Successfully');
    }
    //Journal Finished
    //Conference Start

    public function profile_conference_info_edit($profile_id)
    {
        $data['profile_id'] = $profile_id;
        $data['profile_conferences'] = ProfileConference::where('profile_id',$profile_id)->get();
        //dd($data['profile_conference']);
        return view('backend.manage_profile.conference_info.add')->with($data);
    }

    public function profile_conference_info_update(Request $request, $profile_id)
    {
        $profileConferences = ProfileConference::where('profile_id',$profile_id)->get();
        if(count($profileConferences) == 0)
        {
            foreach($request->ConferenceDetail as $key => $val){
                $store = new ProfileConference();
                $store->profile_id = $profile_id;
                $store->ConferenceDetail = $request->ConferenceDetail[$key];
                $store->save();
            }
        }
        else
        {
            $params = array();
            // dd($request->id);
            foreach($request->ConferenceDetail as $key => $val)
            {
                if($key >= 5000)
                {
                    if($request->ConferenceDetail[$key] == NULL)
                    {

                    }
                    else
                    {
                        $store = new ProfileConference();
                        $store->profile_id = $profile_id;
                        $store->ConferenceDetail = $request->ConferenceDetail[$key];
                        $store->save();
                    }
                }
                else
                {
                    $params = array();
                    $params['ConferenceDetail'] = $request->ConferenceDetail[$key];
                    ProfileConference::where('id',$request->conference_id[$key])->update($params);
                }
            }
        }
        return redirect()->back()->with('info','Information Update Successfully');
    }

    public function profile_conference_remove(Request $request)
    {
        $data = ProfileConference::find($request->id);
        $data->delete();
        return redirect()->back()->with('info','Info Deleted Successfully');
    }
    //Conference Finish
    //Book Start
    public function profile_book_info_edit($profile_id)
    {
        $data['profile_id'] = $profile_id;
        $data['profile_books'] = ProfileBook::where('profile_id',$profile_id)->get();
        //dd($data['profile_conference']);
        return view('backend.manage_profile.book_info.add')->with($data);
    }

    public function profile_book_info_update(Request $request, $profile_id)
    {
        $profileBooks = ProfileBook::where('profile_id',$profile_id)->get();
        if(count($profileBooks) == 0)
        {
            foreach($request->BookDetail as $key => $val){
                $store = new ProfileBook();
                $store->profile_id = $profile_id;
                $store->BookDetail = $request->BookDetail[$key];
                $store->save();
            }
        }
        else
        {
            $params = array();
            // dd($request->id);
            foreach($request->BookDetail as $key => $val)
            {
                if($key >= 5000)
                {
                    if($request->BookDetail[$key] == NULL)
                    {

                    }
                    else
                    {
                        $store = new ProfileBook();
                        $store->profile_id = $profile_id;
                        $store->BookDetail = $request->BookDetail[$key];
                        $store->save();
                    }
                }
                else
                {
                    $params = array();
                    $params['BookDetail'] = $request->BookDetail[$key];
                    ProfileBook::where('id',$request->book_id[$key])->update($params);
                }
            }
        }
        return redirect()->back()->with('info','Information Update Successfully');
    }

    public function profile_book_remove(Request $request)
    {
        $data = ProfileBook::find($request->id);
        $data->delete();
        return redirect()->back()->with('info','Info Deleted Successfully');
    }
    //Book Finish
    //Biography Start
    public function profile_biography_info_edit($profile_id)
    {
        $data['profile_id'] = $profile_id;
        $data['profile_biographys'] = ProfileBiography::where('profile_id',$profile_id)->get();
        //dd($data['profile_conference']);
        return view('backend.manage_profile.biography_info.add')->with($data);
    }

    public function profile_biography_info_update(Request $request, $profile_id)
    {
        $profileBiographys = ProfileBiography::where('profile_id',$profile_id)->get();
        if(count($profileBiographys) == 0)
        {
            foreach($request->Biography as $key => $val){
                $store = new ProfileBiography();
                $store->profile_id = $profile_id;
                $store->Biography = $request->Biography[$key];
                $store->save();
            }
        }
        else
        {
            $params = array();
            // dd($request->id);
            foreach($request->Biography as $key => $val)
            {
                if($key >= 5000)
                {
                    if($request->Biography[$key] == NULL)
                    {

                    }
                    else
                    {
                        $store = new ProfileBiography();
                        $store->profile_id = $profile_id;
                        $store->Biography = $request->Biography[$key];
                        $store->save();
                    }
                }
                else
                {
                    $params = array();
                    $params['Biography'] = $request->Biography[$key];
                    ProfileBiography::where('id',$request->biography_id[$key])->update($params);
                }
            }
        }
        return redirect()->back()->with('info','Information Update Successfully');
    }

    public function profile_biography_remove(Request $request)
    {
        $data = ProfileBiography::find($request->id);
        $data->delete();
        return redirect()->back()->with('info','Info Deleted Successfully');
    }
    //Biography Finish

    //Professional Activity Start
    public function profile_professional_activity_info_edit($profile_id)
    {
        $data['profile_id'] = $profile_id;
        $data['profile_professional_activitys'] = ProfileProfessionalActivity::where('profile_id',$profile_id)->get();
        //dd($data['profile_conference']);
        return view('backend.manage_profile.professional_activity_info.add')->with($data);
    }

    public function profile_professional_activity_info_update(Request $request, $profile_id)
    {
        $profileProfessionalActivitys = ProfileProfessionalActivity::where('profile_id',$profile_id)->get();
        if(count($profileProfessionalActivitys) == 0)
        {
            foreach($request->ProfessionalActivity as $key => $val){
                $store = new ProfileProfessionalActivity();
                $store->profile_id = $profile_id;
                $store->ProfessionalActivity = $request->ProfessionalActivity[$key];
                $store->save();
            }
        }
        else
        {
            $params = array();
            // dd($request->id);
            foreach($request->ProfessionalActivity as $key => $val)
            {
                if($key >= 5000)
                {
                    if($request->ProfessionalActivity[$key] == NULL)
                    {

                    }
                    else
                    {
                        $store = new ProfileProfessionalActivity();
                        $store->profile_id = $profile_id;
                        $store->ProfessionalActivity = $request->ProfessionalActivity[$key];
                        $store->save();
                    }
                }
                else
                {
                    $params = array();
                    $params['ProfessionalActivity'] = $request->ProfessionalActivity[$key];
                    ProfileProfessionalActivity::where('id',$request->professional_activity_id[$key])->update($params);
                }
            }
        }
        return redirect()->back()->with('info','Information Update Successfully');
    }

    public function profile_professional_activity_remove(Request $request)
    {
        $data = ProfileProfessionalActivity::find($request->id);
        $data->delete();
        return redirect()->back()->with('info','Info Deleted Successfully');
    }
    //Professional Activity Finish

    //Course Taught Start
    public function profile_course_taught_info_edit($profile_id)
    {
        $data['profile_id'] = $profile_id;
        $data['profile_course_taughts'] = ProfileCourseTaught::where('profile_id',$profile_id)->get();
        //dd($data['profile_conference']);
        return view('backend.manage_profile.course_taught_info.add')->with($data);
    }

    public function profile_course_taught_info_update(Request $request, $profile_id)
    {
        $profileCourseTaughts = ProfileCourseTaught::where('profile_id',$profile_id)->get();
        if(count($profileCourseTaughts) == 0)
        {
            foreach($request->CourseTaught as $key => $val){
                $store = new ProfileCourseTaught();
                $store->profile_id = $profile_id;
                $store->CourseTaught = $request->CourseTaught[$key];
                $store->save();
            }
        }
        else
        {
            $params = array();
            // dd($request->id);
            foreach($request->CourseTaught as $key => $val)
            {
                if($key >= 5000)
                {
                    if($request->CourseTaught[$key] == NULL)
                    {

                    }
                    else
                    {
                        $store = new ProfileCourseTaught();
                        $store->profile_id = $profile_id;
                        $store->CourseTaught = $request->CourseTaught[$key];
                        $store->save();
                    }
                }
                else
                {
                    $params = array();
                    $params['CourseTaught'] = $request->CourseTaught[$key];
                    ProfileCourseTaught::where('id',$request->course_taught_id[$key])->update($params);
                }
            }
        }
        return redirect()->back()->with('info','Information Update Successfully');
    }

    public function profile_course_taught_remove(Request $request)
    {
        $data = ProfileCourseTaught::find($request->id);
        $data->delete();
        return redirect()->back()->with('info','Info Deleted Successfully');
    }
    //Course Taught Finish

    //Award Honor Start
    public function profile_award_honor_info_edit($profile_id)
    {
        $data['profile_id'] = $profile_id;
        $data['profile_award_honors'] = ProfileAwardHonor::where('profile_id',$profile_id)->get();
        //dd($data['profile_conference']);
        return view('backend.manage_profile.award_honor_info.add')->with($data);
    }

    public function profile_award_honor_info_update(Request $request, $profile_id)
    {
        $profileAwardHonors = ProfileAwardHonor::where('profile_id',$profile_id)->get();
        if(count($profileAwardHonors) == 0)
        {
            foreach($request->AwardHonor as $key => $val){
                $store = new ProfileAwardHonor();
                $store->profile_id = $profile_id;
                $store->AwardHonor = $request->AwardHonor[$key];
                $store->save();
            }
        }
        else
        {
            $params = array();
            // dd($request->id);
            foreach($request->AwardHonor as $key => $val)
            {
                if($key >= 5000)
                {
                    if($request->AwardHonor[$key] == NULL)
                    {

                    }
                    else
                    {
                        $store = new ProfileAwardHonor();
                        $store->profile_id = $profile_id;
                        $store->AwardHonor = $request->AwardHonor[$key];
                        $store->save();
                    }
                }
                else
                {
                    $params = array();
                    $params['AwardHonor'] = $request->AwardHonor[$key];
                    ProfileAwardHonor::where('id',$request->award_honor_id[$key])->update($params);
                }
            }
        }
        return redirect()->back()->with('info','Information Update Successfully');
    }

    public function profile_award_honor_remove(Request $request)
    {
        $data = ProfileAwardHonor::find($request->id);
        $data->delete();
        return redirect()->back()->with('info','Info Deleted Successfully');
    }
    //Award Honor Finish

    //Membership Start
    public function profile_membership_info_edit($profile_id)
    {
        $data['profile_id'] = $profile_id;
        $data['profile_memberships'] = ProfileMembership::where('profile_id',$profile_id)->get();
        //dd($data['profile_conference']);
        return view('backend.manage_profile.membership_info.add')->with($data);
    }

    public function profile_membership_info_update(Request $request, $profile_id)
    {
        $profileMemberships = ProfileMembership::where('profile_id',$profile_id)->get();
        if(count($profileMemberships) == 0)
        {
            foreach($request->Membership as $key => $val){
                $store = new ProfileMembership();
                $store->profile_id = $profile_id;
                $store->Membership = $request->Membership[$key];
                $store->save();
            }
        }
        else
        {
            $params = array();
            // dd($request->id);
            foreach($request->Membership as $key => $val)
            {
                if($key >= 5000)
                {
                    if($request->Membership[$key] == NULL)
                    {

                    }
                    else
                    {
                        $store = new ProfileMembership();
                        $store->profile_id = $profile_id;
                        $store->Membership = $request->Membership[$key];
                        $store->save();
                    }
                }
                else
                {
                    $params = array();
                    $params['Membership'] = $request->Membership[$key];
                    ProfileMembership::where('id',$request->membership_id[$key])->update($params);
                }
            }
        }
        return redirect()->back()->with('info','Information Update Successfully');
    }

    public function profile_membership_remove(Request $request)
    {
        $data = ProfileMembership::find($request->id);
        $data->delete();
        return redirect()->back()->with('info','Info Deleted Successfully');
    }
    //Membership Finish

    //Research Area Interest Start
    public function profile_research_area_interest_info_edit($profile_id)
    {
        $data['profile_id'] = $profile_id;
        $data['profile_research_area_interests'] = ProfileResearchAreaInterest::where('profile_id',$profile_id)->get();
        //dd($data['profile_conference']);
        return view('backend.manage_profile.research_area_interest_info.add')->with($data);
    }

    public function profile_research_area_interest_info_update(Request $request, $profile_id)
    {
        $profileResearchAreaInterests = ProfileResearchAreaInterest::where('profile_id',$profile_id)->get();
        if(count($profileResearchAreaInterests) == 0)
        {
            foreach($request->ResearchAreasOrInterest as $key => $val){
                $store = new ProfileResearchAreaInterest();
                $store->profile_id = $profile_id;
                $store->ResearchAreasOrInterest = $request->ResearchAreasOrInterest[$key];
                $store->save();
            }
        }
        else
        {
            $params = array();
            // dd($request->id);
            foreach($request->ResearchAreasOrInterest as $key => $val)
            {
                if($key >= 5000)
                {
                    if($request->ResearchAreasOrInterest[$key] == NULL)
                    {

                    }
                    else
                    {
                        $store = new ProfileResearchAreaInterest();
                        $store->profile_id = $profile_id;
                        $store->ResearchAreasOrInterest = $request->ResearchAreasOrInterest[$key];
                        $store->save();
                    }
                }
                else
                {
                    $params = array();
                    $params['ResearchAreasOrInterest'] = $request->ResearchAreasOrInterest[$key];
                    ProfileResearchAreaInterest::where('id',$request->research_area_interest_id[$key])->update($params);
                }
            }
        }
        return redirect()->back()->with('info','Information Update Successfully');
    }

    public function profile_research_area_interest_remove(Request $request)
    {
        $data = ProfileResearchAreaInterest::find($request->id);
        $data->delete();
        return redirect()->back()->with('info','Info Deleted Successfully');
    }
    //Research Area Interest Finish

    //Google Scholar Start
    public function profile_google_scholar_info_edit($profile_id)
    {
        $data['profile_id'] = $profile_id;
        $data['profile_google_scholars'] = ProfileGoogleScholar::where('profile_id',$profile_id)->get();
        //dd($data['profile_conference']);
        return view('backend.manage_profile.google_scholar_info.add')->with($data);
    }

    public function profile_google_scholar_info_update(Request $request, $profile_id)
    {
        $profileGoogleScholars = ProfileGoogleScholar::where('profile_id',$profile_id)->get();
        if(count($profileGoogleScholars) == 0)
        {
            foreach($request->GoogleScholar as $key => $val){
                $store = new ProfileGoogleScholar();
                $store->profile_id = $profile_id;
                $store->GoogleScholar = $request->GoogleScholar[$key];
                $store->save();
            }
        }
        else
        {
            $params = array();
            // dd($request->id);
            foreach($request->GoogleScholar as $key => $val)
            {
                if($key >= 5000)
                {
                    if($request->GoogleScholar[$key] == NULL)
                    {

                    }
                    else
                    {
                        $store = new ProfileGoogleScholar();
                        $store->profile_id = $profile_id;
                        $store->GoogleScholar = $request->GoogleScholar[$key];
                        $store->save();
                    }
                }
                else
                {
                    $params = array();
                    $params['GoogleScholar'] = $request->GoogleScholar[$key];
                    ProfileGoogleScholar::where('id',$request->google_scholar_id[$key])->update($params);
                }
            }
        }
        return redirect()->back()->with('info','Information Update Successfully');
    }

    public function profile_google_scholar_remove(Request $request)
    {
        $data = ProfileGoogleScholar::find($request->id);
        $data->delete();
        return redirect()->back()->with('info','Info Deleted Successfully');
    }
    //Google Scholar Finish

    //Research Gate Start
    public function profile_research_gate_info_edit($profile_id)
    {
        $data['profile_id'] = $profile_id;
        $data['profile_research_gates'] = ProfileResearchGate::where('profile_id',$profile_id)->get();
        //dd($data['profile_conference']);
        return view('backend.manage_profile.research_gate_info.add')->with($data);
    }

    public function profile_research_gate_info_update(Request $request, $profile_id)
    {
        $profileResearchGates = ProfileResearchGate::where('profile_id',$profile_id)->get();
        if(count($profileResearchGates) == 0)
        {
            foreach($request->ResearchGate as $key => $val){
                $store = new ProfileResearchGate();
                $store->profile_id = $profile_id;
                $store->ResearchGate = $request->ResearchGate[$key];
                $store->save();
            }
        }
        else
        {
            $params = array();
            // dd($request->id);
            foreach($request->ResearchGate as $key => $val)
            {
                if($key >= 5000)
                {
                    if($request->ResearchGate[$key] == NULL)
                    {

                    }
                    else
                    {
                        $store = new ProfileResearchGate();
                        $store->profile_id = $profile_id;
                        $store->ResearchGate = $request->ResearchGate[$key];
                        $store->save();
                    }
                }
                else
                {
                    $params = array();
                    $params['ResearchGate'] = $request->ResearchGate[$key];
                    ProfileResearchGate::where('id',$request->research_gate_id[$key])->update($params);
                }
            }
        }
        return redirect()->back()->with('info','Information Update Successfully');
    }

    public function profile_research_gate_remove(Request $request)
    {
        $data = ProfileResearchGate::find($request->id);
        $data->delete();
        return redirect()->back()->with('info','Info Deleted Successfully');
    }
    //Research Gate Finish

    //Website Start
    public function profile_website_info_edit($profile_id)
    {
        $data['profile_id'] = $profile_id;
        $data['profile_websites'] = ProfileWebsite::where('profile_id',$profile_id)->get();
        //dd($data['profile_conference']);
        return view('backend.manage_profile.website_info.add')->with($data);
    }

    public function profile_website_info_update(Request $request, $profile_id)
    {
        $profileWebsites = ProfileWebsite::where('profile_id',$profile_id)->get();
        if(count($profileWebsites) == 0)
        {
            foreach($request->WebsiteAddress as $key => $val){
                $store = new ProfileWebsite();
                $store->profile_id = $profile_id;
                $store->WebsiteAddress = $request->WebsiteAddress[$key];
                $store->save();
            }
        }
        else
        {
            $params = array();
            // dd($request->id);
            foreach($request->WebsiteAddress as $key => $val)
            {
                if($key >= 5000)
                {
                    if($request->WebsiteAddress[$key] == NULL)
                    {

                    }
                    else
                    {
                        $store = new ProfileWebsite();
                        $store->profile_id = $profile_id;
                        $store->WebsiteAddress = $request->WebsiteAddress[$key];
                        $store->save();
                    }
                }
                else
                {
                    $params = array();
                    $params['WebsiteAddress'] = $request->WebsiteAddress[$key];
                    ProfileWebsite::where('id',$request->website_id[$key])->update($params);
                }
            }
        }
        return redirect()->back()->with('info','Information Update Successfully');
    }



    public function profile_website_remove(Request $request)
    {
        $data = ProfileWebsite::find($request->id);
        $data->delete();
        return redirect()->back()->with('info','Info Deleted Successfully');
    }
    //Website Finish


//Social Media Started

    public function profile_social_media_info_edit($profile_id)
    {
        $data['profile_id'] = $profile_id;
        $data['profilesocialLink'] = SocialMediaLink::where('profile_id',$profile_id)->first();
        return view('backend.manage_profile.social_media.add')->with($data);
    }

     public function profile_Social_media_info_update(Request $request, $profile_id)

     {
        $profileSocialMedia = SocialMediaLink::where('profile_id',$profile_id)->get();
        if(count($profileSocialMedia) == 0)
        {
            $store = new SocialMediaLink();
            $store->profile_id = $profile_id;
            $store->facebook_status=1;
            $store->linkedin_status=1;
            $store->twitter_status=1;
            $store->instagram_status=1;
            $store->whatsapp_status=1;
            $store->google_scholar_status=1;
            $store->research_gate_status=1;
            $store->website_status=1;
            $store->facebook_link = $request->facebook_link;
            $store->twitter_link = $request->twitter_link;
            $store->instagram_link = $request->instagram_link;
            $store->whatsapp_link = $request->whatsapp_link;
            $store->linkedin_link = $request->linkedin_link;
            $store->google_scholar_link = $request->google_scholar_link;
            $store->research_gate_link = $request->research_gate_link;
            $store->website_link = $request->website_link;
            $store->save();
        }
        else
        {
            $store = SocialMediaLink::where('profile_id',$request->profile_id)->first();
            $store->profile_id = $profile_id;
            $store->facebook_link = $request->facebook_link;
            $store->facebook_status=1;
            $store->linkedin_status=1;
            $store->twitter_status=1;
            $store->instagram_status=1;
            $store->whatsapp_status=1;
            $store->google_scholar_status=1;
            $store->research_gate_status=1;
            $store->website_status=1;
            $store->twitter_link = $request->twitter_link;
            $store->instagram_link = $request->instagram_link;
            $store->whatsapp_link = $request->whatsapp_link;
            $store->linkedin_link = $request->linkedin_link;
            $store->google_scholar_link = $request->google_scholar_link;
            $store->research_gate_link = $request->research_gate_link;
            $store->website_link = $request->website_link;
            // dd($store);
            $store->save();
            // SocialMediaLink::where('id',$request->profile_id)->update($store);
        }
        return redirect()->back()->with('info','Info Updated Successfully');


     }



}
