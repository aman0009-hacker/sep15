<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Layout\Content;
use Illuminate\Support\Facades\Log;
use App\Models\Yard;
use App\Models\AdminUser;
use Illuminate\Http\Request;

class Verification extends RowAction
{
    public $name = 'Verification';
    public function handle(Model $model, Request $request)
    {
        try {
           
                // return $this->response()->success("Saved Successfully")->refresh();
            }
         catch (\Throwable $ex) {
            //return $this->response()->error('Oops! Sending mail has encountered some internal problem');
            Log::info($ex->getMessage());
        }
    }


    public function form()
    {
        $this->email('email')->required()->attribute('id','emailverification');
    }
}