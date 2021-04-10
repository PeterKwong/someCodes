<?php

namespace App\Http\Support\Sitemap;
/**
 * 
 */
use DB;
use cache;

class DiamondSitemap 
{

	public function create(){
		

	$sitemap = app()->make('sitemap');

	// $url = 'https://www.tingdiamond.com/';

	cache()->put('sitemap.sitemapCounter', 0);

	$translations = [
				['language' => 'en', 'url' => url()->to('en')],
				['language' => 'zh-Hant', 'url' => url()->to('hk')],
				['language' => 'zh-Hans', 'url' => url()->to('cn')],
			];


		// get all diamonds from db (or wherever you store them)
		$diamonds = DB::table('diamonds')->whereAvailable(1)->orderBy('created_at', 'desc')
			->chunk(1000,function($diamonds) use (&$sitemap,$translations,$url){

				// $counter = cache()->get('sitemap.counter');
				$sitemapCounter = cache()->get('sitemap.sitemapCounter');
					// add every product to multiple sitemaps with one sitemap index
					foreach ($diamonds as $p) {

						foreach ($translations as $trans) {

							$sitemap->add($trans['url'] . '/gia-loose-diamonds/' . $p->id, $p->updated_at, '0.5', 'monthly');

						}

						// count number of elements
							// dd($sitemap);
					}
				
				// dd($sitemap->model->getItems());

				// dd($sitemap);
				$sitemap->store('xml', 'vendor/sitemap/big-sitemap/diamonds/sitemap-' . $sitemapCounter);
				// add the file to the sitemaps array
				$sitemap->addSitemap(url()->to('/vendor/sitemap/big-sitemap/diamonds/sitemap-' . $sitemapCounter . '.xml'));
				// reset items array (clear memory)
				$sitemap->model->resetItems();
				// reset the counter
				// $counter = 0;
				// count generated sitemap

				cache()->put('sitemap.sitemapCounter', $sitemapCounter + 1);


		});


		// generate new sitemapindex that will contain all generated sitemaps above

		$sitemap->store('sitemapindex', 'vendor/sitemap/big-sitemap/diamonds/sitemap');

		return 'done';
	} 


}



