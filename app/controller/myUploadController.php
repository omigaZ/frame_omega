<?php
namespace app\controller;

use core\omg;

class myUploadController extends omg{

    public function perUpload(){
        $this->display('upload');
    }

    public function doUpload(){
        $storage = new \Upload\Storage\FileSystem(OMG.'/upload');
        $file = new \Upload\File('foo', $storage);

// Optionally you can rename the file on upload
        $new_filename = uniqid('omg');
        $file->setName($new_filename);

// Validate file upload
// MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml
        $file->addValidations(array(
            // Ensure file is of type "image/png"
            new \Upload\Validation\Mimetype('image/png'),

            //You can also add multi mimetype validation
            //new \Upload\Validation\Mimetype(array('image/png', 'image/gif'))

            // Ensure file is no larger than 5M (use "B", "K", M", or "G")
            new \Upload\Validation\Size('5M')
        ));

// Access data about the file that has been uploaded
        $data = array(
            'name'       => $file->getNameWithExtension(),
            'extension'  => $file->getExtension(),
            'mime'       => $file->getMimetype(),
            'size'       => $file->getSize(),
            'md5'        => $file->getMd5(),
            'dimensions' => $file->getDimensions()
        );

// Try to upload file
        try {
            // Success!
            $file->upload();
        } catch (\Exception $e) {
            // Fail!
            $errors = $file->getErrors();
            dump($errors);
        }
    }

}