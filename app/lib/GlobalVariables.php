<?php
setlocale(LC_MONETARY, 'en_IN');
Class GlobalVariables {
	public static function getStatus($status) {
		switch ($status) {	
			case 0:
				return 'New';
				break;
			case 1:
				return 'Approved';
				break;
			case 2:
				return 'Rejected';
				break;
			case 3:
				return 'Pending';
				break;
		}
	}

	public static function getAnnouncementStatus($status) {
		switch ($status) {				
			case 1:
				return 'Active';
				break;
			case 2:
				return 'Past';
				break;
			case 3:
				return 'Future';
				break;
		}
	}

	

	
}