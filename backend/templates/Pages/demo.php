<?php

/**
 * @var \App\View\AppView $this
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CSV/TSV Demo</title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script(['https://cdn.tailwindcss.com']) ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <div class="p-10">
        <table>
            <tr>
                <th>
                    <span>CSV Download</span>
                </th>
                <td>
                    <?= $this->Html->link(
                        'Download',
                        ['prefix' => 'File', 'controller' => 'Demos', 'action' => 'downloadCsv'],
                        ['class' => 'button']
                    ) ?>
                </td>
            </tr>

            <tr>
                <th>
                    <span>TSV Download</span>
                </th>
                <td>
                    <button>Download</button>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
