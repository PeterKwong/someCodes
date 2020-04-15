<?php

	// create new sitemap object
	$sitemap = App::make('sitemap');

	// get all diamonds from db (or wherever you store them)
	$diamonds = DB::table('diamonds')->orderBy('created_at', 'desc')->get();

	// dd($diamonds);
	// counters
	$counter = 0;
	$sitemapCounter = 0;

	$translations = [
			['language' => 'en', 'url' => URL::to('/en/')],
			['language' => 'zh-Hant', 'url' => URL::to('/hk/')],
			['language' => 'zh-Hans', 'url' => URL::to('/cn/')],
		];

	// add every product to multiple sitemaps with one sitemap index
	foreach ($diamonds as $p) {
		if ($counter == 2000) {
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

		// add product to items array
		foreach ($translations as $trans) {

			$sitemap->add($trans['url'] . '/gia-loose-diamonds/' . $p->id, $p->updated_at, '0.5', 'monthly');
			$counter++;

		}

		// count number of elements
			// dd($sitemap);

	}

	// you need to check for unused items
	if (!empty($sitemap->model->getItems())) {
		// generate sitemap with last items
		$sitemap->store('xml', 'big-sitemap/diamonds/sitemap-' . $sitemapCounter);
		// add sitemap to sitemaps array
		$sitemap->addSitemap(secure_url('big-sitemap/diamonds/sitemap-' . $sitemapCounter . '.xml'));
		// reset items array
		$sitemap->model->resetItems();
	}

	// generate new sitemapindex that will contain all generated sitemaps above

	$sitemap->store('sitemapindex', 'big-sitemap/diamonds/sitemap');

	// dd($sitemap);
	return redirect('big-sitemap/diamonds/sitemap.xml');

	return 	1;

