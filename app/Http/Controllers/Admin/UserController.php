<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Http\Requests\Admin\SearchUserRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'DESC')->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->only('name', 'email', 'phone', 'address');
        $data['password'] = Hash::make($request->password);

        User::create($data);
        return redirect()->route('ad.user.index')->with('success', 'Thêm tài khoản thành công');

    }


    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->only('name', 'email', 'phone', 'address');
        // $data['password'] = Hash::make($request->password);
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        session()->flash('success', 'Thành công');

        return redirect()->route('ad.user.index');
    }

    public function destroy(User $user)
    {
        $client = Client::where('user_id','=',$user->id)->first();
        if(isset($client->id)) {
            session()->flash('error', 'Đại lý đã có khách hàng. Không thể xóa !');
        } else {
            $user->delete();
            session()->flash('success', 'Thành công');
        }
        return redirect()->route('ad.user.index');
    }
}
