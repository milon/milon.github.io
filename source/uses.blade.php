@extends('_layouts.master')

@section('meta')
    @include('_layouts._partials._index_meta', [
        'title' => 'milon.im | Uses',
        'description' => "Hardware and Software I use.",
    ])
@endsection

@section('body')
    <p>
        Inspied by some renouned developer like <a href="https://adamwathan.me/uses/">Adam Wathan</a>,
        <a href="https://wesbos.com/uses/">Wes Bos</a>, <a href="https://freek.dev/uses">Freek Murze</a>,
        <a href="https://james.brooks.page/uses/">James Brooks</a>, I also put together the list of all
        the hardwares and softwares I regularly use.
    </p>

    <h2>Hardwares</h2>

    <ul>
        <li>Macbook Pro 13" - late 2017 model</li>
        <li>Apple iPad Pro 2020 - 11" version</li>
        <li>Apple Pencil 2nd generation</li>
        <li>Apple iPhone 12 Pro</li>
        <li>Apple AirPod Pro</li>
        <li>Google Home Mini</li>
        <li><a href="https://www.amazon.de/dp/B0756CYWWD">Bose QC35 II</a></li>
        <li><a href="https://www.amazon.de/dp/B07N91BVY5">Jaybird Tarah Pro</a></li>
        <li><a href="https://www.amazon.de/dp/B084122GJ9">Amazon Kindle Paperwhite</a></li>
        <li><a href="https://www.amazon.de/gp/product/B075GJ1BN8">HP Color Laserjet Pro Multifunction Colour Laser Printer</a></li>
        <li><a href="https://www.amazon.de/gp/product/B07JGSPQV2">Dell UltraSharp U2719D 27" monitor</a></li>
        <li><a href="https://www.amazon.de/gp/product/B072BG9Z8W">Logitech MX Master Anywhere 2s</a></li>
        <li><a href="https://www.amazon.de/gp/product/B07F2RW6PJ">Satechi wireless Bluetooth Keyboard</a></li>
        <li><a href="https://www.amazon.de/gp/product/B074TZFQN1">Omoton notebook stand</a></li>
        <li><a href="https://www.amazon.de/gp/product/B07RSZZK35">Ultimate Ears WonderBoom Bluetooth Speaker</a></li>
        <li><a href="https://www.amazon.de/gp/product/B00LLL78RA">Satechi F3 smart monitor stand</a></li>
        <li><a href="https://www.amazon.de/gp/product/B07DC52RX6">Novoo USB-C hub</a></li>
        <li><a href="https://www.amazon.de/dp/B00TPLUZMI">Belkin Wireless Charger</a></li>
        <li><a href="https://www.amazon.de/dp/B07CKG1FXN">Lenovo ThinkPad Hybrid USB-C Docking Station</a></li>
        <li><a href="https://www.amazon.de/gp/product/B01FFFSORA">Silent Monsters mouse pad</a></li>
    </ul>

    <h2>Softwares</h2>

    <ul>
        <li><a href="https://www.jetbrains.com/">PHPStorm, IntelliJ IDEA, Android Studio</a></li>
        <li><a href="https://www.atom.io/">Atom</a></li>
        <li><a href="https://www.docker.com/">Docker</a></li>
        <li><a href="https://tableplus.com/">TablePlus</a></li>
        <li><a href="https://www.iterm2.com/">iTerm 2</a></li>
        <li><a href="https://www.postman.com/">Postman</a></li>
        <li><a href="https://www.macbartender.com/">Bartender</a></li>
        <li><a href="https://apps.apple.com/us/app/dato/id1470584107">Dato</a></li>
        <li><a href="https://apps.apple.com/us/app/amphetamine/id937984704">Amphetamine</a></li>
        <li><a href="https://apps.apple.com/us/app/unsplash/id1290631746">Unsplash</a></li>
        <li><a href="https://tinkerwell.app/">Tinkerwell</a></li>
        <li><a href="https://freemacsoft.net/appcleaner/">AppCleaner</a></li>
        <li><a href="https://airvideo.app/">Air Video HD</a></li>
        <li><a href="https://www.spotify.com/">Spotify</a></li>
        <li><a href="https://1password.com/">1 Password</a></li>
    </ul>

    <p>
        These are the most used hardwares and softwares by me. I also used various
        other small utility tools like Sip, Bandwidth+, Forecast Plus, ImageOptim etc.
        Besides that, I normally don't use any office suite, but whenever I need to
        use one, I normally go for pages, numbers and keynote, that comes free with macOS.
    </p>

    <p>
        You can find the full list along with all the configuration I normally use in the
        [dotfiles](https://github.com/milon/dotfiles) repository.
    </p>

    <p class="back-link">
        <a href="{{ $page->baseUrl }}">Back to Home</a>
    </p>
@endsection
