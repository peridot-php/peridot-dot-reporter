<?php
namespace Peridot\Reporter\Dot;

use Evenement\EventEmitterInterface;
use Peridot\Reporter\ReporterFactory;
use Symfony\Component\Console\Input\InputInterface;

/**
 * This plugin registers the DotReporter with Peridot
 * @package Peridot\Reporter\Dot
 */
class DotReporterPlugin
{
    /**
     * @var EventEmitterInterface
     */
    protected $emitter;

    /**
     * @param EventEmitterInterface $emitter
     */
    public function __construct(EventEmitterInterface $emitter)
    {
        $this->emitter = $emitter;
        $this->emitter->on('peridot.reporters', [$this, 'onPeridotReporters']);
    }

    /**
     * @param InputInterface $input
     * @param ReporterFactory $reporters
     */
    public function onPeridotReporters(InputInterface $input, ReporterFactory $reporters)
    {
        $reporters->register('dot', 'dot matrix', 'Peridot\Reporter\Dot\DotReporter');
    }
} 
