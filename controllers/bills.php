<?php
/**
 * Joomla! 2.5 - Erweiterungen programmieren
 *
 * Controller für die Listenansicht mythings
 *
 *@package    SrmInkasso
* @subpackage Backend
* @author     Hp. Salvisberg
* @license    GNU/GPL
 */
defined('_JEXEC') or die;
jimport('joomla.application.component.controlleradmin');

/**
 * Erweiterung der Klasse JControllerForm
 */
class SrmInkassoControllerBills extends JControllerAdmin
{
  /**
   * Verbindung zu MyThingsModelMyThing, damit die dort
   * enthaltenen Methoden zum Lesen von Datensaetzen
   * verwendet werden koennen.
   *
   * @return MyThingsModelMyThings Das Model fuer die Listenansicht
   */
  public function getModel($name = 'Bill', $prefix = 'SrmInkassoModel', $config = array())
  {
    // Model nicht automatisch mit Inhalten aus dem Request befuellen
    $config['ignore_request'] = true;

    // restliche Arbeit der Elternklasse ueberlassen
    return parent::getModel($name, $prefix, $config);
  }

    /**
     * Setzt den Rechnungsstatus von offen auf bezahlt
     */
    public function changeStateToPaid(){
        $cid = JRequest::getVar('cid', array(), '', 'array');
        self::changeBillState($cid[0],5);
    }

    /**
     * Setzt den Rechnungsstatus von bezahlt auf offen zurueck
     */
    public function changeStateToOpen(){
        $cid = JRequest::getVar('cid', array(), '', 'array');
        self::changeBillState($cid[0],4);
    }

    public function changeBillState($userBillId,$newState){

        // Get the model.
        $model = $this->getModel();

        /** @var $tblBills SrmInkassoTableBills */
        $tblBills = $model->getTable();

        switch($newState){
            case 4:
                $tblBills->setUserFakturaStateToOpen($userBillId);
                break;
            case 5:
                $tblBills->setUserFakturaStateToBezahlt($userBillId);
                break;
        }

        //Meldungstext basteln
        $arr = array(
            4 => "offen",
            5 => "bezahlt",
        );

        $msg = 'Rechnung ' . $userBillId . ' - neuer Status: ' . $arr[$newState];

        self::redirectToList($msg);
    }

    function redirectToList($msg){
        $this->setMessage($msg);
        $strRedirect = 'index.php?option=' . $this->option . '&view=' . $this->view_list;
        $this->setRedirect(JRoute::_($strRedirect, false));
    }
}
