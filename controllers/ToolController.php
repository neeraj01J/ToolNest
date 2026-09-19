<?php

class ToolController
{
    public function home()
    {
        require_once __DIR__ . '/../views/home.php';
    }

   public function tool()
{
    $id = $_GET['id'] ?? null;

    $tools = [
        1 => [
            'name' => 'Canva',
            'category' => 'Design',
            'description' => 'Create beautiful designs, presentations and social media graphics.',
            'url' => 'https://www.canva.com/'
        ],

        2 => [
            'name' => 'ChatGPT',
            'category' => 'AI',
            'description' => 'AI assistant for writing, learning, coding and many other tasks.',
            'url' => 'https://chatgpt.com/'
        ],

        3 => [
            'name' => 'Figma',
            'category' => 'Design',
            'description' => 'Design and prototype websites and applications collaboratively.',
            'url' => 'https://www.figma.com/'
        ]
    ];

    $tool = $tools[$id] ?? null;

    require_once __DIR__ . '/../views/tool.php';
}
}