<?php

use Carbon\Carbon;

    $combinedSitemap = App::make('sitemap');

	$translations = [
			['language' => 'en', 'url' => url()->to('/en/')],
			['language' => 'zh-Hant', 'url' => url()->to('/hk/')],
			['language' => 'zh-Hans', 'url' => url()->to('/cn/')],
		];

	$combinedSitemap->addSitemap( $url . 'vendor/sitemap/pages/sitemap.xml');

	$combinedSitemap->addSitemap( $url . 'vendor/sitemap/engagement-rings/sitemap.xml');

	$combinedSitemap->addSitemap( $url . 'vendor/sitemap/engagement-rings/sitemap.xml');

	$combinedSitemap->addSitemap( $url . 'vendor/sitemap/wedding-rings/sitemap.xml');

	$combinedSitemap->addSitemap( $url . 'vendor/sitemap/jewelleries/sitemap.xml');

	$combinedSitemap->addSitemap( $url . 'vendor/sitemap/customer-posts/sitemap.xml');

	$combinedSitemap->addSitemap( $url . 'vendor/sitemap/diamonds/sitemap.xml');


	return $sitemap->render('xml');








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

