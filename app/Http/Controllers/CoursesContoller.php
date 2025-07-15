<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Packages;
use App\Models\BusinessCategory;
use Yajra\DataTables\Facades\DataTables;


class CoursesContoller extends Controller
{
    public function packageList(Request $request)
    {


        if ($request->ajax()) {
            $query = Packages::query();

            if ($request->has('name') && !empty($request->name)) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }

            if ($request->has('status') && !empty($request->status)) {
                $query->where('status',  $request->status);
            }


            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                    if ($row->status == 'Active') {
                        return '<span class="badge bg-success">Active</span>';
                    } elseif ($row->status == 'Inactive') {
                        return '<span class="badge bg-danger">Inactive</span>';
                    } else {
                        return '<span class="badge bg-secondary">' . $row->status . '</span>';
                    }
                })
                ->editColumn('desription', function ($row) {
                    return '<i class="menu-icon icon-base ti tabler-eye" style="cursor:pointer;" onclick="openModal(\'description\', \'' . addslashes($row->description) . '\')"></i>';
                })
                ->addColumn('image', function ($row) {
                    return '<i class="menu-icon icon-base ti tabler-eye" style="cursor:pointer;" onclick="openModal(\'image\', \'' . addslashes($row->image) . '\')"></i>';
                })
                ->addColumn('action', function ($row) {
                    return '<div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="icon-base ti tabler-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">

                              <a class="dropdown-item" href="' . route('edit_package', [$row->id]) . '"
                                ><i class="icon-base ti tabler-pencil me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);" onclick="deletePackage(' . $row->id . ')"
                                ><i class="icon-base ti tabler-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>';
                })
                ->rawColumns(['action', 'status', 'desription', 'image'])
                ->make(true);
        }

        return view('courses.packages.view');
    }

    public function addPackage(Request $request)
    {


        if ($request->method() == 'POST') {

            $request->validate([
                'name'         => 'required|string|max:255',
                'gst'            => 'required|numeric',
                'amount'            => 'required|numeric',
                'description'      => 'required|string|max:255',
                'image'    => 'nullable|mimes:jpg,jpeg,png|max:2048'
            ], [
                'name.required'        => 'The name field is required.',
                'name.string'          => 'The name must be a valid string.',
                'name.max'             => 'The name may not be greater than 255 characters.',

                'gst.required'         => 'The GST field is required.',
                'gst.numeric'          => 'The GST must be a valid number.',

                'amount.required'      => 'The amount field is required.',
                'amount.numeric'       => 'The amount must be a valid number.',

                'description.required' => 'The description field is required.',
                'description.string'   => 'The description must be a valid string.',
                'description.max'      => 'The description may not be greater than 255 characters.',

                'image.mimes'          => 'The image must be a file of type: jpg, jpeg, png.',
                'image.max'            => 'The image must not be larger than 2MB.',
            ]);



            $package_image = null;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $package_image = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('package_images'), $package_image);
            }

            $data = [
                'name' => $request->name,
                'gst' => $request->gst,
                'amount' => $request->amount,
                'description' => $request->description,
                'image' => $package_image
            ];

            $insert = Packages::insert($data);
            return to_route('package_list');
        }

        return view('courses.packages.add');
    }

    public function editPackage($id, Request $request)
    {
        $package = Packages::find($id);
        if ($request->method() == 'POST') {
            $request->validate([
                'name'         => 'required|string|max:255',
                'gst'            => 'required|numeric',
                'amount'            => 'required|numeric',
                'description'      => 'required|string|max:255',
                'image'    => 'nullable|mimes:jpg,jpeg,png|max:2048'
            ], [
                'name.required'        => 'The name field is required.',
                'name.string'          => 'The name must be a valid string.',
                'name.max'             => 'The name may not be greater than 255 characters.',

                'gst.required'         => 'The GST field is required.',
                'gst.numeric'          => 'The GST must be a valid number.',

                'amount.required'      => 'The amount field is required.',
                'amount.numeric'       => 'The amount must be a valid number.',

                'description.required' => 'The description field is required.',
                'description.string'   => 'The description must be a valid string.',
                'description.max'      => 'The description may not be greater than 255 characters.',

                'image.mimes'          => 'The image must be a file of type: jpg, jpeg, png.',
                'image.max'            => 'The image must not be larger than 2MB.',
            ]);



            $package_image = null;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $package_image = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('package_images'), $package_image);
            }

            $data = [
                'name' => $request->name,
                'gst' => $request->gst,
                'amount' => $request->amount,
                'description' => $request->description,
                'image' => $package_image
            ];

            $update = Packages::where('id', $id)->update($data);
            return to_route('package_list');
        }
        return view('courses.packages.edit', compact('package'));
    }

    public function statusPackage($id)
    {
        $package = Packages::find($id);
        $package->status = $package->status === 'Active' ? 'Inactive' : 'Active';
        $package->save();
    }


    public function businessCategoriesList(Request $request)
    {
        if ($request->ajax()) {
            $query = BusinessCategory::with('package');

            if ($request->has('name') && !empty($request->name)) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }

            if ($request->has('status') && !empty($request->status)) {
                $query->where('status',  $request->status);
            }


            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                    if ($row->status == 'Active') {
                        return '<span class="badge bg-success">Active</span>';
                    } elseif ($row->status == 'Inactive') {
                        return '<span class="badge bg-danger">Inactive</span>';
                    } else {
                        return '<span class="badge bg-secondary">' . $row->status . '</span>';
                    }
                })
                ->editColumn('description', function ($row) {
                    return '<i class="menu-icon icon-base ti tabler-eye" style="cursor:pointer;" onclick="openModal(\'description\', \'' . addslashes($row->description) . '\')"></i>';
                })
                ->addColumn('image', function ($row) {
                    return '<i class="menu-icon icon-base ti tabler-eye" style="cursor:pointer;" onclick="openModal(\'image\', \'' . addslashes($row->image) . '\')"></i>';
                })
                ->addColumn('package_name', function ($row) {
                    return $row->package ? $row->package->name : 'N/A';
                })
                ->addColumn('action', function ($row) {



                    return '<div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="icon-base ti tabler-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">

                              <a class="dropdown-item" href="' . route('edit_business_category', [$row->id]) . '"
                                ><i class="icon-base ti tabler-pencil me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);" onclick="deleteCategory(' . $row->id . ')"
                                ><i class="icon-base ti tabler-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>';
                })
                ->rawColumns(['action', 'status','image','description'])
                ->make(true);
        }

        return view('courses.business_category.view');
    }

    public function addBusinessCategory(Request $request)
    {

        $packages = Packages::where('status', 'Active')->orderBy('name', 'asc')->get();

        if ($request->method() == 'POST') {

            $request->validate([
                'name'         => 'required|string|max:255',
                'description'      => 'required|string|max:255',
                'image'    => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'package' => 'required'
            ], [
                'name.required'        => 'The name field is required.',
                'name.string'          => 'The name must be a valid string.',
                'name.max'             => 'The name may not be greater than 255 characters.',

                'description.required' => 'The description field is required.',
                'description.string'   => 'The description must be a valid string.',
                'description.max'      => 'The description may not be greater than 255 characters.',

                'image.mimes'          => 'The image must be a file of type: jpg, jpeg, png.',
                'image.max'            => 'The image must not be larger than 2MB.',

                'package'              => 'Package is required'
            ]);



            $category_image = null;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $category_image = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('categories_images'), $category_image);
            }

            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'image' => $category_image,
                'package_id' => $request->package
            ];

            $insert = BusinessCategory::insert($data);
            return to_route('business_categories_list');
        }

        return view('courses.business_category.add', compact('packages'));
    }

    public function editBusinessCategory($id, Request $request)
    {

        $category = BusinessCategory::find($id);
        $packages = Packages::where('status', 'Active')->orderBy('name', 'asc')->get();


        if ($request->method() == 'POST') {
            $request->validate([
                'name'         => 'required|string|max:255',
                'package' => 'required',
                'description'      => 'required|string|max:255',
                'image'    => 'nullable|mimes:jpg,jpeg,png|max:2048'
            ], [
                'name.required'        => 'The name field is required.',
                'name.string'          => 'The name must be a valid string.',
                'name.max'             => 'The name may not be greater than 255 characters.',

                'description.required' => 'The description field is required.',
                'description.string'   => 'The description must be a valid string.',
                'description.max'      => 'The description may not be greater than 255 characters.',

                'image.mimes'          => 'The image must be a file of type: jpg, jpeg, png.',
                'image.max'            => 'The image must not be larger than 2MB.',

                'package'              => 'Package is required'
            ]);



            $category_image = null;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $category_image = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('categories_images'), $category_image);
            }

            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'image' => $category_image,
                'package_id' => $request->package

            ];

            $update = BusinessCategory::where('id', $id)->update($data);
            return to_route('business_categories_list');
        }
        return view('courses.business_category.edit', compact('category', 'packages'));
    }

    public function statusBusinessCategory($id)
    {
        $category = BusinessCategory::find($id);
        $category->status = $category->status === 'Active' ? 'Inactive' : 'Active';
        $category->save();
    }
}
