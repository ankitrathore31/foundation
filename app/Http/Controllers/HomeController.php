<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function About(){
    return view('home.pages.about');
   }

   public function Service(){
    return view('home.pages.service');
   }

   public function Project(){
    return view('home.pages.project');
   }

   public function Donation(){
    return view('home.donation.donation');
   }

   public function Activity(){
    return view('home.activity.activity');
   }

   public function Gallery(){
    return view('home.pages.gallery');
   }

   public function NoticeBoard(){
        return view('home.pages.notice');
   }

   public function Contact(){
    return view('home.pages.contact');
   }
}
