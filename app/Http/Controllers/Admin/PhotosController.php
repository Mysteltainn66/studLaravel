<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Http\Requests\PhotosRequest;
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
     * @param PhotosRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(PhotosRequest $request)
    {
        if ($request->hasFile('photo')) {
            $user_id = $request->input('user_id');

            $photo = new Photos([
                'path'          => $request->file('photo')->store($user_id, 'photos'),
                'name'          => $request->get('name'),
                'category_id'   => $request->get('category_id'),
                'user_id'       => $request->get('user_id'),
            ]);
            $photo->save();
        }

        return redirect()->route('admin.photos.index')->with('success', 'Image uploaded successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|Application|\Illuminate\View\View
     */
    public function edit($id)
    {
        $categories = Categories::all();

        return view('admin.photos.edit', compact('categories'))->with(['photo' => Photos::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $photo = Photos::find($id);

        $data = $request->all();

        $result = $photo->update($data);

        if($result) {
            return redirect()
                ->route('admin.photos.index', $photo->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['warning' => 'Ошибка сохранения'])
                ->withInput();
        }
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
