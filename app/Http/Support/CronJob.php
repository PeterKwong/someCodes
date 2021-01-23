<?php

namespace App\Support;

use App\Diamond;
use App\Route\DiamondSitemap;
use App\Support\DiamondImport;
use App\Http\Controllers\DiamondController;
use App\Http\Controllers\AppointmentController;


/**
* 
*/
class CronJob
{
	
	public $ip = '';

	function __construct()
	{
		$this->ip = 'production : ';
	}

	public function run(){

		$appoint = new AppointmentController();
		$diamondImport = new DiamondImport();


		$jobs = [];
		$diamondController = new DiamondController();

		// reset stones not update for 2 days
		//  dd('run'); 
		
		// $reset = $diamondController->resetAllDiamonds2days();
		// if ($reset == 1) {
		// 	$jobs = [ $this->ip . 'reset'=>'done'];
		// 	$appoint->cronDone($jobs);
		// }
		


	}
	public function generateDiamondSitemap(){
		$diamond = new DiamondSitemap();
		return $diamond->create();
	} 

	public function test(){
		$appoint = new AppointmentController();

		$jobs = [ $this->ip . 'start working on reset Rap'=> now()];
		$appoint->cronDone($jobs);

		$jobs = [ $this->ip . 'reset Rap'=>'done'];
		$appoint->cronDone($jobs);

		$diamondImport = new DiamondImport();
		return $diamondImport->test();

	}
	
	public function getApiTotalStones(){

		$diamondImport = new DiamondImport();
		return $diamondImport->getSupplierTotalStones();
	}

	public function runImportDiamondRap(){

		$appoint = new AppointmentController();
		$diamondImport = new DiamondImport();


		$jobs = [];
		$diamondController = new DiamondController();


		$jobs = [ $this->ip . 'start working on rap import'=> now()];
		$appoint->cronDone($jobs);
		
		//rap
		$rap = $diamondImport->importDiamondFromRap();
		if ($rap != 1) {
			// $jobs = [ $this->ip . 'rap Import'=>'fail'];
			// $appoint->cronDone($jobs);
		}


	}

	public function runImportDiamondSunrise(){

		$appoint = new AppointmentController();
		$diamondImport = new DiamondImport();


		$jobs = [];
		$diamondController = new DiamondController();


		$jobs = [ $this->ip . 'start working on Sunrise import'=> now()];
		$appoint->cronDone($jobs);
		
		//rap
		$rap = $diamondImport->getDiamondsFromSunrise();
		if ($rap != 1) {
			// $jobs = [ $this->ip . 'rap Import'=>'fail'];
			// $appoint->cronDone($jobs);
		}


	}

	public function runResetAllRapDiamonds(){

		$appoint = new AppointmentController();
		$diamondImport = new DiamondImport();


		$jobs = [];
		$diamondController = new DiamondController();


		$jobs = [ $this->ip . 'start working on reset Rap'=> now()];
		$appoint->cronDone($jobs);

		$reset = $diamondImport->resetAllRapDiamonds();
		if ($reset != 1) {
			// $jobs = [ $this->ip . 'reset Rap'=>'fail'];
			// $appoint->cronDone($jobs);
		}


	}

	public function runImportDiamondAPIPerBatch($p = 0){

		$diamondImport = new DiamondImport();

		$p = $p *1000 +1;

		// $appoint = new AppointmentController();
		// $jobs = [ $this->ip . 'start working on api import at ' . $p => now()];
		// $appoint->cronDone($jobs);

		// $api = $diamondImport->importDiamondFromAPI($p = 1);
		$api = $diamondImport->importDiamondFromAPI_1000_PerBatch($p);
		$api = $diamondImport->importFancyDiamondFromAPI_1000_PerBatch($p);

		if ($api != 1) {
			// $jobs = [ $this->ip . 'api import ' . $p =>'fail'];
			// $appoint->cronDone($jobs);
		}


	}

	public function runResetAllApiDiamonds(){

		$appoint = new AppointmentController();
		$diamondImport = new DiamondImport();

		$jobs = [ $this->ip . 'start working on reset API'=> now()];
		$appoint->cronDone($jobs);

		$reset = $diamondImport->resetAllApiDiamonds();
		if ($reset != 1) {
			// $jobs = [ $this->ip . 'reset API'=>'fail'];
			// $appoint->cronDone($jobs);
		}

	}

	public function runImages(){

		$appoint = new AppointmentController();
		$diamondImport = new DiamondImport();


		$jobs = [];

		//reset stones not update for 2 days
		 // dd('run'); 

		// $jobs = [ $this->ip . 'start working on images'=> now()];
		// $appoint->cronDone($jobs);

		$images = $diamondImport->preloadImages();
		if ($images != 1) {
			// $jobs = [ $this->ip . 'Preload-Images'=>'fail'];
			// $appoint->cronDone($jobs);
		}
		

	}

	public function runCerts(){

		$appoint = new AppointmentController();
		$diamondImport = new DiamondImport();


		$jobs = [];

		//reset stones not update for 2 days
		 // dd('run'); 

		// $jobs = [ $this->ip . 'start working on certs'=> now()];
		// $appoint->cronDone($jobs);

		$certs = $diamondImport->preloadCerts();
		if ($certs != 1) {
			// $jobs = [ $this->ip . 'Preload-PDF'=>'fail'];
			// $appoint->cronDone($jobs);
		}



	}


	public function runPlots(){

		$diamondImport = new DiamondImport();


		$jobs = [];


		$plots = $diamondImport->preloadPlots();
		if ($plots != 1) {
			// $jobs = [ $this->ip . 'Preload-PDF'=>'fail'];
			// $appoint->cronDone($jobs);
		}

	}

	public function deleteAll(){

		$appoint = new AppointmentController();
		$diamondImport = new DiamondImport();


		$jobs = [];


		$certs = $diamondImport->deleteSpace();


	}
	
	public function resetImageAndCertCache(){

      $diamonds = Diamond::where('cert_cache','1')->chunk(1000, function($diams){

              if (count($diams)) {

                foreach ($diams as $diamond) {
                  // dd(print_r($diamond->updated_at));
                      $diamond->cert_cache = NULL;
                      $diamond->update();
                  
                }
              }

        }

      );

      
      
      $diamonds = Diamond::where('image_cache','1')->chunk(1000, function($diams){
        
              if (count($diams)) {

                foreach ($diams as $diamond) {
                  // dd(print_r($diamond->updated_at));
                      $diamond->image_cache = NULL;
                      $diamond->update();
                  
                }
              }

        }

      );


      return 'reset';

	}

	public function runDiamondQueryCopy(){


		$appoint = new AppointmentController();
		$diamondImport = new DiamondImport();

		$jobs = [ $this->ip . 'start working on diamond trancate insert'=> now()];
		$appoint->cronDone($jobs);

		$reset = $diamondImport->truncateAndInsert();
		if ($reset == 1) {
			$jobs = [ $this->ip . 'diamond Query copy'=>'all done'];
			$appoint->cronDone($jobs);
		}
		
		
	}
	
	public function copyToDiamondQuery(){


		$appoint = new AppointmentController();
		$diamondImport = new DiamondImport();

		$jobs = [ $this->ip . 'start working on diamond copy diamond query'=> now()];
		$appoint->cronDone($jobs);

		$reset = $diamondImport->insertOrUpdate();
		if ($reset == 1) {
			$jobs = [ $this->ip . 'diamond Query copy'=>'all done'];
			$appoint->cronDone($jobs);
		}
		
		$reset = $diamondImport->deleteAllDiamonds();
		if ($reset == 1) {
			$jobs = [ $this->ip . 'Delete diamonds'=>'all done'];
			$appoint->cronDone($jobs);
		}
		
		
	}
	

}