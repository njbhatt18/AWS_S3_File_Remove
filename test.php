<?php

require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

try {
//echo dirname(__FILE__).'/files/company/testcompany/assets/videos/testvideo/thumbs/';exit;

//    $bucket = 'dotstudiopro-upload-server';
//    $keyname = 'developer_world_660x384.jpg';
//    // $filepath should be absolute path to a file on disk						
//    $filepath = 'developer_world_660x384.jpg';
//
//    $configs = array( 'key' => "AKIAJ5U6K4QKOLLOALTA",
//                       'secret' => "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",
//                        'curl.options' => array( 
//                            CURLOPT_PROXY => 'http://192.168.0.250', 
//                            CURLOPT_PROXYPORT => "8080", 
//                            CURLOPT_PROXYUSERPWD => 'ossc_niket:Uz9Ey938Um', 
//                            CURLOPT_HTTPHEADER => array("Expect:"), 
//                            CURLOPT_SSL_VERIFYPEER=> FALSE ) 
//                );
//    // Instantiate the client.
//    $s3 = S3Client::factory($configs);
//    $data = array(
//        'Bucket'       => $bucket,
//        'Key'          => $keyname,
//        'SourceFile'   => $filepath,
//        'Body'   => fopen('developer_world_660x384.jpg','r'),
//        'ContentType'  => 'image/jpeg',
//        'ACL'          => 'public-read',
//        //'StorageClass' => 'REDUCED_REDUNDANCY',
//        /*'Metadata'     => array(    
//            'param1' => 'value 1',
//            'param2' => 'value 2'
//        ),*/
//        
//    );
//    echo "<pre>";print_r($data);
//    // Upload a file.
//    $result = $s3->putObject($data);
//    
//    echo $result['ObjectURL'];
//    
//    
//    echo "<pre>Delete object".$keyname;
//    $result = $s3->deleteObject(array(
//        'Bucket' => $bucket,
//        'Key'    => $keyname
//    ));
//
//    echo $result['ObjectURL'];
    $bucket = 'dotstudiopro-upload-server';
    $keyname = 'download.jpg';
    // $filepath should be absolute path to a file on disk						
    $filepath = 'download.jpg';

    $configs = array('key' => "AKIAJ5U6K4QKOLLOALTA",
        'secret' => "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",
        'region' => 'us-west-1',
        'curl.options' => array(
            CURLOPT_PROXY => 'http://192.168.0.250',
            CURLOPT_PROXYPORT => "8080",
            CURLOPT_PROXYUSERPWD => 'ossc_niket:Uz9Ey938Um',
            CURLOPT_HTTPHEADER => array("Expect:"),
            CURLOPT_SSL_VERIFYPEER => FALSE)
    );
    // Instantiate the client.
    $s3 = S3Client::factory($configs);
    $data = array(
        'Bucket' => $bucket,
        'Key' => $keyname,
        'SourceFile' => $filepath,
        'Body' => fopen('download.jpg', 'r'),
        'ContentType' => 'image/jpeg',
        'ACL' => 'public-read',
            //'StorageClass' => 'REDUCED_REDUNDANCY',
            /* 'Metadata'     => array(    
              'param1' => 'value 1',
              'param2' => 'value 2'
              ), */
    );
    //echo "<pre>";print_r($data);
    // Upload a file.
    $result = $s3->putObject($data);
    //echo $result['ObjectURL'];
    //Delete a file.

    $result = $s3->deleteObject(array(
        'Bucket' => $bucket,
        'Key' => "App-Developer.png"
    ));
    //echo $result['ObjectURL'];

    
    // Get a file.
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_PROXY, 'http://192.168.0.250:8080');
    $save_path = dirname(__FILE__).'/files/company/testcompany/assets/videos/testvideo/thumbs';
    
    
    if (is_dir($save_path)) {
        echo "Files already created<br>";
    } else {
         if (!mkdir($save_path, 0777, true)) {
            echo('<br/>Failed to create folders...<br/>');
        }
    }
   
    $result = $s3->getObject(array(
        'Bucket' => $bucket,
        'Key' => "download.jpg",
//        'ResponseContentType'        => 'image/jpeg',
//        'ContentType' => 'image/jpeg',
        // 'ResponseContentLanguage'    => 'en-US',
//        'ResponseContentDisposition' => 'attachment; filename=developer.jpg',
//        'ContentDisposition' => 'attachment; filename=developer.jpg',
//        'Range' => 'bytes=0-999999999999999999999999999999',
        'SaveAs'  => $save_path.'/download.jpg'
            //'ResponseCacheControl'       => 'No-cache',
            // 'ResponseExpires'            => gmdate(DATE_RFC2822, time() + 3600),
    ));
    echo $result['Body']->getUri() . "\n";exit;
   
   
} catch (Exception $ex) {
    echo $ex->getMessage() . "\n";
} catch (S3Exception $e) {
    echo $e->getMessage() . "\n";
}


//require 'vendor/autoload.php';
//use Aws\Common\Aws;
//use Aws\S3\S3Client;
//use Aws\S3\Exception\S3Exception;
//use Doctrine\Common\Cache\FilesystemCache;
//use Guzzle\Cache\DoctrineCacheAdapter;
//define('AWS_KEY', 'AKIAJ5U6K4QKOLLOALTA');
//define('AWS_SECRET_KEY', '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');
//try{
//    
//    // Create the AWS service builder, providing the path to the config file
//    $aws = Aws::factory('config.php');
//    $s3Client = $aws->get('s3');
//    $blist = $s3Client->listBuckets();
//    echo "   Buckets belonging to " . $blist['Owner']['ID'] . ":\n";
//    foreach ($blist['Buckets'] as $b) {
//        echo "{$b['Name']}\t{$b['CreationDate']}\n";
//    }
// Instantiate an S3 client
//    $s3 = S3Client::factory();
//$provider = CredentialProvider::defaultProvider();
//    $s3 = new S3Client([
//        'version'     => 'latest',
//        'region'      => 'us-west-2',
//        //'credentials' => $provider,
//    ]);
//    $s3 = S3Client::factory();
//$credentials = new Aws\Credentials\Credentials('AKIAJ5U6K4QKOLLOALTA', 'MnAfV4sjKlxSGqg61hhmbATrzSXER8prZWqXu3Ii');
//    $s3 = new Aws\S3\S3Client([
//    'version'     => 'latest',
//    'region'      => 'us-west-2',
//    'credentials' => $credentials
//]);
//    $blist = $s3->listBuckets();
//    echo "   Buckets belonging to " . $blist['Owner']['ID'] . ":\n";
//    foreach ($blist['Buckets'] as $b) {
//        echo "{$b['Name']}\t{$b['CreationDate']}\n";
//    }
//} catch (Exception $ex) {
//    echo $ex->getMessage();
//}
?>