<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProduct;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function addProducts(Request $request)
    {

        $request->validate([
            'product_desc' => 'required|string|max:255',
            'description' => 'required|string|min:10|max:400',
            'parent_id' => 'required|numeric',
            'certifications' => 'required|file|mimes:jpeg,png,pdf|max:2048',
            'other_productsubcategory' => 'nullable|string|max:255',
            'tentative_cost' => 'required|string',
            'company_id' => 'required|numeric',
        ]);
        $user = Auth::user();
        $userProduct = new UserProduct();
        $userProduct->product_name = $request->input('product_desc');
        $userProduct->description = $request->input('description');
        $userProduct->product_category_id  = $request->input('parent_id');
        if ($request->hasFile('certifications')) {
            $file = $request->file('certifications');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = "productcertifications/certifications/";
            $file->move(public_path($path), $fileName);
        }
        $selectedSubService = $request->input('sub_product_category_id');
        if ($selectedSubService == '100') {
            $userProduct->sub_product_category_id = $request->input('sub_product_category_id');
            $userProduct->others = $request->input('other_productsubcategory');
        } else {
            $userProduct->sub_product_category_id = $selectedSubService;
            $userProduct->others = null;
        }

        $userProduct->certifications = $fileName;
        $userProduct->tentative_cost = $request->input('tentative_cost');
        $userProduct->currency = $request->input('currency');
        $userProduct->user_id = $user->user_id;
        $companyId = $request->input('company_id');
        $userProduct->company_id =  $companyId;


        $userProduct->save();
        if ($userProduct->id) {

            return redirect()->route('dashboard')->with('success', 'Product Added Successfully!!');
        }
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = ProductCategory::where('parent_id', $categoryId)->get();
        return response()->json($subcategories);
    }
}
