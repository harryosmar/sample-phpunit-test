<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/4/18
 * Time: 9:51 PM
 */

namespace Sample;

class BSASingleFormValidationRequest extends BaseValidationRequest
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'BSA Complete Single Form Validation';
    }

    /**
     * @return string
     */
    public function getDataRepositoryName()
    {
        return 'DirectInput';
    }

    /**
     * @return array
     */
    public function getValidators(): array
    {
        return [
            'ProductNameSize' => [
                'max_length' => '200',
                'errorMessage' => 'Ops, error!',
                'errorLevel' => 'Very Critical for my application',
            ],
            'LeadTime',
            'MAPPrice',
            'MSRPMustBeFloat',
            'MSRPMustBeGreaterThanOrEqualToMAPPriceWhenProjectIsBrandCatalog1',
            'MSRPMustBeGraterThanWholesalePriceWhenProjectIsBrandCatalog2Or3'
        ];
    }
}