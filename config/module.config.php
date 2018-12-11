<?php
return [
    'file_renderers' => [
        'invokables' => [
            'PDFtoXML' => 'PdfEmbed\PdfRenderer',
        ],
        'aliases' => [
            'application/pdf' => 'PDFtoXML',
            'pdf' => 'PDFtoXML',
        ],
    ],
];