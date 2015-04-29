--TEST--
zstd_compress(): basic functionality
--SKIPIF--
--FILE--
<?php
include(dirname(__FILE__) . '/data.inc');

// Initialise all required variables
$smallstring = "A small string to compress\n";


// Calling gzcompress() with all possible arguments

// Compressing a big string
echo "*** Compression ***", PHP_EOL;
$output = zstd_compress($data);
var_dump(md5($output));
var_dump(zstd_uncompress($output) === $data);

// Compressing a smaller string
echo "*** Compression ***", PHP_EOL;
$output = zstd_compress($smallstring);
var_dump(bin2hex($output));
var_dump(zstd_uncompress($output) === $smallstring);

// Calling gzcompress() with mandatory arguments
echo "*** Testing with no specified compression ***", PHP_EOL;
var_dump(bin2hex(zstd_compress($smallstring) ));

?>
===Done===
--EXPECT--
*** Compression ***
string(32) "ba1989dbe63fe0d4dfa87ec5cb95dbff"
bool(true)
*** Compression ***
string(74) "fd2fb51c40001b4120736d616c6c20737472696e6720746f20636f6d70726573730ac00000"
bool(true)
*** Testing with no specified compression ***
string(74) "fd2fb51c40001b4120736d616c6c20737472696e6720746f20636f6d70726573730ac00000"
===Done===
