<?php

namespace App\Services\ProcurementService;

use App\Models\Procurement;
use App\Services\IService;

class ProcurementService
{

   public function getAll()
   {
      try {
         $data = Procurement::all();
         return $data;
      } catch (\Exception $e) {
         return response()->json(["msg" => $e->getMessage()]);
      }
   }

   public function addList($id = '')
   {
      try {
         $data = procurement::where('id', $id)->get();
         return $data;
      } catch (\Exception $e) {
         return response()->json(["msg" => $e->getMessage()]);
      }
   }

   public function create($request)
   {
      try {
         $request->validate([
            'title' => 'required',
            'image' => 'mimes:jpg,jpeg,png,docx,pdf,doc'
         ]);

         if ($request->id > 0) {
            $data = Procurement::find($request->id);
            $msg = 'Data Saved successfully';
         } else {
            $data  = new Procurement();
            $msg = 'Data Updated successfully';
         }
         $data->title     = $request->title;
         $data->publish_date     = $request->publish_date;
         $data->start_date     = $request->start_date;
         $data->end_date     = $request->end_date;
         $data->short_desc = $request->short_description;
         $data->long_desc = $request->long_description;
         $data->file     = $request->image;
         if ($request->hasfile('image')) {
            $image = $request->file('image');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            $image->storeAs('/public/media/procurement', $image_name);
            $data->file = $image_name;
         }
         $data->save();
      } catch (\Exception $e) {
         return response()->json(["msg" => $e->getMessage()]);
      }
   }

   public function getSingle($id)
   {
      try {
         $data = Procurement::where('id', $id)->get();
         return $data;
      } catch (\Exception $e) {
         return response()->json(["msg" => $e->getMessage()]);
      }
   }
}
