<?php 
  
namespace ExtractPdf;
  
use Omeka\Module\AbstractModule;
use Omeka\Module\Manager as ModuleManager;
use Omeka\Module\Exception\ModuleCannotInstallException;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractController;
use Zend\Form\Fieldset;
use Zend\EventManager\Event;
use Zend\EventManager\SharedEventManagerInterface;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Text;
use Zend\Debug\Debug;
use Omeka\Mvc\Controller\Plugin\Logger;
//use Zend\Log\Logger;
use Zend\Log\Writer;
use Zend\View\Renderer\PhpRenderer;

class Module extends AbstractModule
{
    public function install(ServiceLocatorInterface $serviceLocator)
    {
        $logger = $serviceLocator->get('Omeka\Logger');
        // Don't install if the pdftotext command doesn't exist.
        // See: http://stackoverflow.com/questions/592620/check-if-a-program-exists-from-a-bash-script
        if ((int) shell_exec('hash pdftotext 2>&- || echo 1')) {
          $logger->info("pdftotext not found");
          throw new ModuleCannotInstallException(__('The pdftotext command-line utility '
                . 'is not installed. pdftotext must be installed to install this plugin.'));
        }

   
    protected function allowXML($settings) {
      

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
        
   
    public function attachListeners(SharedEventManagerInterface $sharedEventManager)
    {
        $sharedEventManager->attach(
            \Omeka\Api\Adapter\ItemAdapter::class,
            'api.create.post',
            [$this, 'ExtractPdf']
        );

        $sharedEventManager->attach(
            \Omeka\Api\Adapter\ItemAdapter::class,
            'api.update.post',
            [$this, 'ExtractPdf']
        );
    }

    //TODO add parameter for xml storage path
    protected function getPathConfig() {

       
   
    function ExtractPdf(\Zend\EventManager\Event $event) {
       
}
