<?php 

require_once('simpletest/autorun.php');
require_once('gsxlib.php');

class GsxlibTest extends UnitTestCase
{
    function setUp() {
        global $argv;
        $this->gsx = GsxLib::getInstance($argv[1], $argv[2], $argv[3], 'ut');
    }

    function testWarranty() {
        $wty = $this->gsx->warrantyStatus('RM6501PXU9C');
        $this->assertEqual($wty->warrantyStatus, 'Out Of Warranty (No Coverage)');
    }

    function testCreateCarryInRepair() {
        $repairData = array(
            'shipTo' => '6191',
            'serialNumber' => 'RM6501PXU9C',
            'diagnosedByTechId' => 'USA022SN',
            'symptom' => 'Sample symptom',
            'diagnosis' => 'Sample diagnosis',
            'unitReceivedDate' => '07/02/13',
            'unitReceivedTime' => '12:40 PM',
            'notes' => 'A sample notes',
            'poNumber' => '11223344',
            'popFaxed' => false,
            'orderLines' => array(
                'partNumber' => '076-1080',
                'comptiaCode' => '660',
                'comptiaModifier' => 'A',
                'abused' => false
            ),
            'customerAddress' => array(
                'addressLine1' => 'Address line 1',
                'country' => 'US',
                'city' => 'Cupertino',
                'state' => 'CA',
                'street' => 'Valley Green Dr',
                'zipCode' => '95014',
                'regionCode' => '005',
                'companyName' => 'Apple Inc',
                'emailAddress' => 'test@example.com',
                'firstName' => 'Customer Firstname',
                'lastName' => 'Customer lastname',
                'primaryPhone' => '4088887766'
            ),
        );

        $this->gsx->createCarryinRepair($repairData);

    }

    function testCreateMailInRepair() {
        $repairData = array(
            'shipTo' => '6191',
            'accidentalDamage' => false,
            'addressCosmeticDamage' => false,
            'comptia' => array(
                'comptiaCode' => 'X01',
                'comptiaModifier' => 'D',
                'comptiaGroup' => 1,
                'technicianNote' => 'sample technician notes'
            ),
            'requestReviewByApple' => false,
            'serialNumber' => 'RM6501PXU9C',
            'diagnosedByTechId' => 'USA022SN',
            'symptom' => 'Sample symptom',
            'diagnosis' => 'Sample diagnosis',
            'unitReceivedDate' => '07/02/13',
            'unitReceivedTime' => '12:40 PM',
            'notes' => 'A sample notes',
            'purchaseOrderNumber' => 'AB12345',
            'trackingNumber' => '12345',
            'shipper' => 'XDHL',
            'soldToContact' => 'Cupertino',
            'popFaxed' => false,
            'orderLines' => array(
                'partNumber' => '076-1080',
                'comptiaCode' => '660',
                'comptiaModifier' => 'A',
                'abused' => false
            ),
            'customerAddress' => array(
                'addressLine1' => 'Address line 1',
                'country' => 'US',
                'city' => 'Cupertino',
                'state' => 'CA',
                'street' => 'Valley Green Dr',
                'zipCode' => '95014',
                'regionCode' => '005',
                'companyName' => 'Apple Inc',
                'emailAddress' => 'test@example.com',
                'firstName' => 'Customer Firstname',
                'lastName' => 'Customer lastname',
                'primaryPhone' => '4088887766'
            ),
        );

        $this->gsx->createMailinRepair($repairData);

    }
}
