<?php

namespace App\Http\Livewire\Admin\Balance;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\{Company, Driver, Transaction};

class BalanceShow extends Component
{
    use WithPagination;

    public $model;
    public $model_id;
    public $date;

    public function mount($modelable, $id) {
        $this->model_id = $id;
        if($modelable === 'driver') { $this->model = 'App\Models\Driver'; }
        else if($modelable === 'company') { $this->model = 'App\Models\Company'; }
        else { return redirect()->to('/admin'); }
    }

    public function render()
    {
        $data = $this->model::with('balance')->find($this->model_id);
        // $transactions = $data->load('transactions', function($query){
        //     return $query->paginate();
        // });
        $transactions = $data->transactions()
            ->when($this->date, function($query){
                return $query
                    ->whereDate('created_at', \Carbon\Carbon::parse($this->date)->format('Y-m-d'))
                    ->orderBy('created_at', 'desc');
            })
            ->orderBy('created_at', 'desc')
            ->paginate();
        return view('admin.balance.show', compact('data','transactions'));
    }
}
