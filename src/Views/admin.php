<div class="container">
<p>관리자 페이지</p>
<form action="/admin" method="get">
    <select name="select" class="form-select" aria-label="Default select example" onchange="selectChange();">
        <option value="" <?= $select == '' ? 'selected' : '' ?>>전체</option>
        <option value="브레드마마" <?= $select == "브레드마마" ? 'selected' : '' ?>>브레드마마</option>
        <option value="마들렌과자점" <?= $select == "마들렌과자점" ? 'selected' : '' ?>>마들렌과자점</option>
        <option value="꾸드뱅" <?= $select == "꾸드뱅" ? 'selected' : '' ?>>꾸드뱅</option>
        <option value="성심당" <?= $select == "성심당" ? 'selected' : '' ?>>성심당</option>
    </select>
    <input type="submit" style="display:none;" value="submit the form" id="submit">
</form>
<div class="expert-list">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">이름</th>
                    <th scope="col">전화번호</th>
                    <th scope="col">비밀번호</th>
                    <th scope="col">이메일</th>
                    <th scope="col">방문할 장소</th>
                    <th scope="col">방문할 날짜</th>
                    <th scope="col">방문할 시간대</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($list as $d): ?>
                <tr>
                    <th scope="row"><?= $d->id ?></th>
                    <td><?= $d->name ?></td>
                    <td><a href="/modify?id=<?= $d->id ?>&user=admin"><?= $d->phoneNumber ?></a></td>
                    <td><?= $d->pwd ?></td>
                    <td><?= $d->email ?></td>
                    <td><?= $d->Bakery ?></td>
                    <td><?= $d->date ?></td>
                    <td><?= $d->time ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <button><a href="/addRecipes">레시피 추가</a></button>
    <div class="recipes-list">
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
                <?php foreach($recipes as $d): ?>
                <tr>
                    <th scope="row"><?= $d->id ?></th>
                    <td><a href="/recipesMod?id=<?= $d->id ?>"><?= $d->breadName ?></a></td>
                    <td><?= $d->stringflour ?></td>
                    <td><?= $d->east ?></td>
                    <td><?= $d->salt ?></td>
                    <td><?= $d->sugar ?></td>
                    <td><?= $d->milk ?></td>
                    <td><?= $d->butter ?></td>
                    <td><?= $d->egg ?></td>
                    <td><?= $d->crumbs ?></td>
                    <td><?= $d->timer ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
<script>
    function selectChange() {
        $("#submit").click();
    }
</script>