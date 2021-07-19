<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Http\Support\CronJob;
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

                 
        $CronJob = new CronJob();


        $schedule->call(function () use(&$CronJob) {
            
            Cache::put('counter',1, 90000);
            Cache::put('diamondQueryState',0,90000);

            $CronJob->runImportDiamondRap();
            $CronJob->runImportDiamondSunrise();

            Cache::increment('diamondQueryState');
            $CronJob->runResetAllRapDiamonds();


        })->dailyAt('00:01')->runInBackground();


        $schedule->call(function () use(&$CronJob) {

            $batchNumber = $CronJob->getApiTotalStones();

            Cache::put('batchNumber', $batchNumber, 90000);
            
        })->dailyAt('00:02')->runInBackground();


        $schedule->call(function () use(&$CronJob) {

            $CronJob->runImportFancyDiamondAPIPerBatch();

        })->dailyAt('00:03')->runInBackground();


        $this->intervalOncall($CronJob,$schedule);

        // Images Cache
        $schedule->call(function () use(&$CronJob) {
            $CronJob->runImages();
        })->cron('1 */15 * * *')->between('12:01', '23:59')->runInBackground();

        //Certs Cache
        $schedule->call(function () use(&$CronJob) {
            $CronJob->runCerts();
        })->cron('1 */15 * * *')->between('14:01', '23:59')->runInBackground();


        $schedule->call(function () use(&$CronJob) {

            if ( Cache::get('diamondQueryState')  == 2 ) {
            
                Cache::increment('diamondQueryState');
                $CronJob->copyToDiamondQuery();
                // $CronJob->runImportDiamondSunrise();

                // $CronJob->runDiamondQueryCopy();
            }

        })->cron('*/1 * * * *')->between('00:01', '23:59')->runInBackground();


        //sitemap
        $schedule->call(function () use(&$CronJob) {

            $CronJob->generateSitemap();

        })->dailyAt('20:00')->runInBackground();



        // $schedule->command('inspire')->dailyAt('20:20')->runInBackground()->pingBefore('https://tingdiamond.com/big-sitemap/diamonds/');


        //test

        // $this->test();

    }
    public function test(){
            
         
        $schedule->call(function () use(&$CronJob) {

            $CronJob->runDiamondQueryCopy();

        })->dailyAt('03:57')->runInBackground();

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
    public function intervalOncall($CronJob,$schedule)
    {
        //regular
        $schedule->call(function () use(&$CronJob) {
            $this->diamondOncall($CronJob);
        })->cron('*/7 * * * *')->between('00:02', '23:59')->runInBackground();



        //extra
        $schedule->call(function () use(&$CronJob) {
            $this->diamondOncall($CronJob);
        })->cron('*/1 * * * *')->between('00:02', '01:15')->runInBackground();

        $schedule->call(function () use(&$CronJob) {
            $this->diamondOncall($CronJob);
        })->cron('*/3 * * * *')->between('02:00', '02:15')->runInBackground();

        $schedule->call(function () use(&$CronJob) {
            $this->diamondOncall($CronJob);
        })->cron('*/3 * * * *')->between('03:00', '03:15')->runInBackground();

        $schedule->call(function () use(&$CronJob) {
            $this->diamondOncall($CronJob);
        })->cron('*/3 * * * *')->between('04:00', '04:15')->runInBackground();

        $schedule->call(function () use(&$CronJob) {
            $this->diamondOncall($CronJob);
        })->cron('*/3 * * * *')->between('05:00', '05:15')->runInBackground();

        $schedule->call(function () use(&$CronJob) {
            $this->diamondOncall($CronJob);
        })->cron('*/3 * * * *')->between('06:00', '06:15')->runInBackground();

        $schedule->call(function () use(&$CronJob) {
            $this->diamondOncall($CronJob);
        })->cron('*/3 * * * *')->between('07:00', '07:15')->runInBackground();

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
