<?php

require __DIR__ . '/parts/__connect_db.php';
$title = '建立會員';
$pagename = 'insert';

?>

<?php include __DIR__ . '/parts/__html_head.php' ?>
<?php include __DIR__ . '/parts/__sidebar.php' ?>
<?php include __DIR__ . '/parts/__navbar.php' ?>
<style>
    .form-text{
        /* color: crimson; */
        color:black;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto mt-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">動物圖鑑</h3>
    <!--     `animal_sid`, `name`, `English_name`, `password`, `mobile`, `birthday`, `address` -->
                    <form name="form_member">
                        <div class="mb-3">
                            <label for="name" class="form-label">名稱 (學名)</label> 
                            <input type="text" class="form-control" id="name" name="name">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="English_name" class="form-label">英文名稱</label>
                            <input type="text" class="form-control" id="English_name" name="English_name">
                            <div class="form-text"></div>
                            <!-- 將所有適用的字符轉換為 HTML 實體 -->
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">物種</label>
                            <input type="text" class="form-control" id="password" name="password">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">產地</label>
                            <input type="text" class="form-control" id="mobile" name="mobile">  <!-- data-pattern="09\d{2}-?\d{3}-?\d{3}"  -->
                        </div>
                        <div class="mb-3">
                            <label for="birthday" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">備註</label>
                            <textarea name="address" id="address" cols="30" rows="3"></textarea>
                            <div class="form-text"></div>
                        </div>
                        <?php /*
                        <div class="mb-3">
                            <label for="grade_sid" class="form-label">Grade</label>
                            <br>
                            <input type="radio" name="grade_sid" value="<?= $row['grade_sid'] ?>">一般
                            <input type="radio" name="grade_sid" value="<?= $row['grade_sid'] ?>">黃金
                            <input type="radio" name="grade_sid" value="<?= $row['grade_sid'] ?>">白金
                            <input type="radio" name="grade_sid" value="<?= $row['grade_sid'] ?>">鑽石
                            <div class="form-text"></div>
                        </div>
                        */ ?>

                        <button type="submit" class="btn btn-primary" onclick="sendData();">新增</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">資料錯誤</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>




<?php include __DIR__ . '/parts/__scripts.php' ?>
<script>
    const name=document.querySelector('#name');
    const English_name = document.querySelector('#English_name');
    const password = document.querySelector('#password');
    const mobile = document.querySelector('#mobile'); 
    const birthday = document.querySelector('#birthday');
    const address =document.querySelector('#address');
    
   

    const modal = new bootstrap.Modal(document.querySelector('#exampleModal'));
   const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;
    function sendData() {
<<<<<<< HEAD
       // animal_sid.nextElementSibling.innerHTML = '';
=======
>>>>>>> 3aab34007699af1e63ecba7cc5e923a725d82b03
        name.nextElementSibling.innerHTML = '';
        English_name.nextElementSibling.innerHTML = '';
        password.nextElementSibling.innerHTML = '';
        mobile.nextElementSibling.innerHTML = '';
        birthday.nextElementSibling.innerHTML = '';
        address.nextElementSibling.innerHTML = '';

        let isPass = true;
        // 檢查
        
        if (name.value.length < 2) {
            isPass = false;
            name.nextElementSibling.innerHTML = '請輸入正確的姓名';
        }
        if (mobile.value && !mobile_re.test(mobile.value)) {
            isPass = false;
            mobile.nextElementSibling.innerHTML = '請輸入正確的手機號碼';
        }
        if (password.value.length < 5) {
            isPass = false;
            password.nextElementSibling.innerHTML = '請輸入密碼';
        }


       
            const fd = new FormData(document.form_member);  //取得表單的參照

            fetch('insertMember-api.php', {
                    method: 'POST',
                    body: fd,
                }).then(r => r.json())
                .then(obj => {
                    if (obj.success) {
                        alert('新增成功');
                        location.href = 'index_.php';
                    } else {
                        document.querySelector('.modal-body').innerHTML = obj.error || '資料修改發生錯誤';
                        modal.show();
                    }
                })
        

    }
</script>

<?php include __DIR__ . '/parts/__html_foot.php' ?>