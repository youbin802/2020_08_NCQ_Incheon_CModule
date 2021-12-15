    <style>
        p {
            font-size: 13px;
            margin-left: 10%;
            margin-bottom: 0 !important;
        }
    </style>
</head>
<body>
    <div class="container">
    <form action="/expertCheck" method="get">
        <p>전화번호 입력 시 '-'(하이픈) 포함해서 입력해주세요.</p>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">전화번호</span>
            <input type="text" id="phoneNumber" class="form-control" placeholder="010-1234-5678" name="phoneNumber">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">비밀번호</span>
            <input type="text" name="pwd" class="form-control" id="pwd" placeholder="비밀번호">
        </div>
        <button id="search">검색하기</button>
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
                    <td><a href="/modify?id=<?= $d->id ?>&user=guest"><?= $d->phoneNumber ?></a></td>
                    <td><?= $d->pwd ?></td>
                    <td><?= $d->email ?></td>
                    <td><?= $d->Bakery ?></td>
                    <td><?= $d->date ?></td>
                    <td><?= $d->time ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php if($flag == 0 ): ?>
            <p>예약결과가 없습니다.</p>
        <?php endif; ?>
    </div>
    </div>
</body>
</html>