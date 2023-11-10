<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Affiliation;
use App\Services\Affiliation\AffiliateInstituteService;

class AffiliationController extends Controller
{

    private $affiliation;
    public function __construct(AffiliateInstituteService $affiliation)
    {
        $this->affiliation = $affiliation;
    }

    public function index()
    {
        $affiliations  = $this->affiliation->getAll();
        return view('backend.affiliation.view', compact('affiliations'));
    }

    public function getAffiliationsFromApi()
    {
        $clientdatas = $this->affiliation->getAffiliateInstituteFromApi();

        return view('backend.affiliation.from-api.view', compact('clientdatas'));

    }

    public function storeAffiliationsFromApi()
    {

        $this->affiliation->storeAffiliationInstituteFromApi();

        return redirect()->route('setup.affiliation')->with('success','Data Inserted');

    }

    public function Add()
    {
    	return view('backend.affiliation.add');
    }

    public function Store(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png'
        ]);

        $data = $this->affiliation->create($request);

        if($data['type'] == 'success') {
            return redirect()->route('setup.affiliation')->with($data['type'], $data['msg']);
        } else {
            return redirect()->route('setup.affiliation')->with($data['type'], $data['msg']);
        }

    }

    public function Edit($id)
    {
        $data['editData'] = $this->affiliation->getByID($id);
    	return view('backend.affiliation.add',$data);
    }

    public function Update(Request $request,$id)
    {
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png'
        ]);


        $data = $this->affiliation->update($request, $id);

        if($data['type'] == 'success') {
            return redirect()->route('setup.affiliation')->with($data['type'], $data['msg']);
        } else {
            return redirect()->route('setup.affiliation')->with($data['type'], $data['msg']);
        }
    }

    public function Delete(Request $request)
    {
    	$data = Affiliation::find($request->id);
        $data->delete();

        return redirect()->route('setup.affiliation')->with('success','Data Deleted successfully');
    }
}
