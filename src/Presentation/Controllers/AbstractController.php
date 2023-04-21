<?php

namespace Delivery\Presentation\Controllers;

class AbstractController
{

    protected function includeTpl(string $name, array $data = []): string
    {

        ob_start();
        $tpl = sprintf('%s/%s.php', BASEPATH.'/src/Presentation/Views', $name);

        if (!file_exists($tpl)) {
            throw new \RuntimeException(sprintf('template %s.php not found', $name));
        }

        extract($data);

        include $tpl;

        return ob_get_clean();
    }
}