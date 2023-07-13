<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;

class sendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:Notifications ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending timely notifications to Users';

        
    /**
     * Execute the console command
     *
     * @return void
     */
    public function handle()
    {
        $userId = '1';
       $user  = User::findOrFail($userId);
       $user->update(['name'=> $this->getNewName($user->name)]);
       $this->info("User with ID {$userId} has been updated.");
    
     if(! $this->confirm('Update all users?')){
        return $this->error('All updates cancelled.');
    }
    $this->withProgressBar(User::all(),function($user){
        $user->update(['name'=> $this->getNewName($user->name)]);
    });
    $this->newLine();
    $this->info('Updates completed successfully');
}
    private function getNewName(string $name)
    {
     return 'Kiko Demus';
    }
    
}
