<form action="/addRecipes" method="post">
        <table class="table">
            <thead>
                <tr>
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
                    <td><input type="text" name="breadName"></td>
                    <td><input type="number" name="stringflour"></td>
                    <td><input type="number" name="east"></td>
                    <td><input type="number" name="salt"></td>
                    <td><input type="number" name="sugar"></td>
                    <td><input type="number" name="milk"></td>
                    <td><input type="number" name="butter"></td>
                    <td><input type="number" name="egg"></td>
                    <td><input type="number" name="crumbs"></td>
                    <td><input type="number" name="timer"></td>
                </tr>
            </tbody>
        </table>
        <button>추가하기</button>
    </form>
<script>
 function del() {
            let ans=  confirm("정말 삭제하시겠습니까?");
            if(ans) {
                location="/recipesDelete?id=<?=$data->id ?>";
            }
         }
</script>