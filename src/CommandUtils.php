<?php

namespace MaDnh\LaravelCommandUtil;

trait CommandUtils
{

    protected $list_index = 1;

    /**
     * @param $message
     * @param array $options
     * @return string
     */
    protected function getBannerContent($message, $options = [])
    {
        $options = array_merge([
            'top' => true,
            'bottom' => true,
            'margin_top' => 2,
            'margin_bottom' => 2,
            'padding' => 0,
            'message_padding' => 2,
            'char' => '#'
        ], $options);

        $char = $options['char'][0];
        $options['margin_top'] = max(0, $options['margin_top']);
        $options['margin_bottom'] = max(0, $options['margin_bottom']);
        $message = trim($message);
        $length = strlen($message);
        $line = str_repeat($char, $length + $options['message_padding'] * 2);

        $lines = [];

        if ($options['margin_top']) {
            $lines[] = str_repeat("\n", $options['margin_top']);
        }

        if ($options['top']) {
            $lines[] = $line;
        }
        if ($options['padding'] > 0) {
            $lines[] = str_repeat("\n", $options['padding']);
        }

        $lines[] = str_repeat(' ', $options['message_padding']) . $message;

        if ($options['padding'] > 0) {
            $lines[] = str_repeat("\n", $options['padding']);
        }
        if ($options['bottom']) {
            $lines[] = $line;
        }

        if ($options['margin_bottom']) {
            $lines[] = str_repeat("\n", $options['margin_bottom']);
        }

        return implode("\n", $lines);
    }

    /**
     * @param string $message
     * @param array $options
     */
    public function banner($message, $options = [])
    {
        $options = array_merge([
            'padding' => 1
        ], $options);

        $this->warn($this->getBannerContent($message, $options));
    }

    /**
     * @param string $message
     * @param array $options
     */
    public function softBanner($message, $options = [])
    {
        $options = array_merge([
            'top' => false
        ], $options);

        $this->banner($message, $options);
    }

    /**
     * @param string $message
     * @param array $options
     */
    public function header($message, $options = [])
    {
        $options = array_merge([
            'char' => '*',
            'padding' => 1
        ], $options);

        $this->info($this->getBannerContent($message, $options));
    }

    /**
     * @param string $message
     * @param array $options
     */
    public function softHeader($message, $options = [])
    {
        $options = array_merge([
            'top' => false
        ], $options);

        $this->header($message, $options);
    }

    /**
     * @param string $message
     * @param array $options
     */
    public function title($message, $options = [])
    {
        $options = array_merge([
            'char' => '-',
            'margin_top' => 1,
            'margin_bottom' => 1,
        ], $options);

        $this->comment($this->getBannerContent($message, $options));
    }

    /**
     * @param string $message
     * @param array $options
     */
    public function softTitle($message, $options = [])
    {
        $options = array_merge([
            'top' => false,
            'margin_bottom' => 0
        ], $options);

        $this->title($message, $options);
    }

    /**
     * @param string $message
     * @param array $options
     */
    public function paragraphTitle($message, $options = [])
    {
        $options = array_merge([
            'bottom' => false,
            'message_padding' => 0
        ], $options);

        $this->softTitle('# ' . $message, $options);
    }

    /**
     * @param array $items
     * @param int $start
     * @return int Last index of list
     */
    public function orderedList($items, $start = 1)
    {
        $padLength = strlen(count($items) . '') + 1;

        foreach ($items as $item) {
            $this->line('<info>' . str_pad($start++, $padLength, ' ', STR_PAD_LEFT) . '.</info> ' . $item);
        }

        return $start;
    }

    /**
     * @param array $items
     * @param string $char List styled char
     */
    public function unorderedList($items, $char = '-')
    {
        foreach ($items as $item) {
            $this->line('<info> ' . $char . '</info> ' . $item);
        }
    }

    /**
     * Reset dynamic list index
     * @param int $from
     */
    public function resetOrderedList($from = 1)
    {
        $this->list_index = $from;
    }

    /**
     * Get list index of current ordered list
     * @return string
     */
    public function getListIndex()
    {
        return '<info> ' . str_pad($this->list_index++, 2, ' ', STR_PAD_LEFT) . '.</info> ';
    }
}
