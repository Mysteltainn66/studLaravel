<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Photos;
use App\User;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotosController extends Controller
{

    public function index()
    {
        $photos = Photos::paginate(25);

        return view('admin.photos.index', compact('photos'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|Application|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Categories::all();
        $users = User::all();

        return view('admin.photos.create', compact('categories' , 'users'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $user_id = $request->input('user_id');

            $photo = new Photos([
                'path'         => $request->file('photo')->store($user_id, 'photos'),
                'name'          => $request->get('name'),
                'category_id'   => $request->get('category_id'),
                'user_id'       => $request->get('user_id'),
            ]);
            $photo->save();
        }

        return redirect()->route('admin.photos.index')->with('success', 'Image uploaded successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd(__METHOD__, $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd(__METHOD__, $request, $id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Photos::destroy($id);
        return redirect()->route('admin.photos.index')->with('Success', 'Photo has been deleted.');
    }
}
