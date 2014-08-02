<?php
/**
 * Joomla! 2.5 - Erweiterungen programmieren
 *
 * Helperklasse für die Komponente SrmInkasso
 *
 * @package    MyThings
 * @subpackage Backend
 * @author     Hp. Salvisberg
 * @license    GNU/GPL
 */
defined('_JEXEC') or die;

class SrmInkassoHelper {

    /**
     * In der Listenansicht im Contenberich ein Submenü aufbauen
     * Damit ist ein Wechsel zwischen Kategorien und Things möglich.
     *
     * @param type $name
     */
    public static function addSubmenu($name) {

        /* Tab "SrmInkasso" */
        JSubMenuHelper::addEntry(
            JText::_('Leistungen'),
            'index.php?option=com_srminkasso&view=activities', $name == 'activities'
        );

        /* Tab "SrmInkasso" */
        JSubMenuHelper::addEntry(
            JText::_('Rechnungsempfänger'),
            'index.php?option=com_srminkasso&view=users', $name == 'users'
        );

        /* Tab "SrmInkasso" */
        JSubMenuHelper::addEntry(
            JText::_('Leistungspositionen'),
            'index.php?option=com_srminkasso&view=positions', $name == 'positions'
        );

        /* Tab "SrmInkasso" */
        JSubMenuHelper::addEntry(
            JText::_('Fakturierungsläufe'),
            'index.php?option=com_srminkasso&view=billruns', $name == 'billruns'
        );

        /* Tab "SrmInkasso" */
        JSubMenuHelper::addEntry(
            JText::_('Rechnungen'),
            'index.php?option=com_srminkasso&view=bills', $name == 'bills'
        );

        /* Tab "SrmInkasso" */
        JSubMenuHelper::addEntry(
        	JText::_('Leistungsarten'),
        	'index.php?option=com_srminkasso&view=leistungsarts', $name == 'leistungsarts'
        );
        
        /* Tab "SrmInkasso" */
        JSubMenuHelper::addEntry(
        JText::_('Templates'),
        'index.php?option=com_srminkasso&view=templates', $name == 'templates'
        		);

        /* Tab "SrmInkasso" */
        JSubMenuHelper::addEntry(
            JText::_('Info'),
            'index.php?option=com_srminkasso&view=info', $name == 'info'
        );
        
    }

    /**
     * Prueft, ob fuer der aktuelle Nutzer fuer eine in access.xml definierte Funktion die Berechtigung hat.
     * @param $action
     * @return mixed
     */
    public static function canDo($action){

        $canDo = JFactory::getUser()->authorise($action, 'com_srminkasso');
        return $canDo;
    }

}
