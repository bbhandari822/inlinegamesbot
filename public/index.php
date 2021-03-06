<?php
/**
 * Inline Games - Telegram Bot (@inlinegamesbot)
 *
 * (c) 2016-2018 Jack'lul <jacklulcat@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use jacklul\inlinegamesbot\BotKernel;

/**
 * Do not display errors
 */
ini_set("display_errors", false);

/**
 * Handle webhook request only when it's a POST request
 */
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . ' /../vendor/autoload.php';

    try {
        $app = new BotKernel(true);
        $app->run();
    } catch (\Throwable $e) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);    // On error return HTTP 500 so that Telegram API can retry request later
    }
} else {
    header("Location: https://github.com/jacklul/inlinegamesbot");    // Redirect non-POST requests to Github repository
}
