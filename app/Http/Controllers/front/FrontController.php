<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Blogs;
use App\Models\Category;
use App\Models\OurClient;
use App\Models\Pdf;
use App\Models\Product;
use App\Models\Project;
use App\Models\Reviews;
use App\Models\Service;
use App\Models\SpecialOffer;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class FrontController extends Controller
{
   public function index()
   {
      $our_clients = OurClient::inRandomOrder()->take(8)->get();
      $about_us = AboutUs::first();
      $services = Service::all();
      $offers = SpecialOffer::all();
      $products = Product::all();
      $projects = Project::all();
      $reviews = Reviews::all();
      $categories = Category::all();
      $currentLocale = LaravelLocalization::getCurrentLocale();
      $localeFlag = LaravelLocalization::getSupportedLocales()[$currentLocale]['flag'];
      $pdf = Pdf::where('lang', $currentLocale)->first();
      return view(
         'frontend.index',
         compact(
            'our_clients',
            'about_us',
            'services',
            'offers',
            'products',
            'projects',
            'pdf',
            'reviews',
            'categories',
            'localeFlag',
         )
      );
   }

   public function about_us($id)
   {
      $services = Service::all();
      $products = Product::all();
      $our_clients = OurClient::all();
      $about_us = AboutUs::all();
      $categories = Category::all();
      $currentLocale = LaravelLocalization::getCurrentLocale();
      $localeFlag = LaravelLocalization::getSupportedLocales()[$currentLocale]['flag'];
      return view('frontend.about', compact('products', 'services', 'categories', 'our_clients', 'about_us', 'localeFlag'));
   }
   public function blog($id)
   {
      $services = Service::all();

      $anthorBlog = Blogs::inRandomOrder()->take(4)->get();
      $blog = Blogs::findOrFail($id);
      $nextBlog = Blogs::where('id', '>', $id)->orderBy('id', 'desc')->first();
      $latestBlogs = Blogs::latest()->take(3)->get();
      $categories = Category::all();
      $currentLocale = LaravelLocalization::getCurrentLocale();
      $localeFlag = LaravelLocalization::getSupportedLocales()[$currentLocale]['flag'];
      return view('frontend.blog_details', compact('anthorBlog', 'services', 'nextBlog', 'categories', 'latestBlogs',  'blog', 'localeFlag'));
   }
   public function service($id)
   {
      $services = Service::all();
      $categories = Category::all();
      $products = Product::all();
      $service = Service::findOrFail($id);
      $currentLocale = LaravelLocalization::getCurrentLocale();
      $localeFlag = LaravelLocalization::getSupportedLocales()[$currentLocale]['flag'];
      return view('frontend.services', compact('service', 'categories', 'services', 'products', 'localeFlag'));
   }
   public function product($id)
   {
      $services = Service::all();
      $products = Product::all();
      $categories = Category::all();
      $category = Category::findOrFail($id);
      $productsInCategory = Product::where('category_id', $id)->get();
      $currentLocale = LaravelLocalization::getCurrentLocale();
      $localeFlag = LaravelLocalization::getSupportedLocales()[$currentLocale]['flag'];
      return view('frontend.products', compact('categories', 'category', 'productsInCategory',  'services', 'products', 'localeFlag'));
   }
   public function blogger()
   {
      $services = Service::all();
      $products = Product::all();
      $categories = Category::all();

      $our_clients = OurClient::all();
      $blogs = Blogs::all();
      $latestBlogs = Blogs::latest()->take(3)->get();
      $currentLocale = LaravelLocalization::getCurrentLocale();
      $localeFlag = LaravelLocalization::getSupportedLocales()[$currentLocale]['flag'];
      return view('frontend.blog', compact('blogs', 'our_clients', 'categories', 'latestBlogs', 'services', 'products', 'localeFlag'));
   }
   public function contact_us()
   {
      $services = Service::all();

      $categories = Category::all();
      $products = Product::all();
      $currentLocale = LaravelLocalization::getCurrentLocale();
      $localeFlag = LaravelLocalization::getSupportedLocales()[$currentLocale]['flag'];
      return view('frontend.contactus', compact('services', 'categories', 'products', 'localeFlag'));
   }
   public function clients()
   {
      $services = Service::all();
      $products = Product::all();
      $our_clients = OurClient::all();
      $categories = Category::all();
      $currentLocale = LaravelLocalization::getCurrentLocale();
      $localeFlag = LaravelLocalization::getSupportedLocales()[$currentLocale]['flag'];
      return view('frontend.clients', compact('services', 'products', 'categories', 'our_clients', 'localeFlag'));
   }
   public function projects()
   {
      $services = Service::all();
      $products = Product::all();
      $projects = Project::all();
      $categories = Category::all();
      $currentLocale = LaravelLocalization::getCurrentLocale();
      $localeFlag = LaravelLocalization::getSupportedLocales()[$currentLocale]['flag'];
      return view('frontend.works', compact('categories', 'services', 'products', 'projects', 'localeFlag'));
   }
   public function booking()
   {
      $services = Service::all();
      $products = Product::all();
      $projects = Project::all();
      $categories = Category::all();
      $currentLocale = LaravelLocalization::getCurrentLocale();
      $localeFlag = LaravelLocalization::getSupportedLocales()[$currentLocale]['flag'];
      return view('frontend.booking', compact('categories', 'services', 'products', 'projects', 'localeFlag'));
   }
   public function project_details($id)
   {
      $services = Service::all();
      $project = Project::findOrFail($id);
      $categories = Category::all();
      $anthorProjects = Project::inRandomOrder()->take(8)->get();
      $currentLocale = LaravelLocalization::getCurrentLocale();
      $localeFlag = LaravelLocalization::getSupportedLocales()[$currentLocale]['flag'];
      return view('frontend.works_details', compact('anthorProjects', 'categories', 'services',  'project', 'localeFlag'));
   }
   public function product_details($id)
   {
      $services = Service::all();
      $products = Product::all();
      $product = Product::findOrFail($id);
      $categories = Category::all();
      $anthorProjects = Project::inRandomOrder()->take(8)->get();
      $currentLocale = LaravelLocalization::getCurrentLocale();
      $localeFlag = LaravelLocalization::getSupportedLocales()[$currentLocale]['flag'];
      return view('frontend.products_details', compact('anthorProjects', 'product', 'categories', 'services', 'localeFlag'));
   }
   public function policy()
   {
      $services = Service::all();
      $products = Product::all();
      $categories = Category::all();
      $currentLocale = LaravelLocalization::getCurrentLocale();
      $localeFlag = LaravelLocalization::getSupportedLocales()[$currentLocale]['flag'];
      return view('frontend.policy', compact('categories', 'services', 'localeFlag'));
   }
   public function terms_and_conditions()
   {
      $services = Service::all();
      $categories = Category::all();
      $currentLocale = LaravelLocalization::getCurrentLocale();
      $localeFlag = LaravelLocalization::getSupportedLocales()[$currentLocale]['flag'];
      return view('frontend.terms_and_conditions', compact('categories', 'services', 'localeFlag'));
   }
}
