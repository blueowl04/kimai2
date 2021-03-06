<?php

/*
 * This file is part of the Kimai time-tracking app.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Event;

use App\Entity\User;
use Symfony\Component\EventDispatcher\Event;

class ThemeEvent extends Event
{
    public const JAVASCRIPT = 'app.theme.javascript';
    public const STYLESHEET = 'app.theme.css';
    public const HTML_HEAD = 'app.theme.html_head';

    /**
     * @var User
     */
    protected $user;
    /**
     * @var string
     */
    protected $content = '';
    /**
     * @var mixed
     */
    protected $payload = null;

    /**
     * @param string $name
     */
    public function __construct(User $user, $payload = null)
    {
        $this->user = $user;
        $this->payload = $payload;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return ThemeEvent
     */
    public function addContent(string $content)
    {
        $this->content .= $content;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param mixed $payload
     * @return ThemeEvent
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
        return $this;
    }
}
