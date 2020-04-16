<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Support\CronJob;
use Illuminate\Support\Facades\Cache;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
         $schedule->command('inspire')
                 ->hourly();


        $schedule->exec('cd /var/www/laravel/public/temp && rm -r *.*')->dailyAt('12:00');
                 
        $CronJob = new CronJob();

        $schedule->call(function () use(&$CronJob) {

            $batchNumber = $CronJob->getApiTotalStones();

            Cache::put('batchNumber', $batchNumber, 12000);
            Cache::put('counter',1, 12000);
            Cache::put('diamondQueryState',0,12000);
            
            $CronJob->runImportDiamondRap();

            Cache::increment('diamondQueryState');
            $CronJob->runResetAllRapDiamonds();


        })->dailyAt('00:01')->runInBackground();


        $schedule->call(function () use(&$CronJob) {

            $this->diamondOncall($CronJob);

        })->cron('*/1 * * * *')->between('00:01', '00:30')->runInBackground();


        $schedule->call(function () use(&$CronJob) {

            $this->diamondOncall($CronJob);

        })->cron('*/4 * * * *')->between('00:31', '23:59')->runInBackground();

        $schedule->call(function () use(&$CronJob) {
            $CronJob->runCerts();
        })->cron('10 */12 * * *')->between('00:01', '23:59')->runInBackground();

         $schedule->call(function () use(&$CronJob) {
            $CronJob->runImages();
        })->cron('10 */12 * * *')->between('03:01', '23:59')->runInBackground();



         $schedule->call(function () use(&$CronJob) {

            if ( Cache::get('diamondQueryState')  == 2 ) {

                Cache::increment('diamondQueryState');
                $CronJob->runDiamondQueryCopy();
            }

        })->cron('*/1 * * * *')->between('00:01', '23:59')->runInBackground();



        // // test
         
        // $schedule->call(function () use(&$CronJob) {

        //    $CronJob->test();

        // })->cron('*/1 * * * *')->between('15:38', '15:39')->runInBackground();

    }


    public function diamondOncall($CronJob){
            
        $batchNumber = Cache::get('batchNumber');
        $counter = Cache::get('counter');

        if ( $batchNumber >= $counter) {

            $counter = Cache::increment('counter');

            $CronJob->runImportDiamondAPIPerBatch($counter);
        }

        if ($batchNumber == $counter) {

            $CronJob->runResetAllApiDiamonds();

            Cache::increment('diamondQueryState');
            $counter = Cache::increment('counter');

        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
