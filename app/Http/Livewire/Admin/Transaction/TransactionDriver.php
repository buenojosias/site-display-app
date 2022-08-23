<?php

namespace App\Http\Livewire\Admin\Transaction;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Driver;

class TransactionDriver extends Component
{
    public $date = '2022-08-12';
    public $drivers;

    public function register() {
        
        $drivers = Driver::where('active', 1)
            ->whereHas('displays', function($query) { $query->whereDate('datetime', $this->date); })
            ->with(['displays' =>  function($query) { $query->whereDate('datetime', $this->date)->selectRaw('sum(cost) * 0.4 as reward, driver_id')->groupBy('driver_id'); }])
            ->whereDoesntHave('transactions', function($query) { $query->whereDate('displays_date', $this->date); })
            ->get();
                
        foreach($drivers as $driver) {
            $transaction = $driver->transactions()->create([
                'id' => strtoupper(Str::random(8)),
                'type' => 'R',
                'description' => 'Recompensa referente às exibições do dia '.$this->date,
                'amount' => $driver->displays[0]->reward,
                'before' => 0,
                'after' => $driver->displays[0]->reward,
                'displays_date' => $this->date
            ]);
        };
        $this->drivers = [];

    }

    public function mount() {
        $drivers = Driver::
            where('active', 1)
            ->whereHas('displays', function($query) {
                $query->whereDate('datetime', $this->date);
            })
            ->withCount(['displays' => function($query) {
                $query->whereDate('datetime', $this->date);
            }])
            ->with(['displays' =>  function($query) {
                $query->whereDate('datetime', $this->date)
                ->selectRaw('sum(cost) * 0.4 as reward, driver_id')
                ->groupBy('driver_id');
            }])
            ->whereDoesntHave('transactions', function($query) {
                $query->whereDate('displays_date', $this->date);
            })
            // ->withCount(['transactions' =>  function($query) {
            //     $query->whereDate('displays_date', $this->date);
            // }])
            ->get();
            $this->drivers = $drivers;
            //dd($this->drivers);
    }

    public function render()
    {
        return view('livewire.admin.transaction.transaction-driver');
    }
}
