<?php

/**
 * Single source of truth for contact details (Blade, agent markdown, CV contact block).
 *
 * @return array{
 *     email: string,
 *     emailMailto: string,
 *     phone: string,
 *     website: string,
 *     websiteUrl: string,
 *     xHandle: string,
 *     xPath: string,
 *     linkedinHandle: string,
 *     linkedinPath: string,
 *     elsewhere: list<array{label: string, href: string}>
 * }
 */
return [
    'email' => 'contact@milon.im',
    'emailMailto' => 'mailto:contact@milon.im',
    'phone' => '+1 (604) 735-7681',
    'website' => 'milon.im',
    'websiteUrl' => 'https://milon.im',
    'xHandle' => '@to_milon',
    'xPath' => '/x',
    'linkedinHandle' => 'in/tomilon',
    'linkedinPath' => '/linkedin',
    'elsewhere' => [
        ['label' => 'GitHub', 'href' => '/github'],
        ['label' => 'Facebook', 'href' => '/facebook'],
        ['label' => 'SlideShare', 'href' => '/slideshare'],
        ['label' => 'Speaker Deck', 'href' => '/speakerdeck'],
        ['label' => 'Instagram', 'href' => '/instagram'],
        ['label' => 'Stack Overflow', 'href' => '/stackoverflow'],
    ],
];
