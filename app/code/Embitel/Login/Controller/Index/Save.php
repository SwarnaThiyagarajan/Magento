<?php
namespace Embitel\Login\Controller\Index;

use Magento\Framework\App\Action\Context;
use Embitel\Login\Model\Employee;

class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var Login
     */
    
    protected $_login;

    public function __construct(
        Context $context,
        Employee $login
    ) {
        $this->_login = $login;
        parent::__construct($context);
    }
         
    public function execute()
    {
        $get_data=$this->getRequest()->getParams();
        $data=[
            'employee_id'=> $get_data['employeeid'],
            'employee_first_name' => $get_data['firstname'],
            'employee_last_name' => $get_data['lastname'],
            'employee_email' => $get_data['email'],
            'employee_mobile_number' => $get_data['mobilenumber'],
            'employee_company_name' => $get_data['companyname'],
            'employee_department' => $get_data['department'],
            'employee_occupation' => $get_data['occupation'],
            'employee_address' => $get_data['address'],
            'employee_joining_date' => $get_data['joiningdate'],
            'employee_date_of_birth' => $get_data['dob']
        ];
 
        $login = $this->_login;
        $login->setData($data);
        $login->save();
        if ($login->getId()) {
            $this->messageManager->addSuccessMessage(__('Data Saved'));
        } else {
            $this->messageManager->addErrorMessage(__('Data not Saved'));
        }
    
        $resultRedirect =  $this->resultRedirectFactory->Create();
        $resultRedirect->setPath('login/index/index');
        return $resultRedirect;
    }
}
