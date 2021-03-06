<?php
/**
 * @package     CHPanel
 * @copyright	Copyright (C) CloudHotelier. All rights reserved.
 * @license		GNU GPLv2 <http://www.gnu.org/licenses/gpl.html>
 * @author		Xavier Pallicer <xpallicer@cloudhotelier.com>
 */
defined('_JEXEC') or die();

/**
 * Hotels View
 */
class CHPanelViewHotels extends JViewLegacy
{

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{

		// get the data from the model
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		$this->state = $this->get('State');

		// filters
		$this->filterForm = $this->get('FilterForm');
		$this->activeFilters = $this->get('ActiveFilters');

		// lists
		$this->lists = new stdClass();
		$this->lists->langs = CHPanelHelperLangs::getLangs();
		$this->lists->translations = CHPanelHelperLangs::getTranslations($this->items);

		// toolbar and sidbar
		if ($this->getLayout() !== 'modal')
		{
			CHPanelHelper::getToolbar('hotels', $this->state->get('filter.state') == -2);
			$this->sidebar = JHtmlSidebar::render();
		}

		// display the view layout
		parent::display($tpl);
	}

}
