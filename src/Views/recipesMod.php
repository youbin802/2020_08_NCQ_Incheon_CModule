
<form action="/recipesMod" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">빵이름</th>
                    <th scope="col">강력분</th>
                    <th scope="col">이스트</th>
                    <th scope="col">소금</th>
                    <th scope="col">설탕</th>
                    <th scope="col">우유</th>
                    <th scope="col">버터</th>
                    <th scope="col">계란</th>
                    <th scope="col">앙금</th>
                    <th scope="col">굽는시간</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?= $data->id ?></th>
                    <input type="hidden" value="<?= $data->id ?>" name="id">
                    <td><input type="text" name="breadName" value="<?= $data->breadName?>"></td>
                    <td><input type="number" name="stringflour" value="<?= $data->stringflour?>"></td>
                    <td><input type="number" name="east" value="<?= $data->east ?>"></td>
                    <td><input type="number" name="salt" value="<?= $data->salt ?>"></td>
                    <td><input type="number" name="sugar" value="<?= $data->sugar ?>"></td>
                    <td><input type="number" name="milk" value="<?= $data->milk ?>"></td>
                    <td><input type="number" name="butter" value="<?= $data->butter ?>"></td>
                    <td><input type="number" name="egg" value="<?= $data->egg ?>"></td>
                    <td><input type="number" name="crumbs" value="<?= $data->crumbs ?>"></td>
                    <td><input type="number" name="timer" value="<?= $data->timer ?>"></td>
                </tr>
            </tbody>
        </table>
        <button>수정하기</button>
    </form>
    <button onclick="del();">삭제하기</button>
<script>
 function del() {
            let ans=  confirm("정말 삭제하시겠습니까?");
            if(ans) {
                location="/recipesDelete?id=<?=$data->id ?>";
            }
         }
</script>