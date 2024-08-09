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
ngulang:
for ($i=0; $i <= 35; $i++) { 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.quotable.io/random');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'Accept-Language: en-US,en;q=0.9',
        'Cache-Control: max-age=0',
        'Connection: keep-alive',
        'DNT: 1',
        'If-None-Match: W/"101-t0CtWUau1aEFyl7Db/TbNRoW6Tc"',
        'Sec-Fetch-Dest: document',
        'Sec-Fetch-Mode: navigate',
        'Sec-Fetch-Site: none',
        'Sec-Fetch-User: ?1',
        'Upgrade-Insecure-Requests: 1',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36',
        'sec-ch-ua: "Not)A;Brand";v="99", "Google Chrome";v="127", "Chromium";v="127"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
    ]);

    $response = curl_exec($ch);

    curl_close($ch);

    file_put_contents('kata.txt',$response);

    // Path ke direktori proyek Anda
    $projectDir = '/home/perkutut/ihsan/kata-kata-hari-ini';

    // Navigate ke direktori proyek
    chdir($projectDir);

    // Add all changes
    runCommand('git add .');

    // Commit dengan pesan default
    runCommand('git commit -m "Commit kata2 hari ini"');

    // Push perubahan ke repository remote
    runCommand('git push');

    
    if ($i == 30) {
        print_r("done hari ini tunggu besok \n");
        sleep(90000);
        goto ngulang;
    } else {
        echo "Git commands executed successfully.\n";
        sleep(10);
        exec('clear');
    }
    
}

?>
