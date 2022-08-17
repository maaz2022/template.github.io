<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Polyfill\Iconv as p;

if (!defined('ICONV_IMPL')) {
    define('ICONV_IMPL', 'Symfony');
}
if (!defined('ICONV_VERSION')) {
    define('ICONV_VERSION', '1.0');
}
if (!defined('ICONV_MIME_DECODE_STRICT')) {
    define('ICONV_MIME_DECODE_STRICT', 1);
}
if (!defined('ICONV_MIME_DECODE_CONTINUE_ON_ERROR')) {
    define('ICONV_MIME_DECODE_CONTINUE_ON_ERROR', 2);
}

if (!function_exists('iconv')) {
    function iconv( $from_encoding, $to_encoding, $string) { return p\Iconv::iconv((string) $from_encoding, (string) $to_encoding, (string) $string); }
}
if (!function_exists('iconv_get_encoding')) {
    function iconv_get_encoding( $type = 'all'){ return p\Iconv::iconv_get_encoding((string) $type); }
}
if (!function_exists('iconv_set_encoding')) {
    function iconv_set_encoding( $type, $encoding) { return p\Iconv::iconv_set_encoding((string) $type, (string) $encoding); }
}
if (!function_exists('iconv_mime_encode')) {
    function iconv_mime_encode( $field_name, $field_value, $options = []) { return p\Iconv::iconv_mime_encode((string) $field_name, (string) $field_value, (array) $options); }
}
if (!function_exists('iconv_mime_decode_headers')) {
    function iconv_mime_decode_headers( $headers, $mode = 0, $encoding = null) { return p\Iconv::iconv_mime_decode_headers((string) $headers, (int) $mode, $encoding); }
}

if (extension_loaded('mbstring')) {
    if (!function_exists('iconv_strlen')) {
        function iconv_strlen( $string, $encoding = null) { null === $encoding && $encoding = p\Iconv::$internalEncoding; return mb_strlen((string) $string, $encoding); }
    }
    if (!function_exists('iconv_strpos')) {
        function iconv_strpos( $haystack, $needle, $offset = 0, $encoding = null) { null === $encoding && $encoding = p\Iconv::$internalEncoding; return mb_strpos((string) $haystack, (string) $needle, (int) $offset, $encoding); }
    }
    if (!function_exists('iconv_strrpos')) {
        function iconv_strrpos( $haystack, $needle, $encoding = null) { null === $encoding && $encoding = p\Iconv::$internalEncoding; return mb_strrpos((string) $haystack, (string) $needle, 0, $encoding); }
    }
    if (!function_exists('iconv_substr')) {
        function iconv_substr( $string, $offset, $length = null, $encoding = null) { null === $encoding && $encoding = p\Iconv::$internalEncoding; return mb_substr((string) $string, (int) $offset, $length, $encoding); }
    }
    if (!function_exists('iconv_mime_decode')) {
        function iconv_mime_decode($string, $mode = 0, $encoding = null) { $currentMbEncoding = mb_internal_encoding(); null === $encoding && $encoding = p\Iconv::$internalEncoding; mb_internal_encoding($encoding); $decoded = mb_decode_mimeheader($string); mb_internal_encoding($currentMbEncoding); return $decoded; }
    }
} else {
    if (!function_exists('iconv_strlen')) {
        if (extension_loaded('xml')) {
            function iconv_strlen( $string, $encoding = null) { return p\Iconv::strlen1((string) $string, $encoding); }
        } else {
            function iconv_strlen( $string, $encoding = null) { return p\Iconv::strlen2((string) $string, $encoding); }
        }
    }

    if (!function_exists('iconv_strpos')) {
        function iconv_strpos( $haystack, $needle, $offset = 0, $encoding = null) { return p\Iconv::iconv_strpos((string) $haystack, (string) $needle, (int) $offset, $encoding); }
    }
    if (!function_exists('iconv_strrpos')) {
        function iconv_strrpos( $haystack, $needle, $encoding = null) { return p\Iconv::iconv_strrpos((string) $haystack, (string) $needle, $encoding); }
    }
    if (!function_exists('iconv_substr')) {
        function iconv_substr( $string, $offset, $length = null, $encoding = null) { return p\Iconv::iconv_substr((string) $string, (string) $offset, $length, $encoding); }
    }
    if (!function_exists('iconv_mime_decode')) {
        function iconv_mime_decode( $string, $mode = 0, $encoding = null) { return p\Iconv::iconv_mime_decode((string) $string, (int) $mode, $encoding); }
    }
}
