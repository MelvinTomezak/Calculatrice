<?php

declare(strict_types=1);

use Donnees\LectureFichier;
use PHPUnit\Framework\TestCase;

class LectureFichierTest extends TestCase
{
    private string $tempFile;

    protected function setUp(): void
    {
        $this->tempFile = tempnam(sys_get_temp_dir(), 'test_input');
        file_put_contents($this->tempFile, "2+3\n4*5\n\n6-1\n");
    }

    protected function tearDown(): void
    {
        if (file_exists($this->tempFile)) {
            unlink($this->tempFile);
        }
    }

    public function testLireRetourneLesExpressions(): void
    {
        $lecture = new LectureFichier($this->tempFile);
        $result = $lecture->lire();
        $this->assertSame(['2+3', '4*5', '6-1'], $result);
    }

    public function testLireFichierInexistantRetourneVide(): void
    {
        $lecture = new LectureFichier('fichier_inexistant.txt');
        $result = $lecture->lire();
        $this->assertSame([], $result);
    }
} 