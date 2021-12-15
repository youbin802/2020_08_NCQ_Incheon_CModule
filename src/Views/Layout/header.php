<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>메인화면</title>
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="../travel.css">
    <script src="/js/jquery-3.4.1.js"></script>
    <style>
        * {
    margin:0;
    padding:0;
    text-decoration: none;
    color:#000;
    list-style: none;
    /* font-family: "Nanum Barun Gothic","돋움",sans-serif; */
}

header {
    width: 100%;
    top: 0;
    z-index: 100;
    background-color: #0d4633;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 190px;
}
.logo img {
    width: 131px;
    height: 121px;
}
.bar {
    width:100%;
    height: 1px;
    background-color: #dddddd69;
}

header > nav {
    position: relative;
    width: 40%;
    top: 12px;
}

header > nav > ul{
    /* position: relative; */
    display: flex;
    justify-content: space-around;
    align-items: center;
}
header .sub-menu {
    position: absolute;
    z-index: 1;
    opacity: 0;
    height: 0;
    padding:10px;
    background-color: rgba(29, 59, 26, 0.616);
    top: 39px;
    transition: .4s;
    
}

header > nav > ul > li:hover .sub-menu{
    height: 70px;
    opacity: 1;
}

header > nav > ul > li:hover .sub-menu a:hover{
    color:rgb(201, 109, 23);
}

header nav a {
    color:#fff;
}

/* 비주얼 슬라이드 영역 */
.visual {
    position: fixed;
    width:100%;
    height: 606px;
    overflow: hidden;
    top: 0;
}

.img-slide {
    width:300%;
    height: 100%;
    position: absolute;
    display: flex;
}

.img-slide img {
    width: calc(100% / 3);
    height: 100%;
    object-fit: cover;
}

.btn {
    background-color: #fff;
    width: 30px;
    height: 30px;
    position: absolute;
    z-index: 2;
}

.btn:nth-child(1) {
    top:100px;
    left:10%;
}

.btn:nth-child(2) {
    top:100px;
    right:10%;
}

.visual .img-slide {
    animation-duration: 9s;
    animation-delay: calc(-9s + 0.5s);
}

#move-2:checked ~ .visual .img-slide{
    animation-name: move-1;
}

@keyframes move-1 {
    0%      { left: 0%; }
    27.777% { left: 0%; }
    
    33.333% { left: -100%; }
    61.111% { left: -100%; }

    66.666% { left: -200%; }
    94.444% { left: -200%; }

    100%    { left: -200%;}
}

/* 메인 섹션 영역 시작 */

#main {
    background-color: #eb8989;
    width:100%;
    height: 150vh;
    position: relative;
    padding-top: 30px;
    background-color: #f7f0da;
    margin-top: 606px;
    z-index: 10;
}


.container {
    width:1000px;
    margin:0 auto;
}

.main-group {
    display: grid;
    grid-template-columns: repeat(1,1fr);
    gap: 30px;
}

.notice {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.notice .n-box {
    height: 600px;
    width:400px;
    background-color: #fff;
}

.notice .table {
    display: flex;
    justify-content: space-around;
    align-items: center;
    height: 100%;
}

.notice .table p {
    padding:5px;
    width:100%;
    border-bottom: 1px solid #ddd;
}

.notice .n-box .name {
    text-align: center;
    padding: 4px;
    background-color: #cc814c;
    color:#fff;
}

.notice .n-box:nth-child(1) {

    position: relative;
}
.notice .n-box:nth-child(2) {
    width:555px;
    display: grid;
    grid-template-columns: repeat(2,1fr);
}

.n-box .n-item {
    width:100%;
    /* height: 300px; */
    /* border:1px dotted #000; */
}

.notice .img-box {
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, #4a121200, #c5621c), url(/img/monthly_bakery.jpg);
    background-size: cover;
}

.notice .back-img {
    width:100%;
    height: 100%;
    object-fit: cover;
}

.notice .name-img{
    width: 122px;
    height: 63px;
    position: absolute;
    left: 2%;
    top: 2%;
}

.notice .text {
    position: absolute;
    bottom: 0;
    text-align: right;
    padding: 9px;
    color: #fff;
    font-size: 12px;
    line-height: 2;
}

.intro {
    width:100%;
    height:146vh;
    /* background-color: #fff; */
    display: grid;
    grid-template-columns: repeat(2,1fr);
}

.item {
    width:100%;
    height:300px;
}

.item img {
    width:100%;
    height:100%;
}

/* .item:nth-child(odd) img{
    left:0 !important;
} */

.item {
    display: flex;
    justify-content: center;
    align-items: left;
    height:100%;
    flex-direction: column;
}

.item-text {
    padding: 30px;
}

.item b {
    border-left: 5px solid #246d26;
    padding-left: 15px;
}

.item p {
    padding-top: 20px;
    font-size: 13px;
    line-height: 2;
}

.place {
    position: relative;
    display: grid;
    grid-template-columns: repeat(5,1fr);
    gap:10px;
}

.place-box {
    overflow: hidden;
    width:100%;
    height:500px;
    /* border:1px solid #cc814c; */
    background-color: #fff;
    transition: .4s;
}

.place-box img {
    width:100%;
    height:70%;
    object-fit: cover;
    transition: .4s;
}

.place-box h6 {
    padding:7px;
    color: #da7d3b;
}

.place-box p {
    padding:7px;
    font-size: 11px;
    line-height: 2;
    color:rgb(82, 82, 82);
}

#main > div > div > div.place > div:hover {
    height:500px;
}

#main > div > div > div.place > div:hover img{
    height:50%;
    filter: brightness(80%);
}

/* 푸터 영역 */
footer {
    width:100%;
    height:340px;
    background-color: #2e2f2e;
}

footer .container {
    display: grid;
    grid-template-columns: repeat(2,1fr);
}

footer .container div {
    position: relative;
    top: 20px;
}

footer .container div .top-p{
    color:rgb(107, 107, 107);
}

footer .container div .bottom-p{
    padding-bottom: 20px;
}

footer .container div p{
    color:rgb(206, 206, 206);
    padding:3px;
}
/* sub1 */
.intro {
    width:100%;
    height:146vh;
    /* background-color: #fff; */
    display: grid;
    grid-template-columns: repeat(2,1fr);
}

.item {
    width:100%;
    height:300px;
}

.item img {
    width:100%;
    height:100%;
}

/* .item:nth-child(odd) img{
    left:0 !important;
} */
.page {
    margin-top:150px;
    height: 145vh;
    background-color: #f7f0da;
}
.page .container{
    padding-top: 80px;
    height:123vh;
    /* background-color: #fff; */
    display: grid;
    grid-template-columns: repeat(2,1fr);
}


.item {
    display: flex;
    justify-content: center;
    align-items: left;
    height:100%;
    flex-direction: column;
}

.item-text {
    padding: 30px;
}

.item b {
    border-left: 5px solid #246d26;
    padding-left: 15px;
}

.item p {
    padding-top: 20px;
    font-size: 13px;
    line-height: 2;
}

.item {
    width:100%;
    height:300px;
}

.item img {
    width:100%;
    height:100%;
}

/* sub2 */
.page-sub2 {
        margin-top:150px;
        height: 160vh;
        background-color: #f7f0da;
}
.page-sub2 .container {
    height:70vh;
    padding-top: 430px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.bs-item {
    position: relative;
    display: flex;
    justify-content: space-between;
    padding-bottom: 40px;
}

.bs-item img {
    object-fit: cover;
}

.bs-item:nth-child(1) img {
    width:495px;
    height: 341px;
}

.bs-item:nth-child(2) img {
    width: 228px;
    height: 202px;
}

.bs-item:nth-child(3) img {
    width:595px;
    height: 318px;
}

.bs-item:nth-child(5) img {
    width:643px;
    height: 580px;
}

.bs-item:nth-child(4) img {
    width:527px;
    height: 294px;
}

.bs-item:nth-child(2) img {
    margin:7px;
}

.bs-text {
    padding: 0 30px;
}

.bs-text h4 {
    border-left:4px solid #0d4633;
    margin-bottom: 10px;
    padding-left:10px;
}

.bs-text p {
    letter-spacing: 4px;
    line-height: 25px;
}

.news {
    width:100%;
    height:200px;
    position: relative;
    background: linear-gradient(to right, #4a121200, #c5621c), url(/img/sungsimdang01.jpg);
}

.news .table {
    display: flex;
    justify-content: space-around;
    align-items: center;
    height: 100%;
    top: -18px;
    position: relative;
}

.news .table p {
    padding:3px;
    width:100%;
    color:#fff;
    /* border-bottom: 1px solid #ddd; */
}

#main > div > div > div.news > div.table > div:nth-child(1) p {
    background-color: #fbfbfb96;
    border-radius: 16px;
    color: #b55b1a;
    margin:5px;
}

.news .name {
    text-align: center;
    padding: 4px;
    background-color: #cc814c;
    color:#fff;
}


    </style>
</head>

<body>
<header>
        <div class="logo"><img src="/../image/logo.png" alt=""></div>
        <div class="bar"></div>
        <nav>
            <ul>
                <li><a href="#">대전 빵집순례</a>
                    <ul class="sub-menu">
                        <li><a href="#">빵 스토리</a></li>
                        <li><a href="#">빵집 소개</a></li>
                        <li><a href="#">공지사항</a></li>
                    </ul>
                </li>
                <li><a href="#">빵집순례 신청</a>
                    <ul class="sub-menu">
                        <li><a href="#">예약하기</a></li>
                        <li><a href="#">예약확인</a></li>
                    </ul>
                </li>
                <li><a href="#">빵 굽기 가상 체험</a>
                    <ul class="sub-menu">
                        <li><a href="#">체험 방법 안내</a></li>
                        <li><a href="#">체험 하기</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
