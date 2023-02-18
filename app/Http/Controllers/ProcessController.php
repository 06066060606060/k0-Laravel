<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ProcessController extends Controller
{

    public static function execute()
    {
    
        $process = Process::fromShellCommandline('touch /tmp/test.txt');

        $processOutput = '';

        $captureOutput = function ($type, $line) use (&$processOutput) {
            $processOutput .= $line;
        };

        $process->setTimeout(null)
            ->run($captureOutput);

        if ($process->getExitCode()) {
         return $processOutput;
        }

        return $processOutput;
    }
    }

