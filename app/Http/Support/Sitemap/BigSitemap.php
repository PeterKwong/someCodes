<?php

namespace App\Http\Support\Sitemap;
/**
 * 
 */
use DB;
use cache;

class BigSitemap 
{

	public function create(){
		

	$combinedSitemap = app()->make('sitemap');

	$url = 'https://www.tingdiamond.com/';

	$translations = [
				['language' => 'en', 'url' => $url. 'en'],
				['language' => 'zh-Hant', 'url' => $url. 'hk'],
				['language' => 'zh-Hans', 'url' => $url. 'cn'],
			];


	$this->sitemapIndex('diamonds',$translations,$url,'/gia-loose-diamonds/','id',
						0.5,'monthly','diamonds');

	$combinedSitemap->addSitemap( $url . 'vendor/sitemap/diamonds/sitemap.xml');

	$combinedSitemap->store('sitemapindex', 'sitemap_index');


	return redirect('sitemap_index.xml');

		// // get all diamonds from db (or wherever you store them)
		// $diamonds = DB::table('diamonds')->whereAvailable(1)->orderBy('created_at', 'desc')
		// 	->chunk(1000,function($diamonds) use (&$sitemap,$translations,$url){

		// 		// $counter = cache()->get('sitemap.counter');
		// 		$sitemapCounter = cache()->get('sitemap.sitemapCounter');
		// 			// add every product to multiple sitemaps with one sitemap index
		// 			foreach ($diamonds as $p) {

		// 				foreach ($translations as $trans) {

		// 					$sitemap->add($trans['url'] . '/gia-loose-diamonds/' . $p->id, $p->updated_at, '0.5', 'monthly');

		// 				}

		// 				// count number of elements
		// 					// dd($sitemap);
		// 			}
				
		// 		// dd($sitemap->model->getItems());

		// 		// dd($sitemap);
		// 		$sitemap->store('xml', 'vendor/sitemap/diamonds/sitemap-' . $sitemapCounter);
		// 		// add the file to the sitemaps array
		// 		$sitemap->addSitemap($url .'vendor/sitemap/diamonds/sitemap-' . $sitemapCounter . '.xml');
		// 		// reset items array (clear memory)
		// 		$sitemap->model->resetItems();
		// 		// reset the counter
		// 		// $counter = 0;
		// 		// count generated sitemap

		// 		cache()->put('sitemap.sitemapCounter', $sitemapCounter + 1);


		// });


		// $sitemap->store('sitemapindex', 'vendor/sitemap/diamonds/sitemap');

	




	} 

	public function sitemapIndex($table,$translations,$url,$segmentUrl,$queryType,$priority,$updateFrequency,$filename){

	$sitemap = app()->make('sitemap');

	cache()->put('sitemap.sitemapCounter', 0);

	// get all diamonds from db (or wherever you store them)
		$query = DB::table($table);
		$this->{$table}($query);

		$query = $query->orderBy('created_at', 'desc')
			->chunk(1000,function($query) use (&$sitemap,$translations,$url,$segmentUrl,$queryType,$priority,$updateFrequency,$filename){

				// $counter = cache()->get('sitemap.counter');
				$sitemapCounter = cache()->get('sitemap.sitemapCounter');
					// add every product to multiple sitemaps with one sitemap index
					foreach ($query as $q) {

						foreach ($translations as $trans) {

							$sitemap->add($trans['url'] . $segmentUrl . $q->{$queryType}, $q->updated_at, $priority, $updateFrequency);

						}

						// count number of elements
							// dd($sitemap);
					}
				
				// dd($sitemap->model->getItems());

				// dd($sitemap);
				$sitemap->store('xml', 'vendor/sitemap/' . $filename .'/sitemap-' . $sitemapCounter);
				// add the file to the sitemaps array
				$sitemap->addSitemap($url .'vendor/sitemap/' . $filename .'/sitemap-' . $sitemapCounter . '.xml');
				// reset items array (clear memory)
				$sitemap->model->resetItems();
				// reset the counter
				// $counter = 0;
				// count generated sitemap

				cache()->put('sitemap.sitemapCounter', $sitemapCounter + 1);


		});


		$sitemap->store('sitemapindex', 'vendor/sitemap/' . $filename .'/sitemap');


		
	}

	public function diamonds($query){

		$query->whereAvailable(1);
		
	}


}



