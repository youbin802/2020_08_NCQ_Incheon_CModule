<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Document</title>
    <script src="/jquery-3.4.1.js"></script>
    <style>
        .phone-input {
            display: flex
        }

        .phone-input > input {
            width:20%;
        }
        #moveBtn {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
    <form action="/expert" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">전화번호</span>
            <div class="phone-input">
                <input type="number" class="form-control" minlength="2" maxlength="3"> - <input type="number" class="form-control" minlength="3" maxlength="4"> - <input type="number" class="form-control" minlength="3" maxlength="4">
            </div>
            <input type="hidden" id="phoneNumber" name="phoneNumber">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">이름</span>
            <input type="text" class="form-control" name="name" id="name" placeholder="이름">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">비밀번호</span>
            <input type="text" class="form-control" name="pwd" id="pwd" placeholder="비밀번호">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">이메일</span>
            <input type="email" required class="form-control" name="email" id="email" placeholder="name@example.com">
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text">방문할 빵집</span>
            <select name="select1" class="form-select" multiple aria-label="multiple select example">
                <option selected value="브레드마마" >브레드마마</option>
                <option value="마들렌과자점">마들렌과자점</option>
                <option value="꾸드뱅">꾸드뱅</option>
                <option value="성심당">성심당</option>
            </select>
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text">방문할 시간대</span>
            <select name="select2" class="form-select" multiple aria-label="multiple select example">
                <option selected value="9" >09시</option>
                <option value="10">10시</option>
                <option value="11">11시</option>
                <option value="12">12시</option>
                <option value="13">13시</option>
                <option value="14">14시</option>
                <option value="15">15시</option>
                <option value="16">16시</option>
                <option value="17">17시</option>
                <option value="18">18시</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">방문할 날짜</span>
            <input type="date" class="form-control" name="date">
        </div>
        <button id="moveBtn"></button>
    </form>
    <button onclick="submitClick();">예약하기</button>
    </div>
      <script>
          const log = console.log;
          let flag = true; 

          function submitClick() {
            flag = true;
            // 전화번호 검사
            let list = $(".phone-input > input");
            let text;
            let number='';

            for(let i=0; i<list.length; i++) {
                let val = list[i].value;
                if(val == "" || val.length < 2)  text = '전화번호 길이는 2자리 이상입니다.';
                number += i+1 == list.length ? val : val+'-';
            }
            $("#phoneNumber").val(number);
            if(text != undefined) alertFrom(text);

            let name = $("#name").val();
            if(name == "") alertFrom(text);

            //비밀번호 검사
            let pwd = $("#pwd").val();
            let ch = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/;

            if(!ch.test(pwd)) alertFrom('비밀번호는 영문자, 특수문자, 숫자를 포함해서 8자 이상입니다.');

            //이메일 검사
            let email = $("#email").val();
            let ch2 = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;
            if(!ch2.test(email)) alertFrom('이메일 형식이 올바르지 않습니다.');

            if(flag) $("#moveBtn").trigger("click"); //여기 수정해야함 값 넘기는 구간
          }

          function alertFrom(text) { alert(text); flag= false} 

      </script>    
      <!-- INSERT INTO `reservationlist` (`id`, `phoneNumber`, `pwd`, `email`, `Bakery`, `time`, `date`) VALUES (NULL, '010-1111-2222', 'pwd456', '456@naver.com', '성심당', '10', '2021-08-14');         -->
</body>
</html>