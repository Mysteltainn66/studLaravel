<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminDashboardUserCreateRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\AdminDashboardUserEditRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UsersController extends Controller
{
    /**
     * Display a listing of users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|View
     */
    public function index()
    {

        $users = User::paginate(25);

        return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */

    /**
     * @param AdminDashboardUserCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminDashboardUserCreateRequest $request)
    {

        $data = $request->input();

        $user = new User($data);
        $user->is_admin = $request->has('is_admin');

        $user->save();

        if ($user) {
            return redirect()->route('admin.users.index', [$user->id])
                ->with(['success' => 'User has been created.']);
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
        if (Auth::user()->id == $id)
        {
            return redirect()->route('admin.users.index');
        }

        return view('admin.users.edit')->with(['user' => User::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(AdminDashboardUserEditRequest $request, $id)
    {
        $user = User::find($id);

        $data = $request->all();

        $result = $user->update($data);

        if($result) {
            return redirect()
                ->route('admin.users.edit', $user->id)
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->id == $id)
        {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to delete yourself.');
        }

        User::destroy($id);
        return redirect()->route('admin.users.index')->with('success', 'User had been deleted');
    }

    public function destroySelected(Request $request)
    {

        $ids = $request->ids;
        User::whereIn('id',$ids)->delete();
        return response()->json(['success'  =>  "All selected users has been deleted"]);
    }
}
