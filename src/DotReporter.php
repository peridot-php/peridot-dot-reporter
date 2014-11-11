<?php
namespace Peridot\Reporter\Dot;

use Peridot\Reporter\AbstractBaseReporter;

/**
 * The DotReporter displays test results as a dot matrix, using '.'
 * for passed tests, 'F' for failed tests, and 'P' for pending tests.
 *
 * @package Peridot\Reporter\Dot
 */
class DotReporter extends AbstractBaseReporter
{
    /**
     * @var int
     */
    protected $maxColumns = 67;

    /**
     * @var int
     */
    protected $column = 0;

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function init()
    {
        $this->eventEmitter->on('test.passed', [$this, 'onTestPassed']);
        $this->eventEmitter->on('test.failed', [$this, 'onTestFailed']);
        $this->eventEmitter->on('test.pending', [$this, 'onTestPending']);
        $this->eventEmitter->on('runner.end', [$this, 'onRunnerEnd']);
    }

    /**
     * @return void
     */
    public function onTestPassed()
    {
        $this->write('success', '.');
    }

    /**
     * @return void
     */
    public function onTestFailed()
    {
        $this->write('error', 'F');
    }

    /**
     * @return void
     */
    public function onTestPending()
    {
        $this->write('pending', 'P');
    }

    /**
     * @return void
     */
    public function onRunnerEnd()
    {
        $this->output->writeln("");
        $this->footer();
    }

    /**
     * @param $key
     * @param $text
     */
    protected function write($key, $text)
    {
        if ($this->column == $this->getMaxColumns()) {
            $this->output->writeln("");
            $this->column = 0;
        }
        $this->output->write($this->color($key, $text));
        $this->column++;
    }

    /**
     * @param int $columns
     */
    public function setMaxColumns($columns)
    {
        $this->maxColumns = $columns;
    }

    /**
     * @return int
     */
    public function getMaxColumns()
    {
        return $this->maxColumns;
    }
}
