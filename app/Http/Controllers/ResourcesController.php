<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// 18. Right click on Resource:: to import the class

class ResourcesController extends Controller
{
    // 14. Show all resources
    /**
     * ALL RESOURCES
     *
     * @return array
     */
    public function index()
    {
        // 44. See the paginate()
        // dd(Resource::latest()
        // ->take(10)
        // ->filter(request(['category', 'search']))->paginate(10));


        // 23b. I check if the "a tag" for the category filter is displayed in the query
        // dd(request('category'));

        // 16b. Here it is the content that was in the default route
        return view('resources.index', [
            'resources' => Resource::latest()
                ->take(10)
                // 24b. filter method to get only the seleted category. Has to be an array because of 24a: array $filters
                // 29b. 'search' added
                ->filter(request(['category', 'search']))->paginate(10),

            // 21a. 
            'categories' => Category::all()
        ]);
    }

    // 15. Show single resource
    /**
     * SINGLE RESOURCE
     *
     * @param integer $id
     *
     * @return array
     */
    public function show(int $id)
    {
        // 17b. Here it is the content that was in the detailed route
        return view('resources.show', [
            'resource' => Resource::find($id),

            'resources' => Resource::all()
                ->skip($id)->take(4),

            // 21.  Display all categories on the show page
            'categories' => Category::all(),

            // 28e. Display all comments on the show page
            'comments' => Comment::where('resource_id', $id)->get()
        ]);
    }

    // 31. Show add form
    /**
     * FORM TO CREATE A RESOURCE
     *
     * @return array
     */
    public function create()
    {
        return view('resources.create', [
            'categories' => Category::all(),

            'users' => User::all()
        ]);
    }

    // 34a. Store resource Data - Validate method
    /**
     * STORE DATA
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function store(Request $request)
    {
        // To check if we got the right data
        // dd($request->all());

        // 35a. Data of the image
        // dd($request->file('image'));

        // 35b. Go to >config -> filesystems.php then line 16 change 'local' in 'public'

        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
            'image' => 'nullable',
        ]);

        //35c. To put the picture in the right folder
        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('img', 'public');
        }

        // $image = $request->file('image');
        // $size = $image->getSize();
        
        // 34b. hop in the DB, but ... see Model
        Resource::create($formFields, [
            //'size' => $size
        ]);

        return redirect('/')->with('message', 'Your resource has been created');
    }


    // 37. Show edit form
    public function edit(int $id) {
        // dd($id);
        return view('resources.edit', [
            'resource' => Resource::find($id),

            'categories' => Category::all(),

            'users' => User::all()
        ]);
    }



    // 40. Update resource
    public function update(Request $request, Resource $resource)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
            'image' => 'nullable',
            'size' => 'nullable'
        ]);

        //dd($formFields);

        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('img', 'public');
        }

        // dd($resource->update($formFields));
        $resource->update($formFields);
    
        return redirect('/')->with('message', 'Your resource has been updated');
    }



    // 42. Destroy resource
    public function destroy(Resource $resource)
    {
        $resource->delete();

        return redirect('/')->with('message', 'Your resource has been deleted');
    }
}
