<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Model\taskmanagerModel;
use Illuminate\Support\Facades\App;

class taskmanagerController extends Controller
{
    public function index(){
        $managers = taskmanagerModel::all();
        return view('index', compact('managers'));
    }

    public function create(){
       return view('add');
    }

    public function store(Request $request){
        $tasks = new taskmanagerModel();
        $this->validate($request,
            [
                'name' => 'required|min:5|max:255',
                'phone' => 'required|integer|max:11',
                'email' => 'required|email|max:30',
            ],

            [
                'required' => ':attribute Không được để trống',
                'min' => ':attribute Không được nhỏ hơn :min',
                'max' => ':attribute Không được lớn hơn :max',
                'integer' => ':attribute Chỉ được nhập số',
                'email' => ':attribute Chỉ được nhập email',
            ],

            [
                'name' => 'ten',
                'phone' => 'dien thoai',
                'email' => 'email'
            ]

        );

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

    public function update(Request $request, $id){
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

}
