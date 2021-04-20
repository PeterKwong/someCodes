<?php

use Carbon\Carbon;

    $sitemap = App::make('sitemap');

	$sitemap->setCache('tingdiamond.sitemap', 10);


	$translations = [
			['language' => 'en', 'url' => url()->to('/en/')],
			['language' => 'zh-Hant', 'url' => url()->to('/hk/')],
			['language' => 'zh-Hans', 'url' => url()->to('/cn/')],
		];


	cache()->put('sitemap.sitemapCounter', 0);


	$pages = DB::table('pages')->orderBy('created_at', 'desc')
		->chunk(1000,function($pages) use (&$sitemap,$translations){

			// $counter = cache()->get('sitemap.counter');
			$sitemapCounter = cache()->get('sitemap.sitemapCounter');
				// add every product to multiple sitemaps with one sitemap index
				foreach ($pages as $p) {

					foreach ($translations as $trans) {

						$sitemap->add($trans['url'] . '/' . $p->url, now(), '0.9', 'daily');

					}

					// count number of elements
						// dd($sitemap);
				}
			
			// dd($sitemap->model->getItems());

			// dd($sitemap);
			$sitemap->store('xml', 'vendor/sitemap/pages/sitemap-' . $sitemapCounter);
			// add the file to the sitemaps array
			$sitemap->addSitemap(secure_url('vendor/sitemap/pages/sitemap-' . $sitemapCounter . '.xml'));
			// reset items array (clear memory)
			$sitemap->model->resetItems();
			// reset the counter
			// $counter = 0;
			// count generated sitemap

			cache()->put('sitemap.sitemapCounter', $sitemapCounter + 1);


	});

	cache()->put('sitemap.sitemapCounter', 0);


	$engagementRings = DB::table('engagement_rings')->where('published',1)->orderBy('created_at', 'desc')
		->chunk(1000,function($engagementRings) use (&$sitemap,$translations){

			// $counter = cache()->get('sitemap.counter');
			$sitemapCounter = cache()->get('sitemap.sitemapCounter');
				// add every product to multiple sitemaps with one sitemap index
				foreach ($engagementRings as $p) {

					foreach ($translations as $trans) {

						$sitemap->add($trans['url'] . '/engagement-rings/' . $p->id, now(), '0.8', 'daily');

					}

					// count number of elements
						// dd($sitemap);
				}
			
			// dd($sitemap->model->getItems());

			// dd($sitemap);
			$sitemap->store('xml', 'vendor/sitemap/engagement-rings/sitemap-' . $sitemapCounter);
			// add the file to the sitemaps array
			$sitemap->addSitemap(secure_url('vendor/sitemap/engagement-rings/sitemap-' . $sitemapCounter . '.xml'));
			// reset items array (clear memory)
			$sitemap->model->resetItems();
			// reset the counter
			// $counter = 0;
			// count generated sitemap

			cache()->put('sitemap.sitemapCounter', $sitemapCounter + 1);


	});

	cache()->put('sitemap.sitemapCounter', 0);

	$weddingRings = DB::table('wedding_rings')->where('published',1)->orderBy('created_at', 'desc')
		->chunk(1000,function($weddingRings) use (&$sitemap,$translations){

			// $counter = cache()->get('sitemap.counter');
			$sitemapCounter = cache()->get('sitemap.sitemapCounter');
				// add every product to multiple sitemaps with one sitemap index
				foreach ($weddingRings as $p) {

					foreach ($translations as $trans) {

						$sitemap->add($trans['url'] . '/wedding-rings/' . $p->id, now(), '0.8', 'daily');

					}

					// count number of elements
						// dd($sitemap);
				}
			
			// dd($sitemap->model->getItems());

			// dd($sitemap);
			$sitemap->store('xml', 'vendor/sitemap/wedding-rings/sitemap-' . $sitemapCounter);
			// add the file to the sitemaps array
			$sitemap->addSitemap(secure_url('vendor/sitemap/wedding-rings/sitemap-' . $sitemapCounter . '.xml'));
			// reset items array (clear memory)
			$sitemap->model->resetItems();
			// reset the counter
			// $counter = 0;
			// count generated sitemap

			cache()->put('sitemap.sitemapCounter', $sitemapCounter + 1);


	});

	cache()->put('sitemap.sitemapCounter', 0);


	$jewelleries = DB::table('jewelleries')->where('published',1)->orderBy('created_at', 'desc')
		->chunk(1000,function($jewelleries) use (&$sitemap,$translations){

			// $counter = cache()->get('sitemap.counter');
			$sitemapCounter = cache()->get('sitemap.sitemapCounter');
				// add every product to multiple sitemaps with one sitemap index
				foreach ($jewelleries as $p) {

					foreach ($translations as $trans) {

						$sitemap->add($trans['url'] . '/jewelleries/' . $p->id, now(), '0.8', 'daily');

					}

					// count number of elements
						// dd($sitemap);
				}
			
			// dd($sitemap->model->getItems());

			// dd($sitemap);
			$sitemap->store('xml', 'vendor/sitemap/jewelleries/sitemap-' . $sitemapCounter);
			// add the file to the sitemaps array
			$sitemap->addSitemap(secure_url('vendor/sitemap/jewelleries/sitemap-' . $sitemapCounter . '.xml'));
			// reset items array (clear memory)
			$sitemap->model->resetItems();
			// reset the counter
			// $counter = 0;
			// count generated sitemap

			cache()->put('sitemap.sitemapCounter', $sitemapCounter + 1);


	});

	cache()->put('sitemap.sitemapCounter', 0);

	$customerPosts = DB::table('invoice_posts')->where('published',1)->orderBy('created_at', 'desc')
		->chunk(1000,function($customerPosts) use (&$sitemap,$translations){

			// $counter = cache()->get('sitemap.counter');
			$sitemapCounter = cache()->get('sitemap.sitemapCounter');
				// add every product to multiple sitemaps with one sitemap index
				foreach ($customerPosts as $p) {

					foreach ($translations as $trans) {

						$sitemap->add($trans['url'] . '/customer-posts/' . $p->id, now(), '0.8', 'daily');

					}

					// count number of elements
						// dd($sitemap);
				}
			
			// dd($sitemap->model->getItems());

			// dd($sitemap);
			$sitemap->store('xml', 'vendor/sitemap/customer-posts/sitemap-' . $sitemapCounter);
			// add the file to the sitemaps array
			$sitemap->addSitemap(secure_url('vendor/sitemap/customer-posts/sitemap-' . $sitemapCounter . '.xml'));
			// reset items array (clear memory)
			$sitemap->model->resetItems();
			// reset the counter
			// $counter = 0;
			// count generated sitemap

			cache()->put('sitemap.sitemapCounter', $sitemapCounter + 1);


	});

	cache()->put('sitemap.sitemapCounter', 0);


	
	$sitemap->addSitemap(secure_url('vendor/sitemap/diamonds/sitemap.xml'));

	$sitemap->store('sitemapindex', 'sitemap_index');


	return redirect('sitemap_index.xml');








	// $sitemap->setCache('tingdiamond.sitemap', 10);

	// 	$sitemap->add(secure_url('/'), Carbon::now(), '1.0', 'daily');
	// 	$sitemap->add(secure_url('/hk'), Carbon::now(), '1.0', 'daily');
	// 	$sitemap->add(secure_url('/en'), Carbon::now(), '1.0', 'daily');
	// 	$sitemap->add(secure_url('/cn'), Carbon::now(), '1.0', 'daily');
		



	// 	$translations = [
	// 		['language' => 'en-us', 'url' => secure_url('/en/'), ],
	// 		['language' => 'zh-Hant', 'url' => secure_url('/hk/')],
	// 		['language' => 'zh-Hans', 'url' => secure_url('/cn/')],
	// 	];

	// 	$pages = DB::table('pages')
 //                ->orderBy('updated_at','desc')
 //                    ->get();

 //        if ($pages != '') {
 //        	foreach ($translations as $translation ) {

	// 			foreach ($pages as $page ) {
	// 			$sitemap->add(secure_url($translation['url'] .'/'. $page->url), now(), '0.9', 'daily', [], null, $translations);
	// 			}
	// 		}

 //        }
		

	// 	$engagementRings = DB::table('engagement_rings')
 //                ->orderBy('updated_at','desc')->where('published',1)
 //                    ->get(['id','updated_at']);

 //        if ($engagementRings != '') {
	// 		foreach ($translations as $translation ) {

	// 			foreach ($engagementRings as $engagementRing ) {
	// 			$sitemap->add(secure_url($translation['url'] .'/engagement-rings/'. $engagementRing->id),  now(), '0.8', 'daily', [], null, $translations);
	// 			}
	// 		}
	// 	}

	// 	$jewelleries = DB::table('jewelleries')
 //                ->orderBy('updated_at','desc')->where('published',1)
 //                    ->get(['id','updated_at']);

 //        if ($jewelleries != '') {
	// 		foreach ($translations as $translation ) {

	// 			foreach ($jewelleries as $jewellery ) {
	// 			$sitemap->add(secure_url($translation['url'] .'/jewellery/'. $jewellery->id),  now(), '0.8', 'daily', [], null, $translations);
	// 			}
	// 		}
	// 	}

	// 	$weddingRings = DB::table('wedding_ring_pairs')
 //                ->orderBy('updated_at','desc')->where('published',1)
 //                    ->get(['id','updated_at']);

	// 	foreach ($translations as $translation ) {

	// 		foreach ($weddingRings as $weddingRing ) {
	// 		$sitemap->add(secure_url($translation['url'] .'/wedding-rings/'. $weddingRing->id),  now(), '0.8', 'daily', [], null, $translations);
	// 		}
	// 	}
		
	// 	$invPosts = DB::table('invoice_posts')
 //                ->orderBy('updated_at','desc')->where('published',1)
 //                    ->get(['id','updated_at']);

	// 	foreach ($translations as $translation ) {

	// 		foreach ($invPosts as $invPost ) {
	// 		$sitemap->add(secure_url($translation['url'] .'/customer-jewellery/'. $invPost->id),  now(), '0.7', 'daily', [], null, $translations);
	// 		}
	// 	}
		
	// 	$sitemap->add(secure_url('vendor/sitemap/diamonds/sitemap.xml'), Carbon::now(), '1.0', 'daily');



	return $sitemap->render('xml');

