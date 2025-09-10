<?php

namespace App\Http\Livewire\Buys;

use App\Models\Branche;
use App\Models\Buy;
use App\Models\City;
use App\Models\Product;
use App\Models\Service;
use Livewire\Component;

class BuysShow extends Component
{
   public $buy;
   public $name;
   public $mobile;
   public $email;
   public $area;
   public $expire_date;
   public $service_id;
   public $product_id;
   public $count;
   public $message;
   public $delivery_type;
   public $city_id;
   public $street;
   public $address;
   public $branch_id;

   public function mount(Buy $buy)
   {
      $this->buy = $buy;
      $this->name = $buy->name;
      $this->mobile = $buy->mobile;
      $this->email = $buy->email;
      $this->area = $buy->area;
      $this->expire_date = $buy->expire_date;
      $this->service_id = $buy->service_id;
      $this->product_id = $buy->product_id;
      $this->count = $buy->count;
      $this->message = $buy->message;
      $this->delivery_type = $buy->delivery_type;
      $this->city_id = $buy->city_id;
      $this->street = $buy->street;
      $this->address = $buy->address;
      $this->branch_id = $buy->branch_id;
   }

   public function render()
   {
      $buy = $this->buy;
      $cities = City::all();
      $products = Product::all();
      $branches = Branche::all();
      $services = Service::all();
      return view('livewire.buys.buys-show', compact('buy', 'cities', 'products', 'services', 'branches'));
   }
}
