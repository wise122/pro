<?php

if (!function_exists('getCleanUrl')) {
    function getCleanUrl($url) {
    // Parse the URL to extract its components
    $parsedUrl = parse_url($url);
    
    // Check if the host contains 'www.' and remove it
    if (isset($parsedUrl['host']) && strpos($parsedUrl['host'], 'www.') === 0) {
        $parsedUrl['host'] = substr($parsedUrl['host'], 4);
    }
    
    // Rebuild the URL
    $cleanUrl = (isset($parsedUrl['scheme']) ? "{$parsedUrl['scheme']}://" : '')
                . (isset($parsedUrl['user']) ? "{$parsedUrl['user']}" : '')
                . (isset($parsedUrl['pass']) ? ":{$parsedUrl['pass']}" : '')
                . (isset($parsedUrl['user']) ? '@' : '')
                . (isset($parsedUrl['host']) ? "{$parsedUrl['host']}" : '')
                . (isset($parsedUrl['port']) ? ":{$parsedUrl['port']}" : '')
                . (isset($parsedUrl['path']) ? "{$parsedUrl['path']}" : '')
                . (isset($parsedUrl['query']) ? "?{$parsedUrl['query']}" : '')
                . (isset($parsedUrl['fragment']) ? "#{$parsedUrl['fragment']}" : '');
    
    return $cleanUrl;
}
}

