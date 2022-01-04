<?php

require __DIR__ . '/parts/__connect_db.php';
$pageName = 'index';
// 沒有登入管理帳號,就轉向

$title = '通訊錄列表';
$pageName = 'list';

$sql = sprintf("SELECT *  FROM `address_1` WHERE 1");

$rows = $pdo->query($sql)->fetchAll();
?>

<?php include __DIR__ . '/parts/__html_head.php' ?>
<?php include __DIR__ . '/parts/__sidebar.php' ?>
<?php include __DIR__ . '/parts/__navbar.php' ?>
<div class="container my-3">
    <div class="row">
        <div class="col-6">
            <button type="button" onclick="location.href='insertMember.php'" class="insert btn btn-outline" id="btn">新增</button>
        </div>
        <div class="col-3">
            <form class="d-flex">
                <input class="searchIp form-control" type="search" placeholder="Search" aria-label="Search">
                <button class="search btn btn-outline" type="submit">Search</button>
            </form>
        </div>
        <div class="bd-example my-5">
            <table class="table table-hover">
                <thead>
                    <tr>   
                        <th scope="col">#</th>
                        <th scope="col">Account (Email)</th>
                        <th scope="col">Name</th>
                        <th scope="col">Password</th>
                        <th scope="col">Mobile</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                        <?php foreach ($rows as $r) : ?>
                            <tr>
                                <td><?= $r['animal_sid'] ?></td>
                                <td><?= $r['email'] ?></td>
                                <td><?= $r['name'] ?></td>
                                <td><?= $r['password'] ?></td>
                                <td><?= $r['mobile'] ?></td>
                                <td>
                                    <button type="button" class="editBtn btn btn-outline">修改</button>
                                    <button type="button" class="delBtn btn btn-outline">刪除</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<?php include __DIR__ . '/parts/__scripts.php' ?>
<?php include __DIR__ . '/parts/__html_foot.php' ?>