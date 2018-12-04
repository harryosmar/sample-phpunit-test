<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/4/18
 * Time: 9:51 PM
 */

namespace Sample\contract;

interface ValidationRequest extends \JsonSerializable
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getDataRepositoryName();

    /**
     * @return array
     */
    public function getValidators() : array ;

    /**
     * @return array
     */
    public function getDataRecordCollection();

    /**
     * @param array $record
     */
    public function addRecord(array $record) : self ;
}