<?php if (isset($error) && $error): ?>
    <div class="p-3 bg-red-300 text-red-800 text-sm mb-3">
        <?= h($error) ?>
    </div>
<?php endif; ?>
