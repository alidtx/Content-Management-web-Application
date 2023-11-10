<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cpc;
use App\Models\CpcSection;
use App\Models\Profile;
use App\Models\CpcResourcePerson;
use App\Models\CpcContactPerson;
use App\Models\Faq;
use App\Models\News;
use App\Services\CpcServices;

class CpcController extends Controller
{
    public function view()
    {
        $cpcs = Cpc::all();
        return view('backend.cpc.view',compact('cpcs'));
    }

    public function eventList($id)
    {
        $events = News::where('cpc_id', $id)->where('type', 2)->get();
        return view('backend.cpc.event', compact('events'));
    }

    public function newstList($id)
    {
        $news = News::with('cpc')->where('cpc_id', $id)->where('type', 1)->get();
        return view('backend.cpc.news', compact('news'));
    }

    public function add()
    {
        return view('backend.cpc.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $cpc = New Cpc();
        $cpc->name = $request->name;
        $cpc->description = $request->description;
        $cpc->save();
        return redirect()->back()->with('success','Cpc Added successfully');
        // return view('backend.cpc.add');
    }

    public function cpcSectionList($id)
    {
        $cpc_section = CpcSection::where('cpc_id',$id)->get();
        //  return $cpc_section;
         return view('backend.cpc.section.view-cpc-section',compact('cpc_section','id'));
    }

    public function sectionAdd()
    {
        return view('backend.cpc.section.add');
    }
    public function sectionStore(Request $request)
    {
        $request->validate([
           'title' => 'required'
        ]);

        $new_cpc = new CpcSection();
        $new_cpc->cpc_id = 3;
        $new_cpc->title = $request->title;
        $new_cpc->description = $request->description;
        $new_cpc->save();
        return back()->with('success','Data Added Success');
        // return view('backend.cpc.section.add');
    }

    public function sectionEdit($id)
    {
       $data = CpcSection::find($id);
        // return $data;
        return view('backend.cpc.section.edit',compact('data'));
    }

    public function updateCpcSection($id, Request $request)
    {
        // return $request->all();
        $update = CpcSection::find($id);
        $update->description = $request->description;
        $update->save();
        return back()->with('success','Update success');
    }

    public function ourTeam()
    {
        return "team";
        return view('backend.cpc.team.add');
    }


    public function resourcePeople($cpc_id)
    {
        $data['cpc'] = Cpc::where('id',$cpc_id)->first();
        $data['profiles'] = Profile::all();
        return view('backend.cpc.resource_people.add',$data);
    }

    public function resourceStore(Request $request, CpcServices $service)
    {
        // return $request->all();
        $request->validate([
            'cpc_service_id' => 'required',
            'profile_id' => 'required',
        ],[
            'cpc_service_id.required' => 'CPC Service is Required',
            'profile_id.required' => 'Resource person is Required',
        ]);

    //    $service->saveData($request);

        $checkusers = CpcResourcePerson::where('profile_id',$request->profile_id)->get();
        // return $checkusers;
        if($checkusers){
            foreach ($checkusers as $key => $user) {
                if($user->profile_id == $request->profile_id and $user->cpc_service_id == $request->cpc_service_id)
                {
                    return back()->with('error','User already Exists');
                }
            }
        }
        $resource_person = new CpcResourcePerson();
        $resource_person->cpc_service_id = $request->cpc_service_id;
        $resource_person->profile_id = $request->profile_id;
        $resource_person->sort = $request->sort;
        $resource_person->post_id = $request->post_id;
        $resource_person->save();
        return redirect()->route('cpc.section.people.list',$request->cpc_service_id)->with('success','Resource People Added Succesfully');
    }

    public function resourceList($cpc_id)
    {
        // return $cpc_id;
        $cpc = Cpc::where('id',$cpc_id)->first();
        $resource_peoples = CpcResourcePerson::where('cpc_service_id',$cpc_id)->with('getProfile')->get();
        return view('backend.cpc.resource_people.list',compact('resource_peoples','cpc'));
    }

    public function cpcFaqList($cpc_id)
    {
        // dd($cpc_id);
        $data['faqs'] = Faq::where('faq_type', 5)->where('ref_id', $cpc_id)->get();
        $data['cpc'] = Cpc::where('id',$cpc_id)->first();

        // return $data;
        return view('backend.cpc.faq.list',$data);
    }
    public function cpcFaq($cpc_id)
    {

        $data['cpc'] = Cpc::where('id',$cpc_id)->first();
        // return $data;
        return view('backend.cpc.faq.add',$data);
    }

    public function cpcfaqStore(Request $request)
    {
         $request->validate([
            'question' => 'required',
            'answer' => 'required',
         ]);

         $faq = new Faq();
         $faq->faq_type = 5;
         $faq->ref_id = $request->cpc_service_id;
         $faq->question = $request->question;
         $faq->answer = $request->answer;
         $faq->save();

         return redirect()->route('cpc.section.faq.list',$request->cpc_service_id)->with('success','Faq Added Successfully');
    }

    public function cpcContactList($cpc_id)
    {
        $data['contact_persons'] = CpcContactPerson::where('cpc_id',$cpc_id)->with('getProfile')->get();
        $data['cpc'] = Cpc::where('id',$cpc_id)->first();

        // $data['profiles'] = Profile::all();
        return view('backend.cpc.contact.list',$data);
    }
    public function cpcContact($cpc_id)
    {

        $data['cpc'] = Cpc::where('id',$cpc_id)->first();

        $data['profiles'] = Profile::all();
        return view('backend.cpc.contact.add',$data);
    }

    public function cpcContactStore(Request $request)
    {
        // return $request->all();
        $request->validate([
            'cpc_id' => 'required',
            'profile_id' => 'required',
            'description' => 'required',
        ]);

        $data = new CpcContactPerson();
        $data->cpc_id = $request->cpc_id;
        $data->profile_id = $request->profile_id;
        $data->description = $request->description;
        if($request->is_form === 'on'){
            $data->is_form_on = 1;
        }
        $data->save();

        return redirect()->route('cpc.contact.list',$request->cpc_id)->with('success','Contact Person added Successfully');
    }
}
