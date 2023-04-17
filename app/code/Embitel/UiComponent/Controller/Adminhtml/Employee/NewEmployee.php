<?php
namespace Embitel\UiComponent\Controller\Adminhtml\Employee;
 
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Backend\Model\View\Result\ForwardFactory;
 
class NewEmployee extends Action
{
    /**
     * @see _isAllowed()
     */
    const ACTION_RESOURCE = 'Embitel_UiComponent::uicomponent';

    /**
     * Core Registry
     * 
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * Result Page Factory
     * 
     * @var PageFactory
     */
    protected $reultPageFactory;

    /**
     * @var ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @param Registry $registry
     * @param PageFactory $reultPageFactory
     * @param ForwardFactory $resultForwardFactory
     * @param Context $context
     */
    public function __construct(
        Registry $registry,
        PageFactory $reultPageFactory,
        ForwardFactory $resultForwardFactory,
        Context $context
    )
    {
        $this->CoreRegistry = $registry;
        $this->resultPageFactory = $reultPageFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        // die("yes");
        $resultPage->getConfig()->getTitle()->prepend(__('ADD NEW EMPLOYEE'));
        die("yes");
        return $resultPage;
    }
}