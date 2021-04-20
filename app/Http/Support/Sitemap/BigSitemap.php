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
		

	$sitemap = app()->make('sitemap');

	$url = config('global.company.info.url');

	$translations = [
				['language' => 'en', 'url' => $url. 'en'],
				['language' => 'zh-Hant', 'url' => $url. 'hk'],
				['language' => 'zh-Hans', 'url' => $url. 'cn'],
			];



	$this->sitemapIndex('pages',$translations,$url,'/','url',
						0.9,'daily','pages',$sitemap);
	// $sitemap->addSitemap( $url . 'vendor/sitemap/pages/sitemap.xml');


	$this->sitemapIndex('engagement_rings',$translations,$url,'/engagement-rings/','id',
						0.8,'daily','engagement-rings',$sitemap);
	// $sitemap->addSitemap( $url . 'vendor/sitemap/engagement-rings/sitemap.xml');

	$this->sitemapIndex('wedding_ring_pairs',$translations,$url,'/wedding-rings/','id',
						0.8,'daily','wedding-rings',$sitemap);
	// $sitemap->addSitemap( $url . 'vendor/sitemap/wedding-rings/sitemap.xml');

	$this->sitemapIndex('jewelleries',$translations,$url,'/jewelleries/','id',
						0.8,'daily','jewelleries',$sitemap);
	// $sitemap->addSitemap( $url . 'vendor/sitemap/jewelleries/sitemap.xml');

	$this->sitemapIndex('invoice_posts',$translations,$url,'/customer-posts/','id',
						0.8,'daily','customer-posts',$sitemap);
	// $sitemap->addSitemap( $url . 'vendor/sitemap/customer-posts/sitemap.xml');

	$this->sitemapIndex('diamonds',$translations,$url,'/gia-loose-diamonds/','id',
						0.5,'monthly','diamonds',$sitemap);
	// $sitemap->addSitemap( $url . 'vendor/sitemap/diamonds/sitemap.xml');


	$sitemap->store('sitemapindex', 'sitemap_index');


	return redirect('sitemap_index.xml');


	} 

	public function sitemapIndex($table,$translations,$url,$segmentUrl,$queryType,$priority,$updateFrequency,$filename,$sitemap){

		// $sitemap = app()->make('sitemap');

		cache()->put('sitemap.sitemapCounter', 0);

		// get all diamonds from db (or wherever you store them)
		$query = DB::table($table);
		$this->{'query'.ucfirst($table)}($query);

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


		// $sitemap->store('sitemapindex', 'vendor/sitemap/' . $filename .'/sitemap');


		
	}

	public function queryDiamonds($query){
		return $query->whereAvailable(1);
	}

	public function queryPages($query){
		return $query;
	}

	public function queryEngagement_rings($query){
		return $query->where('published',1);
	}

	public function queryWedding_ring_pairs($query){
		return $query->where('published',1);
	}

	public function queryJewelleries($query){
		return $query->where('published',1);
	}

	public function queryInvoice_posts($query){
		return $query->where('published',1);
	}
}



