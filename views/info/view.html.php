<?php
/**
 * Joomla! 2.5 - Erweiterungen programmieren
 *
 * View Mything - Formularansicht zur Bearbeitung eines Items
 * @package    MyThings
 * @subpackage Backend
 * @author     chmst.de, webmechanic.biz
 * @license	  GNU/GPL
 */
defined('_JEXEC') or die;
jimport('joomla.application.component.view');


/* Erweitern der Basisklasse JView */
class SrmInkassoViewInfo extends JView
{
    /**
     * Überschreiben der Methode display
     *
     * @param string $tpl Alternative Layoutdatei, leer = 'default'
     */
    function display($tpl = null)
    {

        /* Aufnbau der Toolbar */
        $this->addToolbar();

        /* View ausgeben - zurueckdelegiert an die Elternklasse */
        parent::display($tpl);
    }

    /**
     * Aufbau der Toolbar, es werden nur die Buttons eingefügt,
     * fuer die der Benutzer eine Berechtigung hat.
     */
    protected function addToolbar()
    {
        /* Links oben der Titel */
        JToolBarHelper::title(JText::_('Infos zum Leistungsverrechnungsmodul'));

        if (SrmInkassoHelper::canDo('core.admin'))
        {
            JToolBarHelper::preferences('com_srminkasso');
        }
    }

}
