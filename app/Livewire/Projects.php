<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;
    public $perPage = 5;
    public $search = "";
    public $project = "";

    public $sortDirection = "ASC";
    public $sortColumn = "name";

    public function doSort($column){
        if($this->sortColumn == $column) {
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortColumn = $column;
        $this->sortDirection = "ASC";
    }

    public function mount() {

    }
    public function addProject(){
        if($this->project != ''){
            $projects = new Project();
            $projects->project = $this->project;
            $projects->save();
            $this->project = "";
        }
    }
    public function deleteProject(Project $project){
        $project->delete();
    }

    public function updatedPerPage(){
        $this->resetPage();
    }
    public function updatedSearch(){
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.projects',[
            'projects' => Project::search($this->search)
            ->orderBy($this->sortColumn,$this->sortDirection)
            ->paginate($this->perPage)
        ]); //
    }
}
