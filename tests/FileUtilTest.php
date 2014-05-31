<?php

namespace malkusch\bav;

require_once __DIR__ . "/../autoloader/autoloader.php";

/**
 * Test FileUtil
 *
 * @see FileUtil
 * @author Markus Malkusch <markus@malkusch.de>
 * @license GPL
 */
class FileUtilTest extends \PHPUnit_Framework_TestCase
{ 

    /**
     * Tests a user configured temporary directory
     */
    public function testSetConfiguredTempDirectory()
    {
        $directory = "/root";
        
        $configuration = new DefaultConfiguration();
        $configuration->setTempDirectory($directory);
        
        $fileUtil = new FileUtil($configuration);
        $this->assertEquals($directory, $fileUtil->getTempDirectory());
    }

    /**
     * Tests getting a writable directory.
     */
    public function testGetWritableTempDirectory()
    {
        $fileUtil = new FileUtil();
        $this->assertTrue(is_writable($fileUtil->getTempDirectory()));
    }

    /**
     * Tests getting /tmp.
     * 
     * @requires OS Linux
     */
    public function testLinuxTempDirectory()
    {
        $fileUtil = new FileUtil();
        $this->assertEquals("/tmp", $fileUtil->getTempDirectory());
    }
}
