<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreOrUpdatePlateRequest;

class PlateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');// Each methods of this controller throw before from moddleware auth.
    }

    /**
     * Display a listing of the deleted resources.
     */
    public function deletedIndex()
    {
        $plates = Plate::onlyTrashed()->get();

        return view("admin.plates.trash.index", compact("plates"));
    }

    /**
     * Retore the deleted resources.
     */
    public function restore(Plate $plate){
        $plate->restore();
        return redirect()->route("admin.plates.index")
            ->with('message', "Plate $plate->name has been restored succesfully!")
            ->with('alert-class', "success");
    }

    /**
     * Permanently Delete resources.
     */
    public function forceDelete(Plate $plate){
        $plate->forceDelete();
        return redirect()->route("admin.plates.deleted-index")
            ->with('message', "Plate $plate->name has been PERMANENTLY deleted!")
            ->with('alert-class', "danger");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plates = Plate::all();
        return view('admin.plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plate = new Plate();

        return view('admin.plates.create', compact('plate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrUpdatePlateRequest $request)
    {
        $data = $request->validated();

        // If the file in image requst exist
        if($request->hasFile('image')){
            $filepath = Storage::disk('public')->put('image/plate',$request->image); // Save image in Storage public disk
            $data['image'] = $filepath; // Rewrite the image value

        }

        $plate = Plate::create($data);

        return redirect()->route("admin.plates.index")
            ->with('message', "Plate $plate->name has been created successfully!")
            ->with('alert-class', "success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Plate $plate)
    {
        return view('admin.plates.show', compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plate $plate)
    {
        return view('admin.plates.edit', compact('plate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plate $plate)
    {
        $data = $request->all();

        // If image value exist in request field
        if ($request->hasFile("image")){
            if ($plate->image){
                Storage::disk("public")->delete($plate->image); // Delete the old value of plate image
            }

            $filePath = Storage::disk("public")->put("img/plates/", $request->image); // Store new value of image in Storage public disk
            $data["image"] = $filePath; // Rewrite image value
        }

        $plate->update($data);

        return redirect()->route("admin.plates.index")
            ->with('message', "Plate $plate->name has been updated successfully!")
            ->with('alert-class', "success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plate $plate)
    {
        $plate->delete();

        return redirect()->route("admin.plates.index")
            ->with('message', "Plate $plate->name has been deleted successfully!")
            ->with('alert-class', "danger");
    }
}