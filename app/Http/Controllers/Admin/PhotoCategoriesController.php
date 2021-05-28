<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Http\Requests\AdminDashboardPhotoCategoriesRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoCategoriesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */

    public function index()
    {
        $categories = Categories::paginate(25);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();

        $categories = new Categories($data);

        $categories->save();

        if ($categories) {
            return redirect()->route('admin.categories.index', [$categories->id])
                ->with(['success' => 'New category has been created.']);
        } else {
            return back()->withErrors(['danger' => 'Something gonna wrong.'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__, $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.categories.edit')->with(['category' => Categories::find($id)]);
    }

    /**
     * @param AdminDashboardPhotoCategoriesRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminDashboardPhotoCategoriesRequest $request, $id)
    {
        $category = Categories::find($id);

        $data = $request->all();

        $result = $category->update($data);

        if($result) {
            return redirect()
                ->route('admin.categories.index', $category->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['warning' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Categories::destroy($id);
        return redirect()->route('admin.categories.index')->with('success', 'Photo category had been deleted');
    }

    public function destroySelected(Request $request)
    {

        $ids = $request->ids;
        Categories::whereIn('id',$ids)->delete();
        return response()->json(['success'  =>  "All selected categories has been deleted"]);
    }
}
