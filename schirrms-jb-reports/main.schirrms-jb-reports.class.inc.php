<?php

// Use the same namespace as the report generator
namespace jb_itop_extensions\report_generator;

// iTop internals
use \DBObjectSet;
use \Dict;

/**
 * Class ReportUIElement_UserRequest_Details. Enables a "Show PDF" button in iTop's GUI.
 */
abstract class ReportUIElement_UserRequest_Details extends AbstractReportUIElement {
		
	/**
	 * Title of the menu item or button
	 *
	 * @param \DBObjectSet $oSet_Objects DBObjectSet of iTop objects which are being processed
	 * @param \String $sView View: 'details' or 'list'
	 *
	 * @return \String
	 *
	 * @details Hint: you can use Dict::S('...')
	 *
	 */
	public static function GetTitle(DBObjectSet $oSet_Objects, $sView) {
	
		return Dict::S('UI:Report:Show');
		
	}
	
	/**
	 * URL Parameters. Often 'template' or additional parameters for extended iReportProcessor implementations.
	 *
	 * @param \DBObjectSet $oSet_Objects DBObjectSet of iTop objects which are being processed
	 * @param \String $sView View: 'details' or 'list'
	 *
	 * @return \Array
	 */
	public static function GetURLParameters(DBObjectSet $oSet_Objects, $sView) {
	
		return [
			'type' => $sView,
			'template' => 'basic_details.html',
			// Some actions which are supported by default (if no 'action' key is specified, 
			// it will just render a HTML template).
			// They include show_pdf (renders in browser unless browser is configured to download the file), 
			// download_pdf, attach_pdf (adds as attachment to the iTop object)
			// 'action' => 'show_pdf',
			'action' => 'show_pdf',
			'reportdir' => 'schirrms-jb-reports'
		];
		
	}
	
	
	/**
	 * Whether or not this UI element is applicable
	 *
	 * @param \DBObjectSet $oSet_Objects DBObjectSet of iTop objects which are being processed
	 * @param \String $sView View: 'details' or 'list'
	 *
	 * @return \Boolean
	 *
	 */
	public static function IsApplicable(DBObjectSet $oSet_Objects, $sView) {
	
		return ($sView == 'details' && $oSet_Objects->GetClass() == 'VirtualMachine');
		
	}
	
}