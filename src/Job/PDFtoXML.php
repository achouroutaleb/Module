<?php
namespace PDFtoXML\Job;

use Omeka\Job\AbstractJob;

class PDFtoXML extends AbstractJob
/*
Omeka Job : Lorsqu'un utilisateur commence à exécuter un processus qui prend un certain temps, tel qu'une importation d'API, l'avancement du processus est affiché dans l'onglet Travaux du tableau de bord de l'administrateur. Le tableau affiche également les travaux terminés, arrêtés et interrompus par une erreur.
*/
{
    protected  $basePath;


    protected  $baseUri;

    /**
     * @brief Attach attracted ocr data from pdf with item
     */
    public function perform() {
        $this->basePath   = $this->getArg('basePath');
        $this->baseUri    = $this->getArg('baseUri');

        $apiManager = $this->getServiceLocator()->get('Omeka\ApiManager');
        $itemId     = $this->getArg('itemId');
        $filename   = $this->getArg('filename');
        $storageId  = $this->getArg('storageId');
        $extension  = $this->getArg('extension');

        $filePath = sprintf('%s/%s',$this->basePath , $storageId . '.' . $extension);

        $this->pdfToText($filePath, $storageId);

        $fileIndex = 0;
        $data = [
            "o:ingester" => "url",
            "file_index" => $fileIndex,
            "o:item" => [
                "o:id" => $itemId,
            ],
            "ingest_url" => sprintf('%s/%s',$this->baseUri, $storageId .'.xml'),
            "o:source" => $filename
        ];

        $apiManager->create('media', $data);
    }

    /**
     *
     * @brief extract and store OCR Data from pdf in .xml file
     * @param $path
     *          pdf file's path
     * @param $filename
     *          pdf filename on omeka after import
     */
    public function pdfToText($path, $filename)
    {
        $path = escapeshellarg($path);
        $xml_file_path  = sprintf('%s/%s', $this->basePath, $filename);
        $xml_file_path = escapeshellarg($xml_file_path);

        $cmd = "pdftohtml -i -c -hidden -xml $path $xml_file_path";

        shell_exec($cmd);
    }
}