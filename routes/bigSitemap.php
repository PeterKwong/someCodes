<?php

// use Illuminate\Support\Facades\Cache;
// create new sitemap object
$sitemap = App::make('sitemap');


// dd($diamonds);
// counters
$counter = 0;
$sitemapCounter = 0;

// Cache::put('sitemap.diamonds', 0);
// $cachedDiamond = Cache::get('sitemap.diamonds');

// dd(Cache::get('sitemap.diamonds'));

$translations = [
		['language' => 'en', 'url' => URL::to('/en/')],
		['language' => 'zh-Hant', 'url' => URL::to('/hk/')],
		['language' => 'zh-Hans', 'url' => URL::to('/cn/')],
	];


// get all diamonds from db (or wherever you store them)
$diamonds = DB::table('diamonds')->orderBy('created_at', 'desc')
		->chunk(1000,function($diamonds) use (&$counter,$sitemap,$translations){

			// add every product to multiple sitemaps with one sitemap index
			foreach ($diamonds as $p) {
				if ($counter == 1000) {
					// generate new sitemap file
					$sitemap->store('xml', 'big-sitemap/diamonds/sitemap-' . $sitemapCounter);
					// add the file to the sitemaps array
					$sitemap->addSitemap(secure_url('big-sitemap/diamonds/sitemap-' . $sitemapCounter . '.xml'));
					// reset items array (clear memory)
					$sitemap->model->resetItems();
					// reset the counter
					$counter = 0;
					// count generated sitemap
					$sitemapCounter++;
				}
							// dd($sitemap);

				// add product to items array
				foreach ($translations as $trans) {

					$sitemap->add($trans['url'] . '/gia-loose-diamonds/' . $p->id, $p->updated_at, '0.5', 'monthly');
					$counter++;

				}

				// count number of elements
					// dd($sitemap);
			}
			
			// dd($sitemap->model->getItems());


		});


// you need to check for unused items
if (!empty($sitemap->model->getItems())) {
	// generate sitemap with last items
	$sitemap->store('xml', 'big-sitemap/diamonds/sitemap-' . $sitemapCounter);
	// add sitemap to sitemaps array
	$sitemap->addSitemap(secure_url('big-sitemap/diamonds/sitemap-' . $sitemapCounter . '.xml'));
	// reset items array
	$sitemap->model->resetItems();
}
dd($sitemap);

// generate new sitemapindex that will contain all generated sitemaps above

$sitemap->store('sitemapindex', 'big-sitemap/diamonds/sitemap');

return redirect('big-sitemap/diamonds/sitemap.xml');
