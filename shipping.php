<?php

use Picqer\Carriers\SendCloud\Connection;
use Picqer\Carriers\SendCloud\DocumentDownloader;
use Picqer\Carriers\SendCloud\SendCloud;

require_once ".././vendor/autoload.php";

class shipping
{
    private $parcel;
    private $connection;
    private $client;

    function connectToApi(String $userApiKey, String $userSecretApiKey) {
        $this->connection = new Connection($userApiKey, $userSecretApiKey);
        $this->client = new SendCloud($this->connection);
    }

    function createOrder(int $shipMethod, String $customerName, String $customerCompany, String $customerAdress, String $customerCity, String $customerPostalCode, String $customerCountry) {
        $parcel = $this->client->parcels();

        // Delivery Infos
        $parcel->shipment = $shipMethod;
        $parcel->order_number = strval($customerName . "_" . uniqid());

        // Customer Infos
        $parcel->name = $customerName;
        $parcel->company_name = $customerCompany;
        $parcel->address = $customerAdress;
        $parcel->city = $customerCity;
        $parcel->postal_code = $customerPostalCode;
        $parcel->country = $customerCountry;

        $parcel->requestShipment = true;
        $parcel->save();

        $this->parcel = $parcel;
    }

    function createLabel() {
        $labelUrl = $this->parcel->getPrimaryLabelUrl();
        $documentDownloader = new DocumentDownloader($this->connection);
        $labelContent = $documentDownloader->getDocument($labelUrl, 'pdf');

        $documentName = 'delivery_label.pdf';
        header('Content-Type: application/pdf');
        header('Content-Length: '.strlen( $labelContent ));
        header('Content-disposition: inline; filename="' . $documentName . '"');
        header('Cache-Control: no-cache, max-age=0');
        header('Pragma: no-cache');
        echo $labelContent;
    }
}