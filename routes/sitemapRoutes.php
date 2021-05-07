<?php

use Carbon\Carbon;

    $sitemap = App::make('sitemap');

    
	// set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
	// by default cache is disabled
	$sitemap->setCache('tingdiamond.sitemap', 36000);

	// check if there is cached sitemap and build new only if is not

	// if (!$sitemap->isCached()) {
	
		// add item to the sitemap (url, date, priority, freq)
		$sitemap->add(secure_url('/'), Carbon::now(), '1.0', 'daily');
		$sitemap->add(secure_url('/hk'), Carbon::now(), '1.0', 'daily');
		$sitemap->add(secure_url('/en'), Carbon::now(), '1.0', 'daily');
		$sitemap->add(secure_url('/cn'), Carbon::now(), '1.0', 'daily');
		

		// $sitemap->add(secure_url('/diamonds.xml'), Carbon::now(), '1.0', 'daily');


		$translations = [
			['language' => 'en', 'url' => secure_url('/en/'), ],
			['language' => 'zh-Hant', 'url' => secure_url('/hk/')],
			['language' => 'zh-Hans', 'url' => secure_url('/cn/')],
		];

		$pages = DB::table('pages')
                ->orderBy('updated_at','desc')
                    ->get();

        if ($pages != '') {
        	foreach ($translations as $translation ) {

				foreach ($pages as $page ) {
				$sitemap->add(secure_url($translation['url'] .'/'. $page->url), $page->updated_at, '0.9', 'daily', [], null, $translations);
				}
			}

        }


		$engagementRings = DB::table('engagement_rings')
                ->orderBy('updated_at','desc')->where('published',1)
                    ->get(['id','updated_at']);

        if ($engagementRings != '') {
			foreach ($translations as $translation ) {

				foreach ($engagementRings as $engagementRing ) {
				$sitemap->add(secure_url($translation['url'] .'/engagement-rings/'. $engagementRing->id),  $engagementRing->updated_at, '0.8', 'daily', [], null, $translations);
				}
			}
		}

		$jewelleries = DB::table('jewelleries')
                ->orderBy('updated_at','desc')->where('published',1)
                    ->get(['id','updated_at']);

        if ($jewelleries != '') {
			foreach ($translations as $translation ) {

				foreach ($jewelleries as $jewellery ) {
				$sitemap->add(secure_url($translation['url'] .'/jewellery/'. $jewellery->id),  $jewellery->updated_at, '0.8', 'daily', [], null, $translations);
				}
			}
		}

		$weddingRings = DB::table('wedding_ring_pairs')
                ->orderBy('updated_at','desc')->where('published',1)
                    ->get(['id','updated_at']);

		foreach ($translations as $translation ) {

			foreach ($weddingRings as $weddingRing ) {
			$sitemap->add(secure_url($translation['url'] .'/wedding-rings/'. $weddingRing->id), $weddingRing->updated_at, '0.8', 'daily', [], null, $translations);
			}
		}
		
		$invPosts = DB::table('invoice_posts')
                ->orderBy('updated_at','desc')->where('published',1)
                    ->get(['id','updated_at']);

		foreach ($translations as $translation ) {

			foreach ($invPosts as $invPost ) {
			$sitemap->add(secure_url($translation['url'] .'/customer-jewellery/'. $invPost->id),  $invPost->updated_at, '0.7', 'daily', [], null, $translations);
			}
		}

		$diamonds = DB::table('diamonds')
                ->orderBy('updated_at','desc')->take(3000)->get();
                // dd($diamonds->chunk(1000));
        // $diamonds = $diamonds->chunk(1000, function($diamonds)use($translations,$sitemap){
								// dd($diamonds);
		foreach ($translations as $translation ) {
			foreach ($diamonds as $diamond ) {
			$sitemap->add(secure_url($translation['url'] .'/gia-loose-diamonds/'. $diamond->id), $diamond->updated_at, '0.6', 'weekly', [], null, $translations);
			}
		}
                    // });

		// $sitemap->add(secure_url('/diamonds-sitemap'), Carbon::now(), '1.0', 'daily');


	// }

	// show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')

	return $sitemap->render('xml');

