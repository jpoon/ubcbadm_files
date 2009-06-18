<?php
    class PhotoGallery {
        public $sTitle;
        public $sDate;
        public $sDescription;
        public $photos = array();
    }

    class Photo {
        public $sTitle;
        public $sFilename;
    }

class PhotoGalleryXmlParser {
    private $parser;
    private $data;    
    private $currentTag;
    private $photoGallery;

    public function __construct() {        
        $this->parser = NULL;
        $this->data = "";
        $this->currentTag = "";
        $this->photoGallery = new PhotoGallery();
    }

    public function Parse($sFilename) {
        $this->parser = xml_parser_create();
        xml_set_object($this->parser, $this);
        xml_set_element_handler($this->parser, 'startElement', 'endElement');
        xml_set_character_data_handler($this->parser, 'characterData');

        // Open the XML file for reading 
        $fp = fopen($sFilename, 'r') or die("Error cannot open xml");

        // Read the XML file 4KB at a time
        while ($data = fread($fp, 4096)) {
            // Parse each 4KB chunk with the XML parser created above
           xml_parse($this->parser, $data, feof($fp)) or die(sprintf("XML error: %s at line %d",  
               xml_error_string(xml_get_error_code($this->parser)),  
               xml_get_current_line_number($this->parser)));
        }
        
        fclose($fp);
        xml_parser_free($this->parser);

        return $this->photoGallery;
    }

    private function startElement($parser, $tagName, $attrs) {
        $this->currentTag = $tagName;

        switch($this->currentTag) {
            case "PICTURE":
                $photo = new Photo();
                $photo->sTitle = $attrs['TITLE'];
                $photo->sFilename = $attrs['FILENAME'];
                array_push($this->photoGallery->photos, $photo);
        }
    }

    private function endElement($parser, $tagName) {
        $this->currentTag = "";
    }

    private function characterData($parser, $data) {
        switch($this->currentTag)
        {
            case "TITLE":
            $this->photoGallery->sTitle = $data;
            break;
    
            case "DATE":
            $this->photoGallery->sDate = $data;
            break;

            case "DESCRIPTION":
            $this->photoGallery->sDescription = $data;
            break;
        }
   }
}
