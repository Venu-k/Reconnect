<?php
Class Enums {
	public static function displayClass($class) {
		if($class === 'Full Time')
		{
			echo 'fullTime';
		}
		elseif($class === 'Part Time')
		{
			echo 'partTime';
		}
		elseif($class === 'One Time')
		{
			echo 'oneTime';
		}
	}
}