<?php

namespace App\Http\Controllers;

use App\LikeUnlike;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function index(Request $request){
        // $user = DB::table('users')
        // ->join('like_unlikes','users.id','=','like_unlikes.user_id')
        // ->select('users.*','like_unlikes.like','like_unlikes.unlike')
        // ->get();
        // ->first();
        // dd($user);
        // $user = User::withCount('likes')->having('like','<',1)->get();

        $user = User::get();
        // $like = likeUnlike::where($request->user_id)->sum('like');
        // $unlike = likeUnlike::where($request->user_id)->sum('unlike');

        // dd($like);
        return view('form.detail',compact("user"));
    }


    public function storeForm(Request $request){

        $user = new User();

        $user->name = $request->uname;
        $user->email = $request->uemail;
        $user->age = $request->age;
        $user->country = $request->country;
        $user->password = $request->pass;
        $user->gender = $request->gender;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->hobbies = json_encode($request->check);
        if ($request->hasfile('file')) {
            $image = request()->file('file');
            $new_name =  $request->file('file')->getClientOriginalName();
            $image->move(public_path('/uploads/files'), $new_name);
            $user->resume = $new_name;
        }
        // dd($user);
        $user->save();
        return "done";
        return back();
    }

    public function changeStatus(Request $request){

        // Also working  thats the vesry easy way
        // DB::table('users')->where('id', $request->user_id)->update(['status' => $request->status]);

        $user = User::where('id',$request->id)->first();

        // long way but it is easy now
        if(!empty($user->status) == 0){
            $user->status = $request->status;
            $user->status = 1;
            $user->update();
        }
        elseif(!empty($user->status) == 1){
            $user->status = $request->status;
            $user->status = 0;
            $user->update();

            return $request->all();
    }


    }
        public function download($file) {
            // $file = storage_path('public/uploads/files' . $file);
            // dd($path);
            return response()->download('uploads/files/'.$file);

        }

        public function likeUnlike(Request $request){

            // $user_id = Auth::id();
            // dd($user_id);

            $like = new LikeUnlike();

            $like->user_id = $request->post;
            // $like-> = $user_id;


            if($request->type == "like"){
                $like->like = 1;
            }else{
                $like->unlike = 1;
            }

            $like->save();
            return response()->json([
                'bool'=>true
            ]);
        }


    }

