<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Buy;
use App\Models\Contact;
use App\Models\OurClient;
use App\Models\Product;
use App\Models\Project;
use App\Models\Reservation;
use App\Models\Reviews;
use App\Models\SpecialOffer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
      $reservations = Reservation::all();
      $dataReservation = [];
      $contacts = Contact::all();
      $dataContact = [];
      $buys = Buy::all();
      $dataBuy = [];

      $startOfWeek = Carbon::now()->startOfWeek(); // تاريخ بداية الأسبوع الحالي

      foreach ($reservations as $reservation) {
         $created_at = Carbon::parse($reservation->created_at)->format('Y-m-d');
         $date = Carbon::parse($reservation->date)->format('Y-m-d');

         // فحص ما إذا كان تاريخ الإنشاء في نطاق الأسبوع الحالي
         if (Carbon::parse($created_at)->greaterThanOrEqualTo($startOfWeek)) {
            $dataReservation[] = [
               'name' => $reservation->name,
               'created_at' => $created_at,
               'date' => $date,
            ];
         }
      }

      foreach ($contacts as $contact) {
         $created_at = Carbon::parse($contact->created_at)->format('Y-m-d');
         // فحص ما إذا كان تاريخ الإنشاء في نطاق الأسبوع الحالي
         if (Carbon::parse($created_at)->greaterThanOrEqualTo($startOfWeek)) {
            $dataContact[] = [
               'created_at' => $created_at,
               'message' => $contact->message,
               'name' => $contact->name,
            ];
         }
      }

      foreach ($buys as $buy) {
         $created_at = Carbon::parse($buy->created_at)->format('Y-m-d');
         // فحص ما إذا كان تاريخ الإنشاء في نطاق الأسبوع الحالي
         if (Carbon::parse($created_at)->greaterThanOrEqualTo($startOfWeek)) {
            $dataBuy[] = [
               'created_at' => $created_at,
            ];
         }
      }
      $products = Product::latest()->take(5)->get();
      $blogs = Blogs::latest()->take(4)->get();
      $projects = Project::all();
      $our_clients  = OurClient::latest()->take(5)->get();
      $offers  = SpecialOffer::latest()->take(5)->get();
      $reviews  = Reviews::latest()->take(5)->get();
      $jsonDataReservation = json_encode($dataReservation);
      $jsonDataContacts = json_encode($dataContact);
      $jsonDataBuys = json_encode($dataBuy);

      return view('cms.home', compact('offers', 'blogs', 'reviews', 'products', 'projects', 'our_clients', 'jsonDataReservation', 'contacts', 'jsonDataContacts', 'buys', 'jsonDataBuys', 'reservations'));
   }

   public function getData()
   {
      $lastMonthData = [
         'contacts' => Contact::whereMonth('created_at', now()->subMonth()->month)->count(),
         'buys' => Buy::whereMonth('created_at', now()->subMonth()->month)->count(),
         'reservations' => Reservation::whereMonth('created_at', now()->subMonth()->month)->count()
      ];

      $currentMonthData = [
         'contacts' => Contact::whereMonth('created_at', now()->month)->count(),
         'buys' => Buy::whereMonth('created_at', now()->month)->count(),
         'reservations' => Reservation::whereMonth('created_at', now()->month)->count()
      ];

      $data = [
         [
            'name' => 'Contacts',
            'lastMonth' => $lastMonthData['contacts'],
            'currentMonth' => $currentMonthData['contacts']
         ],
         [
            'name' => 'Buys',
            'lastMonth' => $lastMonthData['buys'],
            'currentMonth' => $currentMonthData['buys']
         ],
         [
            'name' => 'Reservations',
            'lastMonth' => $lastMonthData['reservations'],
            'currentMonth' => $currentMonthData['reservations']
         ]
      ];

      return response()->json($data);
   }
}
