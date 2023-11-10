<?php

namespace App\Http\Controllers;
use App\Models\Procurement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Services\ProcurementService\ProcurementService;

class ProcurementController extends Controller
{

    private $ProcurementService;
    public function __construct(ProcurementService $ProcurementService)
    {
          $this->ProcurementService=$ProcurementService;
    }
     public function index()
     {
         $data['procurement'] = $this->ProcurementService->getAll();
         return view('backend.procurement.list',$data);
     }
     public function add($id='')
     {
     $arr=$this->ProcurementService->addList($id);
     if ($id>0)
        {
         $data['title']=$arr[0]->title;
         $data['image']=$arr[0]->file;
         $data['publish_date']=$arr[0]->publish_date;
         $data['start_date']=$arr[0]->start_date;
         $data['end_date']=$arr[0]->end_date;
         $data['short_des']=$arr[0]->short_desc;
         $data['long_des']=$arr[0]->long_desc;
         $data['id']=$arr[0]->id;
        }else{
         $data['title']='';
         $data['image']='';
         $data['publish_date']='';
         $data['start_date']='';
         $data['end_date']='';
         $data['short_des']='';
         $data['long_des']='';
         $data['id']='';
        }
         return view('backend.procurement.add', $data);
     }

     public function store(Request $request)
     {
         $this->ProcurementService->create($request);
         return redirect()->route('manage_procurement')->with('success', 'Data Successfully Inserted');
     }

     public function delete($id)
     {

         $data = Procurement::find($id);
         $data->delete();
         return redirect()->route('manage_procurement')->with('success','Data Deleted successfully');
     }




}
