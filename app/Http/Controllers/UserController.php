<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRequest;

use App\Repositories\User\UserRepository;


class Usercontroller extends Controller
{

    protected $users;
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->users = new User();
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('dashboards.users.list')->with(['users'=>$this->users->paginate(15)]);
    }

    public function edit($id)
    {
        return view('dashboards.users.edit')->with(['user' => $this->users->findOrFail($id)]);
    }

    public function update(UserRequest $request, $id){
        $this->userRepository->updateUser($request,$id);
        Session::flash('success', 'update success');
        return redirect()->route('dashboard.user.list');
    }

    public function delete($id)
    {
        $this->userRepository->deleteUser($id);
        Session::flash('success', 'delete success');
        return redirect()->route('dashboard.user.list');
    }
}
