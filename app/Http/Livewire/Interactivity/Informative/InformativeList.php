<?php

namespace App\Http\Livewire\Interactivity\Informative;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use WireUi\Traits\Actions;
use App\Models\Informative;

class InformativeList extends Component
{
    use Actions;

    public $search = null;
    public $status = null;

    public function filterStatus($active) {
        $this->status = $active;
    }

    public function render()
    {
        $informatives = Informative::
        when($this->search, function($query){
            return $query->where('title', 'LIKE', "%$this->search%");
        })
        ->when($this->status, function($query){
            return $query->where('active', $this->status);
        })
        ->with('category')
        ->withCount('accesses')
        ->orderBy('created_at','desc')
        ->paginate();

        return view('livewire.interactivity.informative.list', ['informatives' => $informatives])->layout('layouts.interactivity');
    }

    public function deleteOne($id) {
        $informative = Informative::with(['image','video'])->findOrFail($id);
        if ($informative->image) {
            try {
                Storage::disk('s3')->delete($informative->image->filename);
                $informative->image->delete();
            } catch (\Throwable $th) {
                $this->dialog(['description'=>'Ocorreu um erro ao excluir a imagem.','icon'=>'error']);
                dd($th);
            }
        } else if ($informative->video) {
            try {
                Storage::disk('s3')->delete($informative->video->filename);
                $informative->video->delete();
            } catch (\Throwable $th) {
                $this->dialog(['description'=>'Ocorreu um erro ao excluir o vídeo.','icon'=>'error']);
                dd($th);
            }
        }

        try {
            if ($informative->image) {
            } else if ($informative->video) {
            }
            $informative->accesses()->delete();
            $informative->delete();
            $this->dialog(['description'=>'Informativo excluído com sucesso.','icon'=>'success']);
        } catch (\Throwable $th) {
            $this->dialog(['description'=>'Ocorreu um erro ao excluir o informativo.','icon'=>'error']);
            dd($th);
        }
    }

}
