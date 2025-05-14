<!DOCTYPE html>
<html lang="ja">
<!-- TODO: headタグコンポーネント読み込み: components/Head.php  -->

<body>
    <!-- TODO: ローディングコンポーネント読み込み: components/Loading.php -->

    <?php include COMPONENT_DIR . 'Nav.php' ?>

    <main class="container mx-auto py-8">
        <?php include $view_path ?>
    </main>

    <!-- TODO: Footer コンポーネント読み込み: components/Footer.php -->
</body>

</html>