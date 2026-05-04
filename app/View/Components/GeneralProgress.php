<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GeneralProgress extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $project)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $count = 0 ;
        $task_number = $this->project->tasks()->count();

        foreach ($this->project->tasks as $task) {
            if (($task->deliveries()->count()) > 0) {
                $count++;
            }
        }
        if ($task_number == 0) {
            $progress = 0;
        }else{
            $progress = ($count/$task_number) * 100;
        }
        return view('components.general-progress' , compact('progress'));
    }
}
