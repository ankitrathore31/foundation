<?php

namespace App\Http\Controllers;

use App\Models\academic_session;
use App\Models\Activity;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function About()
   {
      return view('home.pages.about');
   }

   public function Service()
   {
      return view('home.pages.service');
   }

   public function Project(Request $request)
   {
      $query = Project::query();

      if ($request->session_filter) {
         $query->where('academic_session', $request->session_filter);
      }
      if ($request->category_filter) {
         $query->where('category', $request->category_filter);
      }
      if ($request->name) {
         $query->where('name', 'like', '%' . $request->name . '%');
      }

      $project = $query->get();
      $data = academic_session::all();
      $category = Category::orderBy('category', 'asc')->get();
      return view('home.pages.project', compact('data', 'project', 'category'));
   }

   public function Donation()
   {
      return view('home.donation.donation');
   }

   public function Activity(Request $request)
   {
      $query = Activity::query();

      if ($request->session_filter) {
         $query->where('academic_session', $request->session_filter);
      }

      if ($request->program_category) {
         $query->where('program_category', $request->program_category);
      }

      if ($request->program_name) {
         $query->where('program_name', $request->program_name);
      }

      if ($request->address_filter && strlen($request->address_filter) >= 4) {
         $query->where('program_address', 'like', '%' . $request->address_filter . '%');
      }

      $activity = $query->orderBy('program_date', 'asc')->get();
      $categories = Category::orderBy('category', 'asc')->pluck('category');
      $allProjects = Project::select('name', 'category')->get();
      $academic_session = academic_session::all();
      return view('home.activity.activity', compact('activity', 'categories', 'allProjects','academic_session'));
   }

   public function gallery()
   {
      $images = Gallery::where('gallery_type', 'Gallery')->get();
      return view('home.pages.gallery',compact('images'));
   }

   public function NoticeBoard()
   {
      $notice = Notice::where('status', 1)->get();
      return view('home.pages.notice',compact('notice'));
   }

   public function Contact()
   {
      return view('home.pages.contact');
   }
}
