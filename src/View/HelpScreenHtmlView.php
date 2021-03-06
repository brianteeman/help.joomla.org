<?php
/**
 * Joomla! Help Site
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 *
 * Portions of this code are derived from the previous help screen proxy component,
 * please see https://github.com/joomla-projects/help-proxy for attribution
 */

namespace Joomla\Help\View;

use Joomla\Help\Model\HelpScreenModel;
use Joomla\Renderer\RendererInterface;
use Joomla\View\HtmlView;

/**
 * View to render Joomla! help screens
 */
class HelpScreenHtmlView extends HtmlView
{
	/**
	 * The model object.
	 *
	 * @var  HelpScreenModel
	 */
	protected $model;

	/**
	 * Instantiate the view.
	 *
	 * @param   HelpScreenModel    $model     The model object.
	 * @param   RendererInterface  $renderer  The renderer object.
	 */
	public function __construct(HelpScreenModel $model, RendererInterface $renderer)
	{
		parent::__construct($renderer);

		$this->model = $model;
	}

	/**
	 * Get the view's model
	 *
	 * @return  HelpScreenModel
	 */
	public function getModel() : HelpScreenModel
	{
		return $this->model;
	}

	/**
	 * Method to render the view.
	 *
	 * @return  string  The rendered view.
	 */
	public function render() : string
	{
		$this->setData(
			[
				'page'      => $this->getModel()->getPage(),
				'page_name' => $this->getModel()->getPageUrlSlug(),
				'title'     => $this->getModel()->getTitle(),
				'wiki_url'  => $this->getModel()->getWikiUrl(),
			]
		);

		return parent::render();
	}
}
