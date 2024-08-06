<?php

function runCommand($command) {
    $output = [];
    $result = null;
    exec($command, $output, $result);
    if ($result !== 0) {
        echo "Error executing command: $command\n";
        echo implode("\n", $output);
        die();
    }
    return $output;
}

// Path ke direktori proyek Anda
$projectDir = '/home/perkutut/ihsan/kata-kata-hari-ini';

// Navigate ke direktori proyek
chdir($projectDir);

// Add all changes
runCommand('git add .');

// Commit dengan pesan default
runCommand('git commit -m "Auto commit on save"');

// Push perubahan ke repository remote
runCommand('git push');

echo "Git commands executed successfully.\n";
?>
