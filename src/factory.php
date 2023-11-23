<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Codecrafted\UrlExtractor\URL;
use Codecrafted\IronElephant\File;
use Codecrafted\IronElephant\Validate;

if (is_get()) {

    $validate = new Validate(request('album_url'));
    $webAddress = $validate->webAddressValidate()->getValidated();
    $webAddress = trim($webAddress, '/');

    if (empty($webAddress) || strpos($webAddress, 'https://downloads.khinsider.com') !== 0) {
        error('Wrong url !!!');
        redirect('/#error');
    }

    // get album name
    $albumName = str_replace('https://downloads.khinsider.com/game-soundtracks/album/', '', $webAddress);

    $fileName = $albumName . '.txt';
    $f = new File(__DIR__ . '/../exported/' . $fileName);
    $f->makeDir(__DIR__ . '/../exported/');

    session('fileName', $fileName);

    /**
     * extract page link from site map
     */
    $links = new URL();

    $links->extractURL($webAddress)->fileOnly(['.mp3']);

    $musicList = '';

    foreach ($links->getURL() as $link) {
        $musicList .= $links
            ->extractURL('https://downloads.khinsider.com/' . $link)
            ->fileOnly(['.mp3'])
            ->showURL()
            . "\n";
    }
    $musicList = trim($musicList, "\n");

    // save links in file
    $f->write($musicList);

    // show all result in page
    if (request('show') === 'on') {
        session('showResult', $musicList);
    }

    // finish
    redirect('/');
}
