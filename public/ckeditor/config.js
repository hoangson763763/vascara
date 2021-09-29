/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = 'http://127.0.0.1:8000/ckfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = 'http://127.0.0.1:8000/ckfinder/browse.php?opener=ckeditor&type=images';
 
  
    config.filebrowserFlashBrowseUrl = 'http://127.0.0.1:8000/ckfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = 'http://127.0.0.1:8000/ckfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = 'http://127.0.0.1:8000/ckfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = 'http://127.0.0.1:8000/ckfinder/upload.php?opener=ckeditor&type=flash'; 
};
