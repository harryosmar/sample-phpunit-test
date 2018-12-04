<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/4/18
 * Time: 9:46 PM
 */

namespace Sample\Tests\unit;

use Sample\BSASingleFormValidationRequest;

class ValidationRequestTest extends Base
{
    public function testSerialization()
    {
        $BSASingleFormValidationRequest = new BSASingleFormValidationRequest();
        $BSASingleFormValidationRequest->addRecord([
            'product_name' => 'Matress', 'product_display_name' => 'King Matress', 'lead_time' => 16, 'map_price' => 10, 'wholesale_price' => 10, 'msrp' => 10, 'project' => 'Brand Catalog 5'
        ])
        ->addRecord([
            'product_name' => 'Matress', 'product_display_name' => 'King Matress', 'lead_time' => 16, 'map_price' => 10, 'wholesale_price' => 10, 'msrp' => 10, 'project' => 'Brand Catalog 5'
        ]);
        $this->assertEquals('{"validationRequest":"BSA Complete Single Form Validation","dataRepository":{"name":"DirectInput","input":[{"product_name":"Matress","product_display_name":"King Matress","lead_time":16,"map_price":10,"wholesale_price":10,"msrp":10,"project":"Brand Catalog 5"},{"product_name":"Matress","product_display_name":"King Matress","lead_time":16,"map_price":10,"wholesale_price":10,"msrp":10,"project":"Brand Catalog 5"}],"validators":{"ProductNameSize":{"max_length":"200","errorMessage":"Ops, error!","errorLevel":"Very Critical for my application"},"0":"LeadTime","1":"MAPPrice","2":"MSRPMustBeFloat","3":"MSRPMustBeGreaterThanOrEqualToMAPPriceWhenProjectIsBrandCatalog1","4":"MSRPMustBeGraterThanWholesalePriceWhenProjectIsBrandCatalog2Or3"}}}', json_encode($BSASingleFormValidationRequest));

    }
}