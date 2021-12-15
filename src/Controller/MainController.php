<?php

namespace Gondr\Controller;

use Gondr\App\DB;
use Gondr\Library\Lib;
use Gondr\Library\Pagination;
use Gondr\Library\endDate;

class MainController extends MasterController
{
    public function expert()
    {
        $this->render("expert");
    }

    public function expertProcess() {
        $db = new DB();
        $flag = true;

        $phoneNumber = $_POST['phoneNumber'];
        $name = $_POST['name'];
        $pwd = $_POST['pwd'];
        $email = $_POST['email'];
        $select1= $_POST['select1'];
        $select2= $_POST['select2'];
        $date = $_POST['date'];

        //같은 전화번호로 동일한 날짜 같은 시간대에 예약이 있는 경우
        //-> 동일한 날짜, 시간에 예약이 있어 예약이 불가능함
        $ch_sql1 = "SELECT * FROM reservationlist WHERE phoneNumber=? and time=? and date=?";
        $check1 = $db->fetch($ch_sql1, [$phoneNumber, $select2, $date]);

        if($check1) {
            Lib::msgAndBack("동일한 날짜, 시간에 예약이 있어 예약이 불가능합니다.");
            $flag = false;
        } 

        //같은 날짜, 같은 시간대, 같은 장소에 예약 건수가 10건 이상이면 불가
        $ch_sql2 = "SELECT count(*) AS cnt FROM reservationlist WHERE 
                                            Bakery =? and time = ? and date ='?";
        $check2 =$db->fetch($ch_sql2, [$select1, $select2, $date]);

        if($check2 >= 10) {
            Lib::msgAndBack("예약 건수가 10건 이상이어서 예약이 불가능합니다.");
            $flag = false;
        }

        //같은 전화번호로 3건 초과해 예약하면 3건까지만 예약가능함 alert창 띄움
        $ch_sql3 = "SELECT count(*) AS cnt FROM reservationlist WHERE phoneNumber = ?";
        $check3 =$db->fetch($ch_sql3, [$phoneNumber]);

        if($check3 >= 3) {
            Lib::msgAndBack("예약 건수가 10건 이상이어서 예약이 불가능합니다.");
            $flag = false;
        }

        if($flag == 1) {
            $sql = "INSERT INTO `reservationlist`(`phoneNumber`, `pwd`, `email`, `Bakery`, `time`, `date`,`name`) VALUES (?,?,?,?,?,?,?)";
            $result = $db->execute($sql, [$phoneNumber, $pwd, $email, $select1, $select2, $date, $name]);
        }

        if($result) {
            Lib::msgAndGo("예약 완료", "/expertCheck?phoneNumber={$phoneNumber}&pwd={$pwd}");
        } else {
            Lib::msgAndBack("sql error");
        }
    }

    public function expertCheck() {
        $phoneNumber = $_GET['phoneNumber'];
        $pwd = $_GET['pwd'];

        $db = new DB();
        $flag= 1;

        $sql = "SELECT * FROM reservationlist WHERE phoneNumber = ? and pwd = ?";
        $list = $db->fetchAll($sql, [$phoneNumber, $pwd]);
        if(!$list) $flag = 0;  
        $this->render('expertCheck',['list' => $list, 'flag'=>$flag]);
    }

    public function modify() {
        $id= $_GET['id'];
        $user = $_GET['user'];
        $db= new DB();
        $sql ="SELECT * FROM reservationlist WHERE id = ?";
        $data = $db->fetch($sql, [$id]);
        $this->render("modify",['data' => $data, 'user'=>$user]);
    }

    public function modifyProcess() {
        $db = new DB();
        $flag = true;

        $id = $_POST['id'];
        $user = $_POST['user'];

        $phoneNumber = $_POST['phoneNumber'];
        $pwd = $_POST['pwd'];
        $email = $_POST['email'];
        $select1= $_POST['select1'];
        $select2= $_POST['select2'];
        $date = $_POST['date'];

        //같은 전화번호로 동일한 날짜 같은 시간대에 예약이 있는 경우
        //-> 동일한 날짜, 시간에 예약이 있어 예약이 불가능함
        $ch_sql1 = "SELECT * FROM reservationlist WHERE phoneNumber=? and time=? and date=?";
        $check1 = $db->fetch($ch_sql1, [$phoneNumber, $select2, $date]);

        if($check1) {
            Lib::msgAndBack("동일한 날짜, 시간에 예약이 있어 예약이 불가능합니다.");
            $flag = false;
        } 

        //같은 날짜, 같은 시간대, 같은 장소에 예약 건수가 10건 이상이면 불가
        $ch_sql2 = "SELECT count(*) AS cnt FROM reservationlist WHERE 
                                            Bakery =? and time = ? and date ='?";
        $check2 =$db->fetch($ch_sql2, [$select1, $select2, $date]);

        if($check2 >= 10) {
            Lib::msgAndBack("예약 건수가 10건 이상이어서 예약이 불가능합니다.");
            $flag = false;
        }

        //같은 전화번호로 3건 초과해 예약하면 3건까지만 예약가능함 alert창 띄움
        $ch_sql3 = "SELECT count(*) AS cnt FROM reservationlist WHERE phoneNumber = ?";
        $check3 =$db->fetch($ch_sql3, [$phoneNumber]);

        if($check3 >= 3) {
            Lib::msgAndBack("예약 건수가 10건 이상이어서 예약이 불가능합니다.");
            $flag = false;
        }

        if($flag == 1) {
            $sql = "UPDATE `reservationlist` SET `phoneNumber`=?,`pwd`=?,`email`=?,`Bakery`=?,`time`=?,`date`=? WHERE id = ?";
            $result = $db->execute($sql, [$phoneNumber, $pwd, $email, $select1, $select2, $date, $id]);
        }

        $url="";
        Lib::log($user);
        $pwd = urlencode($pwd);
        if($user == 'guest') {
            $url = "/expertCheck?phoneNumber={$phoneNumber}&pwd={$pwd}";
        } else if($user == "admin") {
            $url = "/admin";
        }
        Lib::log($url);

        if($result) {
            Lib::msgAndGo("예약 수정 완료", $url);
        } else {
            Lib::msgAndBack("sql error");
        }
    }

    public function delete() {
        $id = $_GET['id'];

        $db= new DB();

        $sql = "DELETE FROM `reservationlist` WHERE id =?";
        $result = $db->execute($sql, [$id]);

        if($result) {
            Lib::msgAndGo("삭제 완료", "/");
        } else {
            Lib::msgAndBack("sql error");
        }
    }

    public function recipesDelete() {
        $id = $_GET['id'];

        $db= new DB();

        $sql = "DELETE FROM `recipes` WHERE id =?";
        $result = $db->execute($sql, [$id]);

        if($result) {
            Lib::msgAndGo("삭제 완료", "/admin");
        } else {
            Lib::msgAndBack("sql error");
        }
    }

    public function admin() {
        $db = new DB();
        $str ='';
        $sql ='';
        if(isset($_GET['select'])) {
            $select = $_GET['select'];
        
            switch($select) {
                case '브레드마마':
                    $str = $select;
                    break;
                case '마들렌과자점':
                    $str = $select;
                    break;
                case '꾸드뱅':
                    $str = $select;
                    break;
                case '성심당':
                    $str = $select;
                    break;
            } 
        }
        if($str != '') {
            $sql = "SELECT * FROM reservationlist WHERE Bakery =? ORDER BY date DESC";
            $list = $db->fetchAll($sql,[$str]);
        } else {
            $sql = "SELECT * FROM reservationlist ORDER BY date DESC";
            $list = $db->fetchAll($sql);
        }

        $rec = "SELECT * FROM recipes ORDER BY breadName DESC";
        $recipes = $db->fetchAll($rec);
        
        $this->render("admin", ['list'=>$list, 'select'=>$str, 'recipes'=>$recipes]);
        
    }

    public function recipesMod() {
        $db = new DB();
        $id = $_GET['id'];

        $sql = "SELECT * FROM recipes WHERE id= ?";
        $data = $db->fetch($sql, [$id]);

        $this->render("recipesMod", ['data'=>$data]);
    }

    public function recipesModProcess() {
        $db= new DB();

        $id = $_POST['id'];
        $breadName = $_POST['breadName'];
        $stringflour= $_POST['stringflour'];
        $east= $_POST['east'];
        $salt= $_POST['salt'];
        $sugar= $_POST['sugar'];
        $milk= $_POST['milk'];
        $egg= $_POST['egg'];
        $crumbs= $_POST['crumbs'];
        $butter= $_POST['butter'];
        $timer= $_POST['timer'];

        if(trim($butter)=="" || trim($breadName)=="" || trim($stringflour)=="" ||trim($east)=="" ||trim($salt)=="" ||trim($sugar)=="" ||trim($milk)=="" ||trim($egg)=="" ||trim($timer)=="" ||trim($crumbs)=="") {
            Lib::msgAndBack('누락된 값이 있습니다.');
        }

        

        $sql ="UPDATE `recipes` SET `breadName`=?,`stringflour`=?,`east`=?,`salt`=?,`sugar`=?,`butter`=?,`egg`=?,`milk`=?,`timer`=?,`crumbs`=? WHERE id = ?";
        $result = $db->execute($sql, [$breadName, $stringflour, $east, $salt, $sugar, $butter, $egg, $milk, $timer, $crumbs, $id]);
        
        if($result) {
            Lib::msgAndGo('수정 완료', '/admin');
        } else {
            Lib::msgAndBack('sql error');
        }
    }

    public function addRecipes() {
        $this->render("addRecipes");
    }

    public function addRecipesProcess() {
        $db = new DB();
        $breadName = $_POST['breadName'];
        $stringflour= $_POST['stringflour'];
        $east= $_POST['east'];
        $salt= $_POST['salt'];
        $sugar= $_POST['sugar'];
        $milk= $_POST['milk'];
        $egg= $_POST['egg'];
        $crumbs= $_POST['crumbs'];
        $butter= $_POST['butter'];
        $timer= $_POST['timer'];

        if(trim($butter)=="" || trim($breadName)=="" || trim($stringflour)=="" ||trim($east)=="" ||trim($salt)=="" ||trim($sugar)=="" ||trim($milk)=="" ||trim($egg)=="" ||trim($timer)=="" ||trim($crumbs)=="") {
            Lib::msgAndBack('누락된 값이 있습니다.');
        }

        $sql = "INSERT INTO `recipes` (`breadName`, `stringflour`, `east`, `salt`, `sugar`, `butter`, `egg`, `milk`, `timer`, `crumbs`) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $result = $db->execute($sql, [$breadName, $stringflour, $east, $salt, $sugar, $butter, $egg, $milk, $timer, $crumbs ]);
        
        if($result) {
            Lib::msgAndGo('레시피 추가 완료', '/admin');
        } else {
            Lib::msgAndBack('sql error');
        }
    }
}
