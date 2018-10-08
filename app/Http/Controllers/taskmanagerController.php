<?php

namespace App\Http\Controllers;

use App\Http\Requests\Create_Customer_Request;
use App\Model\loginModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Model\taskmanagerModel;
use Illuminate\Support\Facades\App;

class taskmanagerController extends Controller
{
    public function index(){
        $managers = taskmanagerModel::paginate(10);
        return view('index', compact('managers'));
    }

    public function create(){
       return view('add');
    }

    public function store(Create_Customer_Request $request){
        $tasks = new taskmanagerModel();
        $tasks->user_name = $request->input('name');
        $tasks->phone = $request->input('phone');
        $tasks->email = $request->input('email');
        $tasks->save();
        return redirect()->route('task');
    }

    public function edit($id){
        $task = taskmanagerModel::find($id);
        return view('edit', compact('task'));
    }

    public function update(Create_Customer_Request $request, $id){
        $task = taskmanagerModel::find($id);
        $task->user_name = $request->input('name');
        $task->phone = $request->input('phone');
        $task->email = $request->input('email');
        $task->save();
        return redirect()->route('task');

    }

    public function delete($id){
        $task = taskmanagerModel::find($id);
        $task->delete();
        return redirect()->route('task');
    }

    public function search(){
        return view('search');
    }

    public function searchkey(Request $request) {
        $lists =  taskmanagerModel::where('user_name','like',"%".$request->search."%")
            ->orWhere('phone', 'like', "%".$request->search."%")
            ->orWhere('id', 'like', "%".$request->search."%")
            ->orWhere('email', 'like', "%".$request->search."%")
            ->get();
        return view('searchlist', compact('lists'));
    }

    public function indexMidd(){
        return view('login');
    }

    public function login(Request $request){
        $user = loginModel::find($request);
        $user_name = $request->input('name');
        $password = $request->input('password');
        if ($user->name = $user_name){
            if($user->password = $password){
                return redirect()->route('task');
            } else {
                echo "Nhap password sai roi";
                return view('login');
            }
        } else {
            return view('login');
        }
    }
}
