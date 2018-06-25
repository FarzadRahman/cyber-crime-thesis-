<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Contact;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function postData(Request $r){
        $posts=Post::select('postId','title','posts.created_at','users.name')
            ->leftJoin('users','posts.userId','users.userId')->get();
        $datatables = Datatables::of($posts);
        return $datatables->make(true);
        }


    public function showContact(){

        return view('contact.show');
    }

    public function getContactData(Request $r){
        $contact=Contact::orderBy('contactId','desc')->get();

        $datatables = Datatables::of($contact);
        return $datatables->make(true);
        }

    public function getIp(Request $r){
        $contact=Contact::where('contact.contactId',$r->id)
            ->leftJoin('ipinfo','ipinfo.contactId','contact.contactId')
            ->first();
        return view('ipinfo')->with('contact',$contact);
    }

}
