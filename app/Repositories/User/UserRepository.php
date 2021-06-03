<?php

namespace App\Repositories\User;


use App\Models\User;


class UserRepository 
{
    public  $users;

    public function __construct()
    {
        $this->users = new User();
    }

    public function updateUser($request,$id)
    {
        $users = $this->users->findOrFail($id);
        $users->name = $request['name'];
        // $users->email = $request['email'];
        if($request->hasFile('image')){
            $image = $request->image;
            $path = $image->store('images','public');
            $users->profile_photo_path = $path;
        }
        $users->update();
    }
    
    public function deleteUser($id)
    {
        $users = $this->users->findOrFail($id);
        $users->delete();
    }
}