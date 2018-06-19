<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Resources\PostResource;
use App\Contact;
use App\Ipinfo;
class ClientPostController extends Controller
{
    public function index(){
        $posts=Post::orderBy('postId','desc')->paginate(3);

        return PostResource::collection($posts);
    }

    public function search(Request $r){



        $posts=Post::orderBy('postId','desc')
            ->where('title','like',"%".$r->search."%")
            ->orWhere('details','like','%'.$r->search.'%')
            ->paginate(3);

        return PostResource::collection($posts);

        }

    public function contact(Request $r){
        $contact=new Contact();
        $contact->title=$r->title;
        $contact->body=$r->body;
        $contact->personEmail=$r->personEmail;
        $contact->personNumber=$r->personNumber;
        $contact->save();

        $ip=$r->ip;

        $ipInfo=new Ipinfo();
        $ipInfo->contactId=$contact->contactId;
        $ipInfo->asn=$ip['asn'];
        $ipInfo->city=$ip['city'];
        $ipInfo->country_name=$ip['country_name'];
        $ipInfo->ip=$ip['ip'];
        $ipInfo->isp=$ip['isp'];
        $ipInfo->latitude=$ip['latitude'];
        $ipInfo->longitude=$ip['longitude'];
        $ipInfo->org=$ip['org'];
        $ipInfo->postal_code=$ip['postal_code'];
        $ipInfo->save();
        return $r;
    }
}
