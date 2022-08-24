<?php

namespace App\Http\Livewire\Admin\Record;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use WireUi\Traits\Actions;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class RecordCompanyList extends Component
{
    use Actions;

    public $date;
    private $formated_date;
    public $companies;
    public $company_id;

    public function registerOne($cid) {
        $this->company_id = $cid;
        $company = Company::where('active', 1)
            ->whereHas('displays', function($query) { $query->whereDate('datetime', Carbon::parse($this->date)->format('Y-m-d')); })
            ->with(['displays' =>  function($query) { $query->whereDate('datetime', Carbon::parse($this->date)->format('Y-m-d'))->selectRaw('sum(cost) as cost, company_id')->groupBy('company_id'); }])
            ->with('balance')
            ->whereDoesntHave('transactions', function($query) { $query->whereDate('displays_date', Carbon::parse($this->date)->format('Y-m-d')); })
            ->find($this->company_id);
        if($company) {
            $company->total_cost = $company->displays[0]->cost;
            $new_balance = $company->balance->amount - $company->total_cost;
            DB::beginTransaction();
            $transaction = $company->transactions()->create([
                'id' => strtoupper(Str::random(8)),
                'type' => 'E',
                'description' => 'Cobrança referente às exibições da(s) campanha(s) do dia '.Carbon::parse($this->date)->format('d/m/Y'),
                'amount' => $company->total_cost,
                'before' => $company->balance->amount,
                'after' => $new_balance,
                'displays_date' => Carbon::parse($this->date)->format('Y-m-d')
            ]);
            $balance = $company->balance()->update(['amount' => $new_balance]);
            if($transaction && $balance){
                DB::commit();
                $this->dialog([
                    'title' => 'Sucesso!','description'=>'Registro salvo com sucesso.','icon'=>'success'
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
        $companies = Company::where('active', 1)
            ->whereHas('displays', function($query) { $query->whereDate('datetime', Carbon::parse($this->date)->format('Y-m-d')); })
            ->with(['displays' =>  function($query) { $query->whereDate('datetime', Carbon::parse($this->date)->format('Y-m-d'))->selectRaw('sum(cost) as cost, company_id')->groupBy('company_id'); }])
            ->with('balance')
            ->whereDoesntHave('transactions', function($query) { $query->whereDate('displays_date', Carbon::parse($this->date)->format('Y-m-d')); })
            ->get();
        foreach($companies as $company) {
            $company->total_cost = $company->displays[0]->cost;
            $new_balance = $company->balance->amount - $company->total_cost;
            DB::beginTransaction();
            $transaction = $company->transactions()->create([
                'id' => strtoupper(Str::random(8)),
                'type' => 'E',
                'description' => 'Cobrança referente às exibições da(s) campanha(s) do dia '.Carbon::parse($this->date)->format('d/m/Y'),
                'amount' => $company->total_cost,
                'before' => $company->balance->amount,
                'after' => $new_balance,
                'displays_date' => Carbon::parse($this->date)->format('Y-m-d')
            ]);
            $balance = $company->balance()->update(['amount' => $new_balance]);
            if($transaction && $balance){
                DB::commit();
                $this->dialog([
                    'title' => 'Sucesso!','description'=>'Registros salvos com sucesso.','icon'=>'success'
                ]);
            } else {
                DB::rollback();
                $this->dialog([
                    'title' => 'Ops!','description'=>'Ocorreu um erro ao salvar informações.','icon'=>'error'
                ]);
            }  
        }
    }

    public function render()
    {
        // if($this->date == '') { $this->date = Carbon::yesterday(); }
        $this->date = '2022-08-22';
        $companies = Company::
            where('active', 1)
            ->whereHas('displays', function($query) {
                $query->whereDate('datetime', Carbon::parse($this->date)->format('Y-m-d'));
            })
            ->withCount(['displays' => function($query) {
                $query->whereDate('datetime', Carbon::parse($this->date)->format('Y-m-d'));
            }])
            ->with(['displays' =>  function($query) {
                $query->whereDate('datetime', Carbon::parse($this->date)->format('Y-m-d'))
                ->selectRaw('sum(cost) as cost, company_id')
                ->groupBy('company_id');
            }])
            ->withCount(['transactions' =>  function($query) {
                $query->whereDate('displays_date', Carbon::parse($this->date)->format('Y-m-d'));
            }])
            ->get();
        foreach($companies as $company) {
            $company->total_cost = $company->displays[0]->cost;
        }
        $this->companies = $companies;
        return view('admin.record.company-list');
    }
}
