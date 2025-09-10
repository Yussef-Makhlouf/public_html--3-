<?php

namespace App\Http\Livewire\Buys;

use App\Models\Branche;
use App\Models\Buy;
use App\Models\City;
use App\Models\Product;
use App\Models\Service;
use Exception;
use Livewire\Component;

class BuysEdit extends Component
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


   protected $rules = [
      'name' => 'required|string|min:3|max:120',
      'mobile' => 'required',
      'email' => 'required',
      'area' => 'required',
      'expire_date' => 'required',
      'service_id' => 'required',
      'product_id' => 'required',
      'count' => 'required',
      'message' => 'required',
      'delivery_type' => 'required',
      'city_id' => 'nullable',
      'street' => 'nullable',
      'address' => 'nullable',
      'branch_id' => 'nullable',
   ];

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
      return view('livewire.buys.buys-edit', compact('buy', 'cities', 'products', 'services', 'branches'));
   }


   public function update()
   {
      try {
         $this->validate();
         $buy = buy::findOrFail($this->buy->id);
         $buy->name = $this->name;
         $buy->mobile = $this->mobile;
         $buy->email = $this->email;
         $buy->area = $this->area;
         $buy->expire_date = $this->expire_date;
         $buy->service_id = $this->service_id;
         $buy->product_id = $this->product_id;
         $buy->count = $this->count;
         $buy->message = $this->message;
         $buy->delivery_type = $this->delivery_type;
         if ($this->delivery_type == 'delivery') {
            $buy->city_id = $this->city_id;
            $buy->street = $this->street;
            $buy->address = $this->address;
         } elseif ($this->delivery_type == 'without_delivery') {
            $buy->branch_id = $this->branch_id;
         }
         $isSaved = $buy->save();

         if ($isSaved) {
            session()->flash('message', 'تم تحديث المنتج بنجاح.');
            return redirect()->route('buys.index');
         } else {
            session()->flash('error', 'فشلت عملية التحديث.');
            $this->emit('buyUpdated', ['message' => 'فشلت عملية التحديث.']);
         }
      } catch (Exception $e) {
         session()->flash('error', 'حدث خطأ أثناء التحديث.');
         $this->emit('buyError', ['message' => $e->getMessage()]);
      }
   }
}
