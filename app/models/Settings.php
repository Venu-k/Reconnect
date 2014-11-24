<?php

class Settings extends \Eloquent {
	protected $fillable = [];
	protected $table = 'settings';
	public $timestamps = false;

	public static function Select(){

	}

	public static function GetSetting(){


	}

	public static function SelectDefaultSettingValue($setting){

		switch($setting){
	        case 'TDSPercentage':
	          return "10";
	          break;
	        case 'AdminChargesPercentage':
	          return "5";
	          break;
	        case 'AmountPerCUV':
	          return "1000";
	          break;
	        default:
	          return '';
	    }

	}

	public static function GetSettingDisplayValue(){

	}

	public static function SaveSetting(){

	}

	public static function CreateSetting(){

	}

	public static function DeleteSetting(){

	}

	public static function SaveSetting(){

	}

}