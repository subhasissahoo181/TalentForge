<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // This method will show our home page
    public function index(){
        $categories =Category::where('status',1)->orderBy('name','ASC')->take(8)->get();
        $newCategories = Category::where('status',1)->orderBy('name','ASC')->get();

        $featuredJobs = Job::where('status',1)->orderBy('created_at','DESC')->with('jobType')->where('isFeatured',1)->take(6)->get();

        $latestdJobs = Job::where('status',1)->orderBy('created_at','DESC')->with('jobType')->take(6)->get();

        // $jobs = Job::where('status', 1);
        return view('front.home',[
            'categories'=>$categories,
            'featuredJobs'=>$featuredJobs,
            'latestJobs'=>$latestdJobs,
            'newCategories'=>$newCategories
            // 'jobs' => $jobs,
        ]);
    }
    // public function contact(){
    //     return view('front.contact');
    // }
}
