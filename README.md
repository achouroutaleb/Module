PDFtoXML (module for Omeka S)
=============================

Summary
-----------
PDFtoXML it's an Omeka's module to extract OCR text in XML from PDF files and create an xml file .The xml is stored as a new file associated with the item.

Installation
------------
To run with success this module we : 
(need  IIIF Server module [module for Omeka S] https://github.com/Daniel-KM/Omeka-S-module-IiifServer ): IIIF Server is a module for Omeka S that adds the IIIF specifications to serve any images and medias.

(need [IIIF-Search module](https://github.com/bubdxm/Omeka-S-module-IiifSearch) ):IIIF Search is a module for Omeka S that add IIIF Search Api for ocr content.


- This module needs pdftohtml command-line tool on your server

for (Linux) :
```
    sudo apt-get install poppler-utils
```
for (Windows) :
```
https://sourceforge.net/projects/poppler-win32/
```

- Upload the PDFtoXML folder folder into your module folder on the server;
- you can install the module via github

```
    cd omeka-s/modules  
    git clone git@github.com:achouroutaleb/Omeka-S-module-PDFtoXML.git "PDFtoXML"
```

- Install it from the admin → Modules → PDFtoXML -> install
- Extract OCR automaticaly allow the upload of XML files 

Using the PDFtoXML module
---------------------------

- Create an item
- Save this Item
- After save, add PDF file(s) to this item
- To locate extracted OCR xml file, select the item to which the PDF is attached. Normally, you should see an XML file attached to the record with the same filename than the pdf file. 


License
-------

This module is published under the CeCILL v2.1 licence, compatible with GNU/GPL and approved by FSF and OSI.

In consideration of access to the source code and the rights to copy, modify and redistribute granted by the license, users are provided only with a limited warranty and the software’s author, the holder of the economic rights, and the successive licensors only have limited liability.

In this respect, the risks associated with loading, using, modifying and/or developing or reproducing the software by the user are brought to the user’s attention, given its Free Software status, which may make it complicated to use, with the result that its use is reserved for developers and experienced professionals having in-depth computer knowledge. Users are therefore encouraged to load and test the suitability of the software as regards their requirements in conditions enabling the security of their systems and/or data to be ensured and, more generally, to use and operate it in the same conditions of security.

This Agreement may be freely reproduced and published, provided it is not altered, and that no provisions are either added or removed herefrom.

The module uses the Deepzoom library and Zoomify library, the first based on Deepzoom of Jeremy Buggs (license MIT) and the second of various authors (license GNU/GPL). See files inside the folder vendor for more information.

Contact
-------

* Achour Outaleb,  (see [symac](https://github.com/achouroutaleb))




