<?php
namespace Embitel\TestApi\Cron;

class CustomerCron
{
    public function execute()
    {
        $filename = '/var/www/html/magento1/var/export/customer_' . date('dMY_his') . '.csv';
        $header = ['Firstname', 'Lastname', 'Email', 'Telephone'];
        $file = fopen($filename, "w");  
        $header = array_combine($header,$header);
        fputcsv($file,$header);
        $data = [
            [
                'Firstname' => 'Swarna', 
                'Lastname' => 'Thiyagarajan', 
                'Email' => 'mailme.swarna@gmail.com', 
                'Telephone' => 8095969120
            ],
            [
                'Firstname' => 'Sana', 
                'Lastname' => 'Alagu', 
                'Email' => 'sana@gmail.com', 
                'Telephone' => 8095969120
            ]
        ];
        $fields=[];
        foreach($data as $fields)
            {
                fputcsv($file, $fields);  
            }
        fclose($file);
    }
}