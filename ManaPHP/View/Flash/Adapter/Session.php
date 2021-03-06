<?php
namespace ManaPHP\View\Flash\Adapter;

use ManaPHP\View\Flash;

/**
 * Class ManaPHP\View\Flash\Adapter\Session
 *
 * @package flash\adapter
 *
 * @property-read \ManaPHP\Http\SessionInterface $session
 */
class Session extends Flash
{
    /**
     * @var string
     */
    protected $_sessionKey = 'manaphp_flash';

    /**
     * Session constructor.
     *
     * @param array $cssClasses
     */
    public function __construct($cssClasses = [])
    {
        parent::__construct($cssClasses);

        $context = $this->_context;

        $defaultMessages = [];
        $context->messages = (array)$this->session->get($this->_sessionKey, $defaultMessages);
        $this->session->remove($this->_sessionKey);
    }

    /**
     * @param string $type
     * @param string $message
     *
     * @return void
     */
    public function _message($type, $message)
    {
        $cssClasses = isset($this->_cssClasses[$type]) ? $this->_cssClasses[$type] : '';

        $defaultMessages = [];
        $messages = $this->session->get($this->_sessionKey, $defaultMessages);
        $messages[] = '<div class="' . $cssClasses . '">' . $message . '</div>' . PHP_EOL;
        $this->session->set($this->_sessionKey, $messages);
    }
}