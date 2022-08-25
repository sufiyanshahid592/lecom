<?php 
use Illuminate\Support\Facades\DB;

$website_setting = DB::table("setting")->where("setting_id", 1)->get();

return $website_title = $website_setting[0]->website_title;

?>