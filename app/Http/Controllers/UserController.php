<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Complaints;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        if ($user->role == 'admin') {
            return redirect()->route('dashboard');
        }
        else{
            return view('home', [
                'complaints' => Complaints::where('user_id', $user->id)->paginate(5)->withQueryString()
            ]);    
        }
        
    }

    // public function userComlaintsDataTable()
    // {   
    //     $user = Auth::user();
    //         $records = array();
    //           $records = Complaints::where('user_id', $user->id)
    //             ->orderBy('created_at', 'desc');

    //             // dd($records);
    //           return datatables($records)

    //           ->editColumn('created_at', function ($request) {
    //             return $request->created_at->format('F j, Y, g:i a'); // human readable format
    //           })
    //           ->addColumn('user', function ($records) {
    //                 $rhtml = $recoed->name;
    //                 return $rhtml;
    //           })

    //           ->toJson();
    // }
}
