<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SafeURL {
	public function seo($s) {
	 $tr = array('ş','á','ñ','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
	 $eng = array('s','a','n','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
	 $s = str_replace($tr,$eng,$s);
	 $s = strtolower($s);
	 $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
	 $s = preg_replace('/\s+/', '-', $s);
	 $s = preg_replace('|-+|', '-', $s);
	 $s = preg_replace('/#/', '', $s);
	 $s = str_replace('.', '', $s);
	 $s = trim($s, '-');
	 return $s;
	}
}
