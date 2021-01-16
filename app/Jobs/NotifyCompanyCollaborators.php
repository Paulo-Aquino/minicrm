<?php

namespace App\Jobs;

use App\Mail\CompanyCollaborators;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Company;
use App\Models\Collaborator;
use Mail;

class NotifyCompanyCollaborators implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $company = Company::all();
        foreach ($company as $key => $value) {
            $count = Collaborator::where('company_id',$value->id)->count();
            $email = new CompanyCollaborators($value->name,$count);
            Mail::to($value->email)->send($email);
        }
    }
}
