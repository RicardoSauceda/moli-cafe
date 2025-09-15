<?php if ($paginator->hasPages()): ?>
<nav role="navigation" aria-label="Paginación" class="flex justify-center">
    <ul class="inline-flex items-center gap-1 p-0 m-0 list-none">
        <?php if ($paginator->onFirstPage()): ?>
            <li class="opacity-60" aria-disabled="true" aria-label="Anterior">
                <span class="inline-block px-3 py-1.5 rounded-lg border border-gray-200 bg-gray-50 text-gray-400" aria-hidden="true">« Anterior</span>
            </li>
        <?php else: ?>
            <li>
                <a class="inline-block px-3 py-1.5 rounded-lg border border-gray-200 bg-white text-gray-700 hover:border-gray-300" href="<?= $paginator->previousPageUrl() ?>" rel="prev" aria-label="Anterior">« Anterior</a>
            </li>
        <?php endif; ?>

        <?php foreach ($elements as $element): ?>
            <?php if (is_string($element)): ?>
                <li aria-disabled="true"><span class="inline-block px-3 py-1.5 rounded-lg border border-gray-200 bg-gray-50 text-gray-400 cursor-default"><?= $element ?></span></li>
            <?php endif; ?>

            <?php if (is_array($element)): ?>
                <?php foreach ($element as $page => $url): ?>
                    <?php if ($page == $paginator->currentPage()): ?>
                        <li aria-current="page"><span class="inline-block px-3 py-1.5 rounded-lg border border-yellow-300 bg-moli-yellow text-moli-black font-semibold shadow-sm"><?= $page ?></span></li>
                    <?php else: ?>
                        <li><a class="inline-block px-3 py-1.5 rounded-lg border border-gray-200 bg-white text-gray-700 hover:border-gray-300" href="<?= $url ?>"><?= $page ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if ($paginator->hasMorePages()): ?>
            <li>
                <a class="inline-block px-3 py-1.5 rounded-lg border border-gray-200 bg-white text-gray-700 hover:border-gray-300" href="<?= $paginator->nextPageUrl() ?>" rel="next" aria-label="Siguiente">Siguiente »</a>
            </li>
        <?php else: ?>
            <li class="opacity-60" aria-disabled="true" aria-label="Siguiente">
                <span class="inline-block px-3 py-1.5 rounded-lg border border-gray-200 bg-gray-50 text-gray-400" aria-hidden="true">Siguiente »</span>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<?php endif; ?>
