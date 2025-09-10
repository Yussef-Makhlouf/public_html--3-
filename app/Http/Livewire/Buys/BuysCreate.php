<?php

namespace App\Http\Livewire\Buys;

use App\Models\Branche;
use App\Models\Buy;
use App\Models\City;
use App\Models\Product;
use App\Models\Service;
use Exception;
use Livewire\Component;

class BuysCreate extends Component
{
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

   public function render()
   {
      $cities = City::all();
      $products = Product::all();
      $branches = Branche::all();
      $services = Service::all();
      return view('livewire.buys.buys-create', compact('cities', 'products', 'services', 'branches'));
   }
   public function save()
   {

      $validatedData = $this->validate([
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

      ], [
         'name.required' => 'الاسم مطلوب',
         'name.min' => 'لا يقبل أقل من 3 حروف',
      ]);

      try {
         $buy = new Buy();
         $buy->name = $validatedData['name'];
         $buy->mobile = $validatedData['mobile'];
         $buy->email = $validatedData['email'];
         $buy->area = $validatedData['area'];
         $buy->expire_date = $validatedData['expire_date'];
         $buy->service_id = $validatedData['service_id'];
         $buy->product_id = $validatedData['product_id'];
         $buy->count = $validatedData['count'];
         $buy->message = $validatedData['message'];
         $buy->delivery_type = $validatedData['delivery_type'];
         if ($validatedData['delivery_type'] == 'delivery') {
            $buy->city_id = $validatedData['city_id'];
            $buy->street = $validatedData['street'];
            $buy->address = $validatedData['address'];
         } elseif ($validatedData['delivery_type'] == 'without_delivery') {
            $buy->branch_id = $validatedData['branch_id'];
         }
         $isSaved = $buy->save();

         if ($isSaved) {
            session()->flash('message', 'تمت الإضافة بنجاح.');
            $this->emit('BuyAdded', ['message' => 'تمت الإضافة بنجاح']);
         } else {
            session()->flash('error', 'فشلت عملية التخزين.');
            $this->emit('BuyError', ['message' => 'فشلت عملية التخزين']);
         }
      } catch (Exception $e) {
         $this->emit('BuyError', ['message' => $e->getMessage()]);
      }
   }
}
