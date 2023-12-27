<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\UserService;
use Illuminate\Support\Facades\Auth;

class ServiceCategoryController extends Controller
{
    
    public function addServices(Request $request)
    {
        $request->validate([
            'service_desc' => 'required|string|max:255',
            'serviceDesc' => 'required|string|min:10|max:400',
            'parent_id' => 'required|numeric',
            'service_certifications' => 'required|file|mimes:jpeg,png,pdf|max:2048', // Adjust file types and size as needed
            'sub_service_id' => 'required|numeric',
            'other_subcategory' => 'nullable|string|max:255',
            'billing_type' => 'required|string',
            'company_id' => 'required|numeric',
        ]);
        $companyId = session('company_id');
        $user = Auth::user();
        $userService = new UserService();
        $userService->service_name = $request->input('service_desc');
        $userService->description = $request->input('serviceDesc');
        $userService->service_category_id  = $request->input('parent_id');
        if ($request->hasFile('service_certifications')) {
            $file = $request->file('service_certifications');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = "upload/certifications/";
            $file->move(public_path($path), $fileName);
        }
        $selectedSubService = $request->input('sub_service_id');
        if ($selectedSubService == '100') {
            $userService->sub_service_category_id = $request->input('sub_service_id');
            $userService->others = $request->input('other_subcategory');
        } else {
            $userService->sub_service_category_id = $selectedSubService;
            $userService->others = null; 
        }
        $userService->billing_type = $request->input('billing_type');
        $userService->user_id = $user->user_id;
        $userService->certifications = $fileName;
        $companyId = $request->input('company_id');
        $userService->company_id = $companyId ;

        $userService->save();
        if ($userService->id) {
            session()->forget('company_id');
            session()->forget('step');
            return redirect()->route('dashboard')->with('success', 'Service Added Successfully!!');
        }
    }
    public function serviceCategories($categoryId)
    {
        $subcategories = ServiceCategory::where('parent_id', $categoryId)->get();
        return response()->json($subcategories);
    }
}
