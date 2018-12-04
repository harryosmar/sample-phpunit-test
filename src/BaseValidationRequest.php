<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/4/18
 * Time: 9:57 PM
 */

namespace Sample;

abstract class BaseValidationRequest implements \Sample\contract\ValidationRequest
{
    /**
     * @var array
     */
    protected $recordCollection = [];

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return ([
            'validationRequest' => $this->getName(),
            'dataRepository' => [
                'name' => $this->getDataRepositoryName(),
                'input' => $this->getDataRecordCollection(),
                'validators' => $this->getValidators()
            ],
        ]);
    }

    /**
     * @param array $record
     */
    public function addRecord(array $record) : \Sample\contract\ValidationRequest
    {
        $this->recordCollection[] = $record;
        return $this;
    }

    /**
     * @return array
     */
    public function getDataRecordCollection()
    {
        return $this->recordCollection;
    }
}