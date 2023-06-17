<?php

namespace App\Http\Livewire\Site;
use App\Models\Food;
use Livewire\Component;

class MenuDetails extends Component
{
    
    public $selectedSize = '';
    public $selectedExtras = [];
    public $totalPrice = '';
    public $message = '';
    public $foods;
    public $idd;
    
    public function render()
    {
        $this->idd = app('App\Http\Controllers\FrontendController')->menu_detail_livewere();
        $this->foods = Food::find($this->idd); // Food modelinden tüm yiyecekleri alır

        return view('livewire.site.menu-details', [
            'selectedSize' => $this->selectedSize,
            'selectedExtras' => $this->selectedExtras,
            'totalPrice' => $this->totalPrice
        ]);
    }

    // public function totalPrice()
    // {
    //     // Seçilen boyutun fiyatını al
    //     $sizePrice = $this->size ?? 0;

    //     // Seçilen extra yiyeceklerin fiyatlarını topla
    //     $extrasPrice = 0;
    //     if ($this->extras) {
    //         foreach ($this->extras as $extra => $price) {
    //             if ($price) {
    //                 $extrasPrice += $price;
    //             }
    //         }
    //     }

    //     // Toplam fiyatı döndür
    //     return $sizePrice + $extrasPrice;
    // }


    public function updateTotalPrice($value)
    {
        $price=json_decode($this->foods->price, TRUE);
        $firstPrice = $price[0];
        $SecondPrice = $price[1];
        $ThirdPrice = $price[2];

        $firstPrice = intval($firstPrice);
        $SecondPrice = intval($SecondPrice);
        $ThirdPrice = intval($ThirdPrice);

        // Boyut seçimi değiştiğinde fiyatı güncelleyin
        if ($value === 'large') {
            $this->totalPrice = $firstPrice; // İlgili fiyatı burada belirtin
        } elseif ($value === 'medium') {
            $this->totalPrice = $SecondPrice; // İlgili fiyatı burada belirtin
        } elseif ($value === 'small') {
            $this->totalPrice = $ThirdPrice; // İlgili fiyatı burada belirtin
        }
    }

    public function like()
    {
        $this->message = 'Post liked!'; // Butona tıklandığında mesajı güncelliyoruz
    }

    public function updatedSelectedExtras($value)
    {
        // Ekstra seçimleri değiştiğinde fiyatı güncelleyin
        $this->calculateTotalPrice();
    }

    private function calculateTotalPrice()
    {
        // Fiyat hesaplama mantığını burada gerçekleştirin
        // Seçilen boyut, ekstralar ve fiyatları kullanarak toplam fiyatı güncelleyin
        // Sonucu $this->totalPrice değişkenine atayın
    }
}
