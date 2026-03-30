<?php

class Layout
{
    public string $layout;
    public array $content_area;

    public function __construct(string $name)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/resources/layout/' . $name . '.html';

        $this->layout = file_get_contents($path);
        $last_pos = 0;
        while (($pos = strpos($this->layout, '[', $last_pos)) !== false) {
            $post_2 = strpos($this->layout, ']', $pos);
            if (!$post_2) break;

            $post_1 = $pos + 1;

            $area_name = substr($this->layout, $post_1, $post_2 - $post_1);

            $this->content_area[$area_name] = [
                'post_1' => $post_1,
                'post_2' => $post_2,
                'content' => ''
            ];

            $last_pos = $post_2 + 1;
        }
    }

    public function insert(array $content)
    {
        foreach ($content as $key => $value) {
            if (!empty($value)) $this->content_area[$key]['content'] = $value;
        }

        $this->content_area = array_reverse($this->content_area);
        $result = $this->layout;

        // unique key

        // foreach ($this->content_area as $value) {
        //     $post_1 = $value['post_1'] - 1;
        //     $post_2 = $value['post_2'] + 1;
        //     $content = $value['content'];
        //     $result = substr_replace($result, $content, $post_1, ($post_2 - $post_1));
        // }

        foreach ($this->content_area as $key => $value) {
            $result = str_replace('[' . $key . ']', $value['content'], $result);
        }

        echo $result;
    }
}