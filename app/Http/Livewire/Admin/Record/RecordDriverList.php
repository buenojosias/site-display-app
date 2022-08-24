<?php

namespace App\Http\Livewire\Admin\Record;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\Driver;
use WireUi\Traits\Actions;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class RecordDriverList extends Component
{
    use Actions;

    public $date;
    private $formated_date;
    public $drivers;
    public $driver_id;

    public function registerOne($drv) {
        $this->driver_id = $drv;
        $driver = Driver::where('active', 1)
            ->whereHas('displays', function($query) { $query->whereDate('datetime', Carbon::parse($this->date)->format('Y-m-d')); })
            ->with(['displays' =>  function($query) { $query->whereDate('datetime', Carbon::parse($this->date)->format('Y-m-d'))->selectRaw('sum(cost) as cost, driver_id')->groupBy('driver_id'); }])
            ->with('balance')
            ->whereDoesntHave('transactions', function($query) { $query->whereDate('displays_date', Carbon::parse($this->date)->format('Y-m-d')); })
            ->find($this->driver_id);
        if($driver) {
            $driver->reward = round($driver->displays[0]->cost * $driver->default_reward / 100);
            $new_balance = $driver->balance->amount + $driver->reward;
            DB::beginTransaction();
            $transaction = $driver->transactions()->create([
                'id' => strtoupper(Str::random(8)),
                'type' => 'R',
                'description' => 'Recompensa referente às exibições do dia '.Carbon::parse($this->date)->format('d/m/Y'),
                'amount' => $driver->reward,
                'before' => $driver->balance->amount,
                'after' => $new_balance,
                'displays_date' => Carbon::parse($this->date)->format('Y-m-d')
            ]);
            $balance = $driver->balance()->update(['amount' => $new_balance]);
            if($transaction && $balance){
                DB::commit();
                $this->dialog([
                    'title' => 'Sucesso!','description'=>'Informações salvas com sucesso.','icon'=>'success'
                ]);
            } else {
                DB::rollback();
                $this->dialog([
                    'title' => 'Ops!','description'=>'Ocorreu um erro ao salvar informações.','icon'=>'error'
                ]);
            }
        }
    }

    public function registerAll() {
        $this->formated_date = Carbon::parse($this->date)->format('Y-m-d');
        $drivers = Driver::where('active', 1)
            ->whereHas('displays', function($query) { $query->whereDate('datetime', $this->formated_date); })
            ->with(['displays' =>  function($query) { $query->whereDate('datetime', $this->formated_date)->selectRaw('sum(cost) as cost, driver_id')->groupBy('driver_id'); }])
            ->with('balance')
            ->whereDoesntHave('transactions', function($query) { $query->whereDate('displays_date', $this->formated_date); })
            ->get();
                
        foreach($drivers as $driver) {
            $driver->reward = round($driver->displays[0]->cost * $driver->default_reward / 100);
            $new_balance = $driver->balance->amount + $driver->reward;
            DB::beginTransaction();
            $transaction = $driver->transactions()->create([
                'id' => strtoupper(Str::random(8)),
                'type' => 'R',
                'description' => 'Recompensa referente às exibições do dia '.$this->date,
                'amount' => $driver->reward,
                'before' => $driver->balance->amount,
                'after' => $new_balance,
                'displays_date' => $this->formated_date,
            ]);
            $balance = $driver->balance()->update(['amount' => $new_balance]);
            if($transaction && $balance){
                DB::commit();
                $this->dialog([
                    'title' => 'Sucesso!','description'=>'Informações salvas com sucesso.','icon'=>'success'
                ]);
            } else {
                DB::rollback();
                $this->dialog([
                    'title' => 'Ops!','description'=>'Ocorreu um erro ao salvar informações.','icon'=>'error'
                ]);
            }
        };
    }

    public function render()
    {
        if($this->date == '') { $this->date = Carbon::yesterday(); }
        //$this->date = '2022-08-22';
        $drivers = Driver::
            where('active', 1)
            ->whereHas('displays', function($query) {
                $query->whereDate('datetime', Carbon::parse($this->date)->format('Y-m-d'));
            })
            ->withCount(['displays' => function($query) {
                $query->whereDate('datetime', Carbon::parse($this->date)->format('Y-m-d'));
            }])
            ->with(['displays' =>  function($query) {
                $query->whereDate('datetime', Carbon::parse($this->date)->format('Y-m-d'))
                ->selectRaw('sum(cost) as cost, driver_id')
                ->groupBy('driver_id');
            }])
            /*->whereDoesntHave('transactions', function($query) {
                $query->whereDate('displays_date', Carbon::parse($this->date)->format('Y-m-d'));
            })*/
            ->withCount(['transactions' =>  function($query) {
                $query->whereDate('displays_date', Carbon::parse($this->date)->format('Y-m-d'));
            }])
            ->get();

            foreach($drivers as $driver) {
                $driver->reward = round($driver->displays[0]->cost * $driver->default_reward / 100);
            }

            $this->drivers = $drivers;
            //dd($this->drivers);
            return view('admin.record.drivers-list');
    }
}
