<?php

// use Illuminate\Support\Facades\Cache;
// create new sitemap object
$sitemap = App::make('sitemap');


// dd($diamonds);
// counters
// $counter = 0;
// $sitemapCounter = 0;

// Cache::put('sitemap.counter', 0);
Cache::put('sitemap.sitemapCounter', 0);
// $cachedDiamond = Cache::get('sitemap.counter');

// dd(Cache::get('sitemap.counter'));

$translations = [
		['language' => 'en', 'url' => URL::to('/en/')],
		['language' => 'zh-Hant', 'url' => URL::to('/hk/')],
		['language' => 'zh-Hans', 'url' => URL::to('/cn/')],
	];


// get all diamonds from db (or wherever you store them)
$diamonds = DB::table('diamonds')->whereAvailable(1)->orderBy('created_at', 'desc')
	->chunk(1000,function($diamonds) use (&$sitemap,$translations){

		// $counter = Cache::get('sitemap.counter');
		$sitemapCounter = Cache::get('sitemap.sitemapCounter');
			// add every product to multiple sitemaps with one sitemap index
			foreach ($diamonds as $p) {

				foreach ($translations as $trans) {

					$sitemap->add($trans['url'] . '/gia-loose-diamonds/' . $p->id, $p->updated_at.$sitemapCounter, '0.5', 'monthly');

				}

				// count number of elements
					// dd($sitemap);
			}
		
		// dd($sitemap->model->getItems());

		// dd($sitemap);
		$sitemap->store('xml', 'vendor/sitemap/big-sitemap/diamonds/sitemap-' . $sitemapCounter);
		// add the file to the sitemaps array
		$sitemap->addSitemap(secure_url('vendor/sitemap/big-sitemap/diamonds/sitemap-' . $sitemapCounter . '.xml'));
		// reset items array (clear memory)
		$sitemap->model->resetItems();
		// reset the counter
		// $counter = 0;
		// count generated sitemap

		Cache::put('sitemap.sitemapCounter', $sitemapCounter + 1);


});


// generate new sitemapindex that will contain all generated sitemaps above

$sitemap->store('sitemapindex', 'vendor/sitemap/big-sitemap/diamonds/sitemap');


return redirect('vendor/sitemap/big-sitemap/diamonds/sitemap.xml');
